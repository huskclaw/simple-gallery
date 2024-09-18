<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Upload Images</h1>
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple>
        <button type="submit">Upload</button>
    </form>

    <h2>Gallery</h2>
    <div class="gallery">
        @foreach($images as $image)
            <img src="{{ Storage::url($image) }}" alt="Image">
        @endforeach
    </div>
</body>
</html>
