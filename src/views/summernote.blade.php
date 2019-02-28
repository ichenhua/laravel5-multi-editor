<link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote -->
<link rel="stylesheet" href="{{asset('vendor/editor/summernote/summernote.css')}}">
<script type="text/javascript" src="{{asset('vendor/editor/summernote/summernote.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var $summernote = $("{{$editor}}").summernote({
            height: 300,
            tabsize: 2,
            lang: "zh-CN",
            //调用图片上传
            callbacks: {
                onImageUpload: function (files) {
                    sendFile($summernote, files[0]);
                }
            }
        });

        //ajax上传图片
        function sendFile($summernote, file) {
            var formData = new FormData();
            formData.append("file", file);
            $.ajax({
                url: "{{route('file.upload')}}?section=default",//自定义图片上传路径
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (res) {
                    if (res.err_code == 0) {
                        var url = res.data.url;
                        $summernote.summernote('insertImage', url, function ($image) {
                            $image.attr('src', url);
                        });
                    } else {
                        alert(res.err_msg);
                    }
                }
            });
        }
    });
</script>

