<script src="{{asset('vendor/editor/kindeditor/kindeditor-all-min.js')}}"></script>
<script src="{{asset('vendor/editor/kindeditor/lang/zh-CN.js')}}"></script>
<script>
    KindEditor.ready(function (K) {
        window.editor = K.create('{{$editor}}', {
            uploadJson: "{{route('file.upload')}}?section=kindeditor",
            //fileManagerJson: '',
            allowFileManager: false,
            formatUploadUrl: false
        });
    });
</script>