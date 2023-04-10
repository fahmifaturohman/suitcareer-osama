<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="{{asset('template/')}}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content" style="background:#f8f9fa">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header text-white bg-primary">
                                    <h3 class="text-center font-weight-light my-4">LOGIN</h3>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" type="email" placeholder="name@example.com" />
                                            <label for="email">Email address</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror" name="password" id=" password" type="password" placeholder="Password" />
                                            <label for="password">Password</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="d-grid mt-5">
                                            <button type="submit" class="btn btn-dark btn-block pt-3 pb-3">Login</button>
                                        </div>

                                    </form>
                                    <div class="text-center pt-4 pb-3">
                                    <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <!-- <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Os 2022</div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('template/')}}/js/scripts.js"></script>
</body>

</html>