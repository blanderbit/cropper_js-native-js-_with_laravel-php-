@extends('layouts.layout-1')
@section('content')
    <div class="change-post">
        <h1>Add creatives</h1>
        <div class="creative-post">
            <div class="creative-post__header">
                <div class="creative-post__cropper">
                    <img id="image" src="{{asset('resources/default.png')}}">
                </div>
                <div class="creative-post__tools">
                    <div class="creative-post__tags">
                        <div class="creative-post__wrapper">
                            <strong>Description:</strong>
                            <input type="text" name="description"
                                   id="description"
                                   class="form-control" placeholder="Description">
                        </div>
                        <div class="creative-post__wrapper">
                            <strong>Add image:</strong>
                            <label class="img-upload-label" style="margin: 0">
                                <input type="file" id="file" class=" form-control js-fileinput img-upload">
                            </label>
                        </div>
                        <div class="creative-post__wrapper">
                            <strong>Select the category</strong>
                            <select class="chosen-select form-control" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="creative-post__wrapper">
                            <strong>Add tags</strong>
                            <select class="js-example-tokenizer form-control tag-chosen-select" id="add-tags" multiple
                                    name="">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->title}}</option>
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
                                <img id="image" src="{{asset('resources/default.png')}}" style="width: 100%;">
                            </div>
                            <div class="button-wrapper">
                                <button type="button" id="button-upload" onclick="crops()"
                                        class="js-export button-upload ">Upload
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var free = 0;
        var typesList = <?= $types ?>;
        var tagsList = <?= $tags ?>;
        var tagsArray = [];
        console.log('typesList', typesList);
        $(".js-example-tokenizer")
            .select2({tags: true,})
            .on('select2:select', function (event) {
                var data = event.params.data;
                tagsList.filter(item => item.title === data.text).length > 0
                    ?
                    tagsArray.push({title: data.text, id: data.id})
                    :
                    tagsArray.push({title: data.text, id: null});
            }).on('select2:unselect', (event) => {

            tagsArray = tagsArray.filter(tag => tag.title !== event.params.data.text)
        });

        $(".chosen-select").select2();

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.querySelector('#image').setAttribute('src', e.target.result);
                    cropper()
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        var options = {
            aspectRatio: 3 / 4,
            movable: false,
            toggleDragModeOnDblclick: false,
            viewMode: 3,
            zoomable: false
        };
        var array_tags = [];
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
        var detail;
        var croppe;
        document.querySelector("#file").addEventListener('change', function () {
            // console.log(document.querySelectorAll('.bth')[1].classList.add('active'))            // document.querySelector('.img_container').style.display = 'flex';
            readURL(this);
        });

        function cropper() {
            var image = document.querySelector('#image');
            croppe = new Cropper(image, {
                ...options,
                crop(event) {
                    detail = event.detail;
                    document.querySelector('.creative-post__cut').setAttribute('style', "background-image: url(" + croppe.getCroppedCanvas().toDataURL('image/jpeg') + ")");
                },
            });
        }

        function changeCrop(num, string) {
            croppe.setAspectRatio(num);
            croppe._setAspectRatio = string;
            let button = document.querySelectorAll(".bth");
            for (var i = 0; i < button.length; i++) {
                button[i].classList.remove('active');
            }
            event.target.classList.add('active');
        }

        function crops() {
            document.querySelector('#button-upload').setAttribute('disabled', true);
            croppe.getCroppedCanvas().toBlob(function (blob) {
                console.log(typesList.find(item => item.title === croppe._setAspectRatio));
                const formData = new FormData();
                var array = [];
                formData.append("original_image", document.querySelector("#file").files[0]);
                formData.append("type_id", typesList.find(item => item.title === croppe._setAspectRatio) === undefined ? 2 : typesList.find(item => item.title === croppe._setAspectRatio).id);
                formData.append("description", document.querySelector("#description").value);
                formData.append("tag", JSON.stringify(tagsArray));
                formData.append("category_id", document.querySelector(".chosen-select").value);
                formData.append("width", Math.floor(detail.width));
                formData.append("height", Math.floor(detail.height));
                formData.append("start_position_x", Math.floor(detail.x));
                formData.append("start_position_y", Math.floor(detail.y));
                formData.append("aspectRatio", croppe.options.aspectRatio);
                formData.append('image', blob);

                $.ajax(`${window.location.origin}/api/creatives`, {
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success() {
                        document.querySelector('#button-upload').setAttribute('disabled', false);
                        console.log('Upload success');
                        window.location.href = window.location.origin + "/creatives"
                    },
                    error() {
                        console.log('Upload error');
                    },
                });
            });
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

        function convertDataURIToBinaryFF(dataURI) {
            var BASE64_MARKER = ';base64,';
            var base64Index = dataURI.indexOf(BASE64_MARKER) + BASE64_MARKER.length;
            var raw = window.atob(dataURI.substring(base64Index));
            return Uint8Array.from(Array.prototype.map.call(raw, function (x) {
                return x.charCodeAt(0);
            }));
        }
    </script>
@endsection
