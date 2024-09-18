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
        <input type="file" name="images[]" multiple id="image-input" accept="image/*">
        <button type="submit">Upload</button>
    </form>

    <h2>Gallery</h2>
    <div id="image-grid">
        @foreach($images as $image)
            <div class="image-item">
                <img src="{{ Storage::url($image) }}" alt="Image">
            </div>
        @endforeach
    </div>
</body>
</html>
