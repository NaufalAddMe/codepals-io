<!DOCTYPE html>
<html>
<head>
    <title>Active Groups</title>
</head>
<body>
    <h1>Active Groups</h1>
    <ul>
        @foreach($groups as $group)
            <li><a href="{{ route('groups.show', $group) }}">{{ $group->title }}</a></li>
        @endforeach

        <!-- Tambah tombol "Tambah Group" -->
        <a href="{{ route('groups.create') }}">Tambah Group</a>
    </ul>
</body>
</html>
