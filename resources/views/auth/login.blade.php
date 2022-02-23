<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <body style="justify-content: center; align-items: center; display: flex;">
        <div class="card m-5" style="width: 1000px;">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
                <form action="{{ route("login") }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control mb-3" required name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control mb-3" required name="password">
                          @error('password')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <label class="form-check-label" for="flexCheckDefault">
                          Remember
                        </label>
                        <input class="form-check-input" type="checkbox" name="remember">
                      </div>
    
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </body>
</body>
</html>