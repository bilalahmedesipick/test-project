
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <div class="panel panel-default">
        <div class="panel-header">
            <h3>Your File Has Been Uploaded</h3>
        </div>
        <div class="panel-body">
            @if($size < 2)
            <a class="btn btn-success" href="{{ app_path().$file }}">Download</a>
                @endif
        </div>
    </div>
</body>
</html>
