@extends('layouts.layout-1')
@section('content')
    <div class="change-post">
        <h1>Change creatives</h1>
        <div class="creative-post">
            <div class="creative-post__header">
                <div class="creative-post__cropper">
                    <img id="image"
                         src="{{'http://127.0.0.1:8000/storage/creatives/old/'.$creatives->image}}"
                         start_position_y="{{$creatives->start_position_y}}"
                         start_position_x="{{$creatives->start_position_x}}"
                         width_im="{{$creatives->width}}"
                         height_im="{{$creatives->height}}"
                         aspectRatio="{{$creatives->type_id}}">
                </div>
                <div class="creative-post__tools">
                    <div class="creative-post__tags">


                        <div class="creative-post__wrapper">
                            <strong>Description:</strong>
                            <input type="text" name="description"
                                   id="description"
                                   class="form-control" value="{{$creatives->description}}" placeholder="Description">
                        </div>
                        <div class="creative-post__wrapper">
                            <strong>Select the category</strong>
                            <select class="chosen-select form-control" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="creative-post__wrapper add__tags">
                            <strong>Add tags</strong>
                            <select class="js-example-tokenizer form-control tag-chosen-select" id="add-tags" multiple
                                    name="">
                                @foreach($my_Tag as $tag)
                                    <option selected value="{{$tag->id}}">{{$tag->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="creative-post__wrapper">
                            <strong>Choose format</strong>
                            <div class="button-wrapper">
                                @foreach($types as $type)
                                    <span class="bth"
                                          onclick="changeCrop({{$type->title}}, '{{$type->title}}')">{{$type->title}}</span>
                                @endforeach
                            </div>
                            <div class="creative-post__cut"
                                 style="background-image: url({{asset('resources/default.png')}});">
                                <img id="image1"
                                     src="{{asset('resources/default.png')}}">
                            </div>
                            <div class="button-wrapper">
                                <button type="button" onclick="crops()" class="js-export button-upload ">Upload</button>
                                <button type="button" onclick="delete_photo()" class="">delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var free = 0;
        var tagsList = <?= $tags_all ?>;
        var typesList = <?= $types ?>;
        var tagsArray = <?= $my_Tag ?>;
        tagsList = tagsList.map(item => ({id: item.id, title: item.title}));
        tagsArray = tagsArray.map(item => ({id: item.id, title: item.title}));
        tagsList.forEach(function (item) {
            $(".js-example-tokenizer").append(`<option  value="${item.title}">${item.title}</option>`)
        });

        function crops() {
            croppe.getCroppedCanvas().toBlob(function (blob) {
                var type = document.querySelector(".bth.active");
                console.log('croper', croppe)
                console.log('typesList', typesList)
                var type2 = typesList.find(item => item.title === croppe._setAspectRatio)
                const formData = new FormData();
                formData.append("type_id", typeof type2 !== 'undefined' ? type2.id : 5);
                formData.append("description", document.querySelector("#description").value);
                formData.append("tag", JSON.stringify(tagsArray));
                formData.append("category_id", document.querySelector(".chosen-select").value);
                formData.append("width", Math.floor(detail.width));
                formData.append("height", Math.floor(detail.height));
                formData.append("start_position_x", Math.floor(detail.x));
                formData.append("start_position_y", Math.floor(detail.y));
                formData.append("aspectRatio", croppe.options.aspectRatio);
                formData.append('image', blob);
                $.ajax(`${window.location.origin}/api/creatives/edit/${name}`, {
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success() {
                        console.log('Upload success');
                        window.location.href = window.location.origin + "/creatives"
                    },
                    error() {
                        console.log('Upload error');
                    }
                });
            });
        }

        $(".js-example-tokenizer")
            .select2({tags: true,})
            .on('select2:select', function (event) {


                let currentValue = event.params.data;
                tagsList.filter(item => item.title === currentValue.text).length > 0
                    ?
                    tagsArray.push({title: currentValue.text, id: currentValue.id})
                    :
                    tagsArray.push({title: currentValue.text, id: null});
            })
            .on('select2:unselect', function (event) {
                tagsArray = tagsArray.filter(tag => tag.title !== event.params.data.text)
            }).on('change', function () {
        });

        $(".chosen-select").select2();
        var array_tags = (function () {
            let tags = document.querySelectorAll(".tag-chosen-select-new option");
            let arr = [];
            for (let i = 0; i < tags.length; i++) {
                let obj = {};
                obj.title = tags[i].textContent;
                obj.id = tags[i].value;
                arr.push(obj);
            }
            return arr;
        })();
        var array_tags_all = (function () {
            let tags = document.querySelectorAll(".tag-chosen-select option");
            let arr = [];
            for (let i = 0; i < tags.length; i++) {
                let obj = {};
                obj.title = tags[i].textContent;
                obj.id = tags[i].value;
                arr.push(obj);
            }
            return arr;
        })();
        var image = document.querySelector('#image');
        var options = {
            aspectRatio: (function () {
                let button = document.querySelectorAll(".bth");
                {{$creatives->type_id}}
                    {{--switch ( {{$creatives->type_id}} ) {--}}
                    {{--case 1:--}}
                        {{--button[0].classList.add('active');--}}
                        {{--break;--}}
                    {{--case 2:--}}
                        {{--button[1].classList.add('active');--}}
                        {{--break;--}}
                    {{--case 3:--}}
                        {{--button[2].classList.add('active');--}}
                        {{--break;--}}
                    {{--case 4:--}}
                        {{--button[3].classList.add('active');--}}
                        {{--break;--}}
                    {{--default:--}}
                        {{--button[4].classList.add('active');--}}
                        {{--break;--}}
                // }
                return {{$creatives->aspectRatio}}
            })(),
            data: {
                x: Number(image.getAttribute('start_position_x')),
                y: Number(image.getAttribute('start_position_y')),
                width: Number(image.getAttribute('width_im')),
                height: Number(image.getAttribute('height_im')),
                rotate: 0,
                scaleX: 1,
                scaleY: 1
            },
            movable: false,
            toggleDragModeOnDblclick: false,
            viewMode: 3,
            zoomable: false
        };
        var detail;
        var croppe = new Cropper(image, {
            ...options,
            crop(event) {
                detail = event.detail;
                document.querySelector('.creative-post__cut').setAttribute('style', "background-image: url(" + croppe.getCroppedCanvas().toDataURL('image/jpeg') + ")");
            }
        });

        function changeCrop(num, string) {
            croppe._setAspectRatio = string;
            croppe.setAspectRatio(num);
            options.aspectRatio = num;
            let button = document.querySelectorAll(".bth");
            for (var i = 0; i < button.length; i++) {
                button[i].classList.remove('active');
            }
            event.target.classList.add('active');
        }

        function changeVievMode(num) {
            options.viewMode = num;
            croppe.destroy();
            croppe = new Cropper(image, options);
        }

        var name = window.location.href.split('/')[4];

        function delete_photo() {
            $.ajax(`${window.location.origin}/api/creatives/destroy/${name}`, {
                method: "DELETE",
                processData: false,
                contentType: false,
                success() {
                    console.log('Upload success');
                    window.location.href = window.location.origin + "/creatives"
                },
                error() {
                    console.log('Upload error');
                }
            });
        }

        function toDataArray(id, name) {
            var val = document.querySelector('#addTag').value;
            if (val == '') {
                alert('Поле должно быть пустым');
                return;
            }
            var opts = document.querySelectorAll('#datalistArr option');
            var count = 0;
            var list = false;
            array_tags_all.forEach((elem, index) => {
                if (elem.title == val) {
                    alert('Such tag already exists!');
                    list = true;
                    return;
                }
            });
            array_tags.forEach((elem, index) => {
                if (elem.title == val) {
                    alert('Such tag already exists!');
                    list = true;
                    return;
                }
            });
            console.log(list);
            if (list) {
                document.querySelector('#addTag').value = '';
                return;
            }
            for (var i = 0; i < opts.length; i++) {
                if (opts[i].value === val) {
                    let obj1 = {};
                    obj1.title = val;
                    obj1.id = opts[i].getAttribute('daTaid');
                    array_tags.push(obj1);
                    count++;
                    document.querySelector('#datalistArr').removeChild(opts[i]);
                    break;
                }
            }

            let obj = {};
            obj.title = val;
            obj.id = null;
            count == 0 && array_tags.push(obj);
            var new_tag = document.querySelector('.tag-chosen-select-new');
            new_tag.innerHTML = '';
            for (let i = 0; i < array_tags.length; i++) {
                let option_tag = document.createElement('option');
                option_tag.innerText = array_tags[i].title;
                option_tag.value = array_tags[i].id;
                new_tag.append(option_tag)
            }
            document.querySelector('#addTag').value = '';
            count = 0;
        }

        function toggleToArray(name) {
            var new_tag = document.querySelector('.tag-chosen-select-new');
            var old_tag = document.querySelector('.tag-chosen-select');
            var data_tag = event.target.value;
            if (name == 'add') {
                array_tags_all.forEach((elem, index) => {
                    if (elem.id == data_tag) {
                        array_tags_all.splice(index, 1);
                    }
                });
                let obj = {}
                obj.title = $('.tag-chosen-select option:selected').text();
                obj.id = data_tag;
                array_tags.push(obj);
            } else {
                array_tags.forEach((elem, index) => {
                    if (elem.id == data_tag) {
                        array_tags.splice(index, 1);
                    }
                });
                let obj = {}
                obj.title = $('.tag-chosen-select-new option:selected').text();
                obj.id = data_tag
                // console.log(obj)
                array_tags_all.push(obj);
            }
            new_tag.innerHTML = '';
            old_tag.innerHTML = '';
            for (let i = 0; i < array_tags.length; i++) {
                let option_tag = document.createElement('option');
                option_tag.innerText = array_tags[i].title;
                option_tag.value = array_tags[i].id;
                new_tag.append(option_tag)
            }
            for (let i = 0; i < array_tags_all.length; i++) {
                let option_tag = document.createElement('option');
                option_tag.innerText = array_tags_all[i].title;
                option_tag.value = array_tags_all[i].id;
                old_tag.append(option_tag)
            }
        }
    </script>
@endsection
