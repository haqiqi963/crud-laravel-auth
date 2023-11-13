<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="main d-flex justify-content-center align-items-center" style="height: 100vh; box-sizing: border-box;">
            <div class="login-box col-xl-5 col-lg-6 col-md-7 rounded" style="width: 500px; border: solid 1px; padding: 30px;">
                @if (session('status') == 'Sukses')
                    <div class="alert alert-success text-center">
                        {{ session('message') }}
                    </div>
                @elseif(session('status') == 'Gagal')
                    <div class="alert alert-danger text-center">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="" method="post">
                    @csrf
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="example@email.com">
                        @error('email') <small class="text-danger" for="inputError"><strong>{{ $message }}</strong></small> @enderror
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="********">
                        @error('password') <small class="text-danger"><strong>{{ $message }}</strong></small> @enderror
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary form-control">Login</button>
                    </div>
                    <div class="my-3 text-center">
                        Dont Have Account? <a href="/register">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
