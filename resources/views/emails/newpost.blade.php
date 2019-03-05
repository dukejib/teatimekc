<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>New Post @ Teatime</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'/>
</head>
<body>
    
    <div class="container text-center">

        <div class="row text-center">
            <div class="col-lg-4">
                <h1>
                    <i class="fas fa-coffee"></i>
                    TeaTime
                </h1>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-lg-4">
                <h3>
                    Dear Administrator
                    <br>
                    <small>A new post is created at {{ $post->post->created_at->diffForHumans() }}</small>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow rounded-0">
                    <div class="card card-header rounded-0 bg-success text-white">
                        Details of Post
                    </div>
    
                    <div class="card card-body rounded-0 bg-info text-white">
                        <p>
                            The title of the Post is 
                            <h4>{{ $post->post->title }}</h4>
                            The Shortnote 
                            <h4>{{ $post->post->shortnote }}</h4>
                            The Post is authored By
                            <h4>{{ $post->post->user->name }}</h4>
                        </p>
                    </div>
    
                    <div class="card card-footer rounded-0 bg-success text-white">
                        <p>
                            <a href="{{ route('post.show',['id' => $post->post->id]) }}" class="btn btn-secondary rounded-0">View</a>
                            before publishing it?
                        </p>
                        
                        {{-- <p>
                            would you like to publish it?
                            <a href="{{ route('post.publish',['id' => $post->post->id]) }}" class="btn btn-primary rounded-0">Yes! Publish</a>
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>


    </div>
    
</body>
</html>