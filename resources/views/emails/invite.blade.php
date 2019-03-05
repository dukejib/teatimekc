<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invitation</title>

    <link href="{{ asset('/css/blog.css') }}" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

</head>
<body>

    <div class="container-fluid">

        <div class="row text-center">
            <div class="col-lg-4">
                <h1>
                    <i class="fa fa-coffee"></i>
                    TeaTime
                    and token is {{ $regToken->regToken->token }}
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow rounded-0">
                    <div class="card card-header rounded-0">
                        Invitation
                    </div>
    
                    <div class="card card-body rounded-0">
                        <h3>Hello! {{ $regToken->regToken->email }}</h3>
                        <h4>You are invited to register with 
                            <a href="https://teatime.karacraft.com">Teatime</a>
                            as a member.
                        </h4>
                    </div>
    
                    <div class="card card-footer rounded-0 bg-success text-white">
                        <a href="{{ url('register').'?regtoken=' . $regToken->regToken->token }}" class="btn btn-primary rounded-0">Register with Teatime</a>
                        {{-- <a href="{{ route('register',['token' => $regToken->regToken->token])  }}" class="btn btn-primary rounded-0">Register with Teatime</a> --}}
                    </div>
                </div>
            </div>
        </div>


    </div>

</body>
</html>