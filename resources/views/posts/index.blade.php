<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Larapost's Home</title>
</head>
<body>
    <div class="container">
    <h3 class="my-3">LaraPost</h3>
    <a href="{{url('posts/create')}}" class="my-3 btn btn-success">Add Post</a>
    @foreach ($posts as $post)
        <div class="card w-75 my-2">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $post->title }}
                </h5>
                <p class="card-text">
                    {{ date("d F Y - H:i", strtotime($post->updated_at)) }}
                </p>
                <div class="card-text">
                    {{ $post->content }}
                </div>
                <div class="card-text mt-3">
                    <a href="{{ url('posts/'.$post->id) }}" class="btn btn-primary">Details</a>
                    <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>