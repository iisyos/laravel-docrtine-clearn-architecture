<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 8px; width: 70%; }
        button { padding: 8px 16px; cursor: pointer; }
        ul { list-style: none; padding: 0; }
        li { padding: 10px; border-bottom: 1px solid #ccc; display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
    <h1>TODO List</h1>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="New TODO" required>
        <button type="submit">Add</button>
    </form>

    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <ul>
        @foreach ($todos as $todo)
            <li>
                <span>{{ $todo->getTitle()->getName() }}</span>
                <form action="{{ route('todos.destroy', $todo->getId()) }}" method="POST" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
