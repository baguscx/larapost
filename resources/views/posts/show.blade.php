<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Details Post : </title>
</head>
<body>
    <div class="container">
        <a href="{{url('posts')}}" class="my-3 btn btn-success">⬅️Back</a>
        <div class="card">
            <div class="card-body">
                <h3> {{$post->title}} </h3>
                <p> {{date("H:i - d F Y", strtotime($post->updated_at));}} </p>
                <p> {{$post->content}} </p>
            </div>
        </div>
        @if($total_comments >= 1)
            <div class="small-muted mt-3">{{$total_comments}} Komentar</div>
            @foreach($comments as $comment)
                <div class="card mb-2">
                    <div class="card-body"><small>{{$comment->comment}}</small></div>
                </div>
            @endforeach
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>