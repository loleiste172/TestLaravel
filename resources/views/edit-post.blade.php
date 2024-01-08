<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" id="" value="{{$post->title}}">
        <textarea name="body">{{$post->body}}</textarea>
        <button>Wardar</button>
    </form>
</body>
</html>