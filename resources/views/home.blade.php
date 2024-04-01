<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    @auth
        <form action="/logout" class="container m-5 pe-0" style="display: flex; justify-content: end;" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Log Out</button>
        </form>
        <div class="container my-5 p-5 rounded-4" style="background-color: beige">
            <h2 style="text-align: center">Create New Post</h2><br />
            <form action="/create-post" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Title of the Post">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Post Body</label>
                    <textarea class="form-control" name="body" id="body" rows="3" placeholder="Body Content ..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="container my-5 p-5 rounded-4" style="background-color: beige">
            <h2 style="text-align: center">All Posts</h2><br />
            @foreach ($posts as $post)
                <div style="display: inline-flex">
                    <div class="card mx-3 mt-3" style="min-width: 350px">
                        <div class="card-header">
                            <h5>{{ $post->title }} by {{ $post->user->name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $post->body }}</p>
                        </div>
                        <div class="card-footer text-body-secondary" style="display: inline-flex;  justify-content: end;">
                            <a href="/edit-post/{{ $post->id }}"><button class="btn btn-success me-2">Edit</button></a>
                            <form action="/delete-post/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <a href="{{ route('delete', ['id' => $post->id]) }}"><button class="btn btn-outline-danger">Delete
                <small>Written by {{ $post->user->name }}, on {{ $post->created_at }}.</small><br />
                <a href="/delete-post/{{ $post->id }}"><button class="btn btn-danger">Delete</button></a>
                <a href="/edit-post/{{ $post->id }}"><button class="btn btn-warning">Edit</button></a> --}}
            @endforeach
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    @else
        <div style="display: flex;">
            <div class="container m-5 p-5 rounded-4" style="background-color: beige; flex:1;">
                <h2 style="text-align: center">Register</h2>
                <form action="/register" method="post"><br />
                    <!-- CSRF  protection -->

                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="name" name="name"
                            aria-describedby="emailHelp">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">
                        <label for="email" class="form-label">Email address</label>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="pswd" name="password">
                        <label for="pswd" class="form-label">Password</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            <div class="container m-5 p-5 rounded-4" style="background-color: beige; flex:1;">
                <h2 style="text-align: center">Log In</h2><br />
                <form action="/login" method="post">
                    <!-- CSRF  protection -->

                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="name" name="loginname"
                            aria-describedby="emailHelp">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="pswd" name="loginpassword">
                        <label for="pswd" class="form-label">Password</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Log In</button>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>


    @endauth


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
