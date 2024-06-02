<!DOCTYPE html>
<html>
<head>
    <title>Laravel Posts</title>
</head>
<body>
    <h1>All Posts</h1>
    <a href="{{ route('posts.create') }}">Create Post</a>
    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif
    <table>
        <tr>
            <th>Username</th>
            <th>Content</th>
            <th>Image</th>
            <th>Timestamp</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->username }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" width="100">
                    @endif
                </td>
                <td>{{ $post->created_at }}</td>
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                 @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
                </form>

            </tr>
        @endforeach
    </table>
</body>
</html>
