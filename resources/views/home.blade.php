<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    @auth
    <p>CONGRATULEISHONS</p>
    <form action="/logout" method="post">
        @csrf
        <button>Ceerras sesion</button>
    </form>
    <div style="border: 4px solid green">
        <h2>crear post</h2>
        <form action="/create-post" method="post">
            @csrf
            <input type="text" name="title" id="" placeholder="titulo">
            <textarea name="body" id="" cols="30" rows="10" placeholder="contenido"></textarea>
            <button>wardar post</button>
        </form>
    </div>
    <div style="border: 4px solid blue">
        <h2>All posts</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin: 10px;">
            <h3>{{$post['title']}} por {{$post->user->name}}</h3>
            {{$post['body']}}
            <p><a href="/edit-post/{{$post->id}}">Editarpost</a></p>
            <form action="delete-post/{{$post->id}}" method="post">
                @csrf
                @method('DELETE')
                <button>borar post</button>
            </form>
        </div>
        @endforeach
    </div>
    @else
    <div style="border: 3px solid black;">
        <h1>Crear nuevo user</h1>
        <form action="/register" method="post">
            @csrf
            <input type="text" name="name" id="" placeholder="Nombre">
            <input type="email" name="email" id="" placeholder="Email">
            <input type="password" name="password" id="" placeholder="Pass">
            <button>Registrar</button>
        </form>
    </div>

    <div style="border: 3px solid red;">
        <h1>Acceder con cuenta existente</h1>
        <form action="/login" method="post">
            @csrf
            <input type="email" name="loginemail" id="" placeholder="Email">
            <input type="password" name="loginpassword" id="" placeholder="Pass">
            <button>Acceder</button>
        </form>
    </div>
    @endauth
    
    
</body>
</html>