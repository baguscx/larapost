<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>
    <div class="container">
        <a href="{{url('posts')}}" class="my-3 btn btn-success">⬅️Back</a>
        <h3>Edit Post</h3>
            <form  action="{{url('posts/'.$post->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group my-2">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group my-2">
                    <label for="">Content</label>
                    <input type="text" name="content" id="" class="form-control" value="{{$post->content}}">
                </div>
                <button type="submit" class="btn btn-primary my-2">Update!</button>
            </form>
            <form action="{{url('posts/'.$post->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete!</button>
            </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>