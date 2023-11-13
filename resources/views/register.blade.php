<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Rental Buku | Register</title>
</head>
<style>
    .main{
        height: 100vh;
    }
    .register-box{
        width: 500px;
        border: solid 1px;
        padding: 30px;
    }
</style>
<body>
<div class="container">
    <div class="main d-flex justify-content-center align-items-center">
        <div class="register-box col-xl-5 col-lg-6 col-md-7 rounded">
            <form action="" method="post">
                @csrf
                <div>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama anda" value="{{ old('name') }}">
                    @error('name') <small class="text-danger"><strong>{{ $message }}</strong></small> @enderror
                </div>
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="example@email.com" value="{{ old('email') }}">
                    @error('email') <small class="text-danger"><strong>{{ $message }}</strong></small> @enderror
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="********">
                    @error('password') <small class="text-danger"><strong>{{ $message }}</strong></small> @enderror
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-primary form-control">Sign Up</button>
                </div>
                <div class="my-3 text-center">
                    Already have account? <a href="login">Login </a>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
