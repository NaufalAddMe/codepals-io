<!-- resources/views/groups/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Group</title>
</head>
<body>
    <h1>Create New Group</h1>
    <form action="{{ route('groups.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="max_members">Max Members:</label>
            <input type="number" id="max_user" name="max_user" min="1">
        </div>
        <button type="submit">Create Group</button>
    </form>
</body>
</html>
