<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Web Sekolah</title>
    <link rel="stylesheet" href={{asset('assets/bootstrap/css/bootstrap.min.css')}}>
    <script src={{ asset('assets/bootstrap/js/bootstrap.min.js') }}></script>
</head>
<body class="bg-light d-flex align-items-center vh-100">
    <div class="container">

        <div class="row align-items-center justify-content-center">
            <div class="col-md-2 text-center text-md-start mb-4 mb-md-0">
               <img src="{{asset('assets/images/madrasah.jpg')}}" alt="">
    
            </div>

            <div class="col-md-4 text-center text-md-start mb-4 mb-md-0">
                <h1 class="fw-bold">SELAMAT DATANG WEB SEKOLAH MI LEUWISEENG</h1>
    
            </div>
            <div class="col-md-4 col-lg-4">
                            <div class="card shadow-sm">
                                <div class="card-body p-4">
                                    <h4 class="text-center mb-4">Login</h4>
                                    @if ($errors->any())
                                        <div class="alert alert-danger py-2">
                                            <ul class="mb-0 ps-3">
                                                @foreach ($errors->all() as $error)
                                                    <li><small>{{$error}}</small></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        
                                    @endif
                                    <form action="{{route('login.post')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" value="{{old('username')}}" required autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
            
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                                        <a href="{{url('/')}}" >
                                            <span class="icon"><i class="lni lni-grid-alt"></i>
                                            </span>
                                            <span class="text">LandingPage</span>
                                        </a>
                                    </form>
                                </div>
                            </div>
            </div>
        </div>
    </div> 
</body>
</html>