<!DOCTYPE html>
<html>
<head>
    <title>Post Details</title>
</head>
<body>
    <h1>Post Details</h1>
    <div>
        <strong>Username:</strong> {{ $post->username }}
    </div>
    <div>
        <strong>Content:</strong> {{ $post->content }}
    </div>
    <div>
        <strong>Image:</strong>
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" width="200">
        @endif
    </div>
    <div>
        <strong>Created At:</strong> {{ $post->created_at }}
    </div>
</body>
</html>
