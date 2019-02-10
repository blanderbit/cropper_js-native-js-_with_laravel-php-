<?php

namespace App\Http\Controllers;

use App\Models\Creative;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class CreativeController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::select('title')->distinct()->get();
        $types= Type::select('title')->distinct()->get();
        $creatives = Creative::when($request->filter, function ($query) use ($request){
            return $query->whereHas('type', function ($query) use ($request){
                return $query->whereTitle($request->filter);});
        })
        ->when($request->filter_tag, function ($query) use ($request){
        return $query->whereHas('tags', function ($query) use ($request){
        return $query->whereTitle($request->filter_tag);});})->paginate(8);
        $filter = $request->filter ?? null;

        return view('creative.index', compact('creatives','tags', 'filter','types'));
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $types = Type::all();
        $creatives = Creative::get();
        return view('creative.create', compact('creatives', 'categories', 'tags','types'));
    }
    public function addTag(Request $request)
    {
        $tag = Tag::create(['title' => $request->title]);
        return response()->json($tag);
    }


    public function store(Request $request)
    {
        $collect = collect(json_decode  ($request->tag));
        $tags = [];
        foreach ($collect->where('id', null)->pluck('title') as $title) {
            $tags[] = ['title' => $title, 'id' => null];
        }
        Tag::insert($tags);
        $filename = md5(time());
        $new_image = $request->file('image');
        $original_image = $request->file('original_image');
        $creativetype = new Creative;
        $creativetype->description = $request->description;
        $creativetype->type_id = $request->type_id ? $request->type_id : Type::whereTitle('2/3')->first()->id;
        $creativetype->width = $request->width;
        $creativetype->height = $request->height;
        $creativetype->start_position_x = $request->start_position_x;
        $creativetype->start_position_y= $request->start_position_y;
        $creativetype->aspectRatio = $request->aspectRatio;
        $creativetype->image = "{$filename}.png";
        $creativetype->original_image = "{$filename}.png";
        $creativetype->category_id = $request->category_id;
        $creativetype->save();

        $tags = Tag::whereIn('title', $collect->pluck('title'))->get()->pluck('id');
        $creativetype->tags()->attach($tags);
        $response = Storage::disk('public')->put("/creatives/new/{$filename}.png",
        file_get_contents($new_image->getRealPath()), 'public');
        Storage::disk('public')->put("/creatives/old/{$filename}.png",
        file_get_contents($original_image->getRealPath()), 'public');
        return response()->json(['success' => $response], $response ? 200 : 400);


    }

    public function edit($creative)
    {
        $types = Type::all();
        $categories= Category::all();
        $creatives = Creative::where('image', $creative)->firstOrFail();
        $my_Tag = $creatives->tags;
        $tags = Tag::whereNotIn('id', $creatives->tags()->get()->pluck('id'))->get();
        $tags_all = Tag::get();
        return view('creative.edit', compact('creatives', 'tags', 'categories', 'my_Tag', 'tags_all', 'types'));
    }

    public function update(Request $request, $creative)
    {
        $collect = collect(json_decode($request->tag));
        $tags = [];
        foreach ($collect->where('id', null)->pluck('title') as $title){
            $tags[] = ['title' => $title, 'id' => null];
        }
        Tag::insert($tags);
        $type = Creative::where('image', $creative)->first();
        $parameters['description'] = $request->description;
        $parameters['width'] = $request->width;
        $parameters['height'] = $request->height;
        $parameters['start_position_x'] = $request->start_position_x;
        $parameters['start_position_y'] = $request->start_position_y;
        $parameters['aspectRatio'] = $request->aspectRatio;
        $parameters['image'] = $creative;
        $parameters['type_id']= $request->type_id ? $request->type_id : Type::whereTitle('2/3')->first()->id;
        $new_image = $request->file('image');
        $type->update($parameters);
        $tags = Tag::whereIn('title', $collect->pluck('title'))->get()->pluck('id');
        $type->tags()->sync($tags);
        $filename = md5(time());
        Storage::delete("creatives/new/{$type->original_image}");
        $i = Storage::disk('s3')->put("/creatives/new/{$filename}.png",
        file_get_contents($new_image->getRealPath()), 'public');
        $type->original_image = "{$filename}.png";
        $type->save();
        return response()->json(['success' => $i], $i ? 200 : 400);
    }
    public function destroy($name)
    {
        $creative = Creative::where('image', $name)->firstOrFail();
        Storage::delete("creatives/new/{$creative->original_image}");
        Storage::delete("creatives/old/{$name}");
        $creative->tags()->detach();
        $creative->delete();
        return response()->json('Success');
    }
}
