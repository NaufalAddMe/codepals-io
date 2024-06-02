<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Username:</label>
            <input type="text" value="{{ $post->username }}" disabled>
        </div>
        <div>
            <label>Content:</label>
            <textarea name="content">{{ $post->content }}</textarea>
            @error('content')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Image:</label>
            <input type="text" value="{{ $post->image }}" disabled>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
