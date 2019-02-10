<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dotenv\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $contents = Storage::files('/public/uploads/new');
        $photo = array();
        foreach ($contents as $item) :
            $photo[] =  str_replace('public', 'storage', $item);
        endforeach;
//dd($photo);
        return view('image.index', compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create(Request $request)
    {
        $path = $request->file('image')->store('uploads', 'public');

        return view('image.create', compact('path'));
    }*/

    public function create(Request $request)
    {
        function addFile($file, $name_file, $name_to_path){
            $validate = Validator::make([$name_file=> $file->getSize()],[
                $name_file => 'max:4000000',
            ]);
            if($validate->fails()){
                return response()->json($validate->errors(), 400);
            };
            $file->move(public_path().'/images', $name_to_path);
            return public_path().'/images'.$name_to_path;
        }
        $unix_timestamp_name = now()->timestamp.str_random(14);
        $server = "http://127.0.0.1:8000";
        $file_link = addFile($request->file('new_image'), 'new_image',
            $unix_timestamp_name.'-'.$request->file('new_image')->getClientOriginalName().".png");

        $file_link2 = addFile($request->file('original_image'), 'original_image',
            $unix_timestamp_name.'-'.$request->file('original_image')->getClientOriginalName().".png");

        return response()->json([
            'message' => 'upload successfully',
            'links'    => [
                $server.$file_link,
                $server.$file_link2
            ]
        ]);
//        } else {
//            return response()->json([
//                'message' => 'file isn`t image',
//            ], 400);
//        }
//        $path = $request->file('image')->store('uploads', 'public');
//
//        return view('image.create', compact('path'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
