<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOリスト</title>
</head>
<body>
    <h1>TODOリスト</h1>
    <a href="/todos/create">新しいタスクを追加</a>
    <ul>
        @foreach ($todos as $todo)
            <li>{{ $todo->name }}
                <a href="/todos/{{ $todo->id }}/edit">編集</a>
                <form action="/todos/{{ $todo->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
