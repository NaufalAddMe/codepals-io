<!-- resources/views/groups/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Group</title>
</head>
<body>
    <h1>Edit Group</h1>
    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $group->title }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ $group->description }}</textarea>
        </div>
        <div>
            <label for="max_user">Max Members:</label>
            <input type="number" id="max_user" name="max_user" value="{{ $group->max_user }}" min="1">
        </div>
        <button type="submit">Update Group</button>
    </form>
</body>
</html>
