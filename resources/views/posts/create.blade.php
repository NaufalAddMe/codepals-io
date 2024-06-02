<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Username:</label>
            <input type="text" name="username">
            @error('username')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Content:</label>
            <textarea name="content"></textarea>
            @error('content')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Image:</label>
            <input type="file" name="image">
            @error('image')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
