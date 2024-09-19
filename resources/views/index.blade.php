<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <img src="{{ Storage::url($image) }}" alt="Image" id="img-{{ $loop->index }}">
                <button class="rotate-button" onclick="rotateImage('{{ $image }}')">Rotate</button>
            </div>
        @endforeach
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
