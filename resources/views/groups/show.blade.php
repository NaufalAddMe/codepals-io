<!DOCTYPE html>
<html>
<head>
    <title>{{ $data->title }}</title>
</head>
<body>
    <h1>{{ $data->title }}</h1>
    
    <h2>Deskripsi</h2>
    <p>{{ $data->description }}</p>

    <h2>Members</h2>
    <p>Max Members: {{ $data->max_user }}</p>
    <ul>
        @foreach($data->users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
    
    <a href="{{ route('groups.edit', $data->id) }}">Edit Group</a>
    <form action="{{ route('groups.destroy', $data->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Group</button>
    </form>
</body>
</html>
