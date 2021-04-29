<!DOCTYPE html>
<html>
<head>
        <title>Laravel 5.3 Image Upload example</title>
</head>
<body>
<div>
    @if (isset($path))
        <p>{{ $message }}</p>
        <img src="{{ url($path) }}">
    @endif

    <form action="{{ url('image-upload') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div>
                    <div>
                            <input type="file" name="image" />
                    </div>
                    <div>
                            <button type="submit">Upload</button>
                    </div>
            </div>
    </form>
</div>
</body>
</html>