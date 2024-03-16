<!DOCTYPE html>
<html>
<head>
    <title>Create TODO</title>
</head>
<body>
    <h1>Create a new TODO item</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <button type="submit">Create</button>
    </form>
</body>
</html>
