{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<title>add creatives</title>--}}
    {{--<!-- Latest compiled and minified CSS -->--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<!-- References: https://github.com/fancyapps/fancyBox -->--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.3/cropper.min.css" rel="stylesheet">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.3/cropper.min.js"></script>--}}
    {{--<style type="text/css">--}}
        {{--.gallery--}}
        {{--{--}}
            {{--display: inline-block;--}}
            {{--margin-top: 20px;--}}
        {{--}--}}
        {{--.close-icon{--}}
            {{--border-radius: 50%;--}}
            {{--position: absolute;--}}
            {{--right: 5px;--}}
            {{--top: -10px;--}}
            {{--padding: 5px 8px;--}}
        {{--}--}}
        {{--.form-image-upload{--}}
            {{--background: #e8e8e8 none repeat scroll 0 0;--}}
            {{--padding: 15px;--}}
        {{--}--}}
    {{--</style>--}}
{{--</head>--}}
{{--<body>--}}

{{--@yield('content')--}}

{{--<script>--}}



    {{--function readURL(input) {--}}
        {{--if (input.files && input.files[0]) {--}}
            {{--var reader = new FileReader();--}}
            {{--reader.onload = function (e) {--}}
                {{--document.querySelector('#image').setAttribute('src', e.target.result);--}}
                {{--cropper()--}}
            {{--};--}}
            {{--reader.readAsDataURL(input.files[0]);--}}
        {{--}--}}
    {{--}--}}
    {{--var options = {--}}
        {{--aspectRatio: 3 / 4,--}}
        {{--movable: false,--}}
        {{--toggleDragModeOnDblclick: false,--}}
        {{--viewMode: 3,--}}
        {{--zoomable: false--}}
    {{--};--}}
    {{--var array_tags = [];--}}
    {{--var array_tags_all = (function(){--}}
        {{--let tags = document.querySelectorAll(".tag-chosen-select option");--}}
        {{--let arr = [];--}}
        {{--for (let i = 0; i< tags.length; i++){--}}
            {{--let obj = {};--}}
            {{--obj.title = tags[i].textContent;--}}
            {{--obj.id = tags[i].value;--}}
            {{--arr.push(obj);--}}
        {{--}--}}
        {{--return arr;--}}
    {{--})();--}}
    {{--var detail;--}}
    {{--var croppe;--}}
    {{--document.querySelector("#file").addEventListener('change', function(){--}}
        {{--document.querySelector('.img_container').style.display = 'flex';--}}
        {{--readURL(this);--}}
    {{--});--}}

    {{--function toDataArray(id, name){--}}
        {{--var val = document.querySelector('#addTag').value;--}}
        {{--if(val == '') {--}}
            {{--alert('Поле должно быть пустым');--}}
            {{--return;--}}
        {{--}--}}
        {{--var opts = document.querySelectorAll('#datalistArr option');--}}
        {{--var count = 0;--}}
        {{--var list = false;--}}
        {{--array_tags_all.forEach((elem, index) => {--}}
            {{--if(elem.title == val){--}}
            {{--alert('Such tag already exists!');--}}
            {{--list = true;--}}
            {{--return;--}}
        {{--}--}}
    {{--});--}}
        {{--array_tags.forEach((elem, index) => {--}}
            {{--if(elem.title == val){--}}
            {{--alert('Such tag already exists!');--}}
            {{--list = true;--}}
            {{--return;--}}
        {{--}--}}
    {{--});--}}
        {{--console.log(list);--}}
        {{--if(list) {--}}
            {{--document.querySelector('#addTag').value = '';--}}
            {{--return;--}}
        {{--}--}}
        {{--for (var i = 0; i < opts.length; i++) {--}}
            {{--if (opts[i].value === val) {--}}
                {{--let obj1 = {};--}}
                {{--obj1.title = val;--}}
                {{--obj1.id = opts[i].getAttribute('daTaid');--}}
                {{--array_tags.push(obj1);--}}
                {{--count++;--}}
                {{--document.querySelector('#datalistArr').removeChild(opts[i]);--}}
                {{--break;--}}
            {{--}--}}
        {{--}--}}

        {{--let obj = {};--}}
        {{--obj.title = val;--}}
        {{--obj.id = null;--}}
        {{--count == 0 && array_tags.push(obj);--}}
        {{--var new_tag = document.querySelector('.tag-chosen-select-new');--}}
        {{--new_tag.innerHTML = '';--}}
        {{--for(let i = 0; i < array_tags.length; i++){--}}
            {{--let option_tag = document.createElement('option');--}}
            {{--option_tag.innerText = array_tags[i].title;--}}
            {{--option_tag.value = array_tags[i].id;--}}
            {{--new_tag.append(option_tag)--}}
        {{--}--}}
        {{--document.querySelector('#addTag').value = '';--}}
        {{--count = 0;--}}
    {{--}--}}
    {{--function cropper(){--}}
        {{--var image = document.querySelector('#image');--}}
        {{--croppe = new Cropper(image, {--}}
            {{--...options,--}}
            {{--crop(event) {--}}
                {{--detail = event.detail;--}}
                {{--document.querySelector('#image1').setAttribute('src', croppe.getCroppedCanvas().toDataURL('image/jpeg'));--}}
            {{--},--}}
        {{--});--}}
    {{--}--}}

    {{--function changeCrop(num){--}}
        {{--croppe.setAspectRatio(num);--}}
        {{--options.aspectRatio = num;--}}
        {{--let button = document.querySelectorAll(".bth");--}}
        {{--for(var i = 0; i < button.length  ; i++){--}}
            {{--button[i].classList.remove('active');--}}
        {{--}--}}
        {{--event.target.classList.add('active');--}}
    {{--}--}}
    {{--function crops(){--}}
        {{--croppe.getCroppedCanvas().toBlob(function(blob){--}}
            {{--const formData = new FormData();--}}
            {{--var type = document.querySelector("button.active")--}}
            {{--var array = [];--}}
            {{--formData.append("old_image", document.querySelector("#file").files[0]);--}}
            {{--formData.append("type", type ? type.textContent : '');--}}
            {{--formData.append("description", document.querySelector("#description").value);--}}
            {{--formData.append("tag",  JSON.stringify(array_tags));--}}
            {{--formData.append("category_id", document.querySelector(".chosen-select").value);--}}
            {{--formData.append("width", Math.floor(detail.width));--}}
            {{--formData.append("height", Math.floor(detail.height));--}}
            {{--formData.append("start_position_x", Math.floor(detail.x));--}}
            {{--formData.append("start_position_y", Math.floor(detail.y));--}}
            {{--formData.append("aspectRatio", croppe.options.aspectRatio);--}}
            {{--formData.append('image', blob);--}}

            {{--$.ajax(`${window.location.origin}/api/creatives`, {--}}
                {{--method: "POST",--}}
                {{--data: formData,--}}
                {{--processData: false,--}}
                {{--contentType: false,--}}
                {{--success() {--}}
                    {{--console.log('Upload success');--}}
                    {{--window.location.href = window.location.origin + "/creatives"--}}
                {{--},--}}
                {{--error() {--}}
                    {{--console.log('Upload error');--}}
                {{--},--}}
            {{--});--}}
        {{--});--}}
    {{--}--}}

    {{--function toggleToArray(name){--}}
        {{--var new_tag = document.querySelector('.tag-chosen-select-new');--}}
        {{--var old_tag = document.querySelector('.tag-chosen-select');--}}
        {{--var data_tag = event.target.value;--}}
        {{--if( name == 'add' ){--}}
            {{--array_tags_all.forEach((elem, index) => {--}}
                {{--if(elem.id == data_tag){--}}
                {{--array_tags_all.splice(index, 1);--}}
            {{--}--}}
        {{--});--}}
            {{--let obj = {}--}}
            {{--obj.title = $('.tag-chosen-select option:selected').text();--}}
            {{--obj.id= data_tag;--}}
            {{--array_tags.push(obj);--}}
        {{--} else {--}}
            {{--array_tags.forEach((elem, index) => {--}}
                {{--if(elem.id == data_tag){--}}
                {{--array_tags.splice(index, 1);--}}
            {{--}--}}
        {{--});--}}
            {{--let obj = {}--}}
            {{--obj.title = $('.tag-chosen-select-new option:selected').text();--}}
            {{--obj.id= data_tag--}}
            {{--// console.log(obj)--}}
            {{--array_tags_all.push(obj);--}}
        {{--}--}}
        {{--new_tag.innerHTML = '';--}}
        {{--old_tag.innerHTML = '';--}}
        {{--for(let i = 0; i < array_tags.length; i++){--}}
            {{--let option_tag = document.createElement('option');--}}
            {{--option_tag.innerText = array_tags[i].title;--}}
            {{--option_tag.value = array_tags[i].id;--}}
            {{--new_tag.append(option_tag)--}}
        {{--}--}}
        {{--for(let i = 0; i < array_tags_all.length; i++){--}}
            {{--let option_tag = document.createElement('option');--}}
            {{--option_tag.innerText = array_tags_all[i].title;--}}
            {{--option_tag.value = array_tags_all[i].id;--}}
            {{--old_tag.append(option_tag)--}}
        {{--}--}}
    {{--}--}}

    {{--function convertDataURIToBinaryFF(dataURI) {--}}
        {{--var BASE64_MARKER = ';base64,';--}}
        {{--var base64Index = dataURI.indexOf(BASE64_MARKER) + BASE64_MARKER.length;--}}
        {{--var raw = window.atob(dataURI.substring(base64Index));--}}
        {{--return Uint8Array.from(Array.prototype.map.call(raw,function(x) {--}}
            {{--return x.charCodeAt(0);--}}
        {{--}));--}}
    {{--}--}}

{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
