<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="static/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <title>Document</title>
</head>

<body>
    <!-- JavaScript & jQuery 版本-->

    <!-- HTML part -->

    <form action="static/img" enctype="multipart/form-data">
        <input type="file" id="inputImg" accept="image/gif, image/jpeg, image/png" />
        <img id="previewImg" src="#" />
    </form>

    <!-- JavaScript part -->

    <script>
        $("#inputImg").change(function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#previewImg").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>