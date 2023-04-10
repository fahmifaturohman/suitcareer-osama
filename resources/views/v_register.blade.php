<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>
    <link href="{{asset('template/')}}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content" style="background:#f8f9fa">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-dark text-white">
                                    <h3 class="text-center font-weight-light my-4">CREATE ACCOUNT</h3>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" placeholder="name" />
                                            <label for="name">Name</label>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" id="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12 pt-3">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="hidden" name="level_user" value="2">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12 pt-3">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    
                                                    <select class="form-control @error('level') is-invalid @enderror" name="level_user" value="{{ old('level_user') }}" id="level_user" placeholder="level_user">
                                                        <option value=""></option>
                                                        <option value="2">Klien</option>
                                                        <option value="1">Admin</option>    
                                                    </select>
                                                    <label for="inputPasswordConfirm">Level</label>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="mb-0 ">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary pt-3 pb-3">
                                                    {{ __('Register') }}
                                                </button></div>
                                        </div>
                                    </form>

                                    <div class="text-center mt-2 pb-3">
                                    <div class="small"><a href="{{ __('login') }}">Have an account? Go to login</a></div>
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
                        <div class="text-muted">Copyright &copy; Polinela <?=date('Y')?></div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('template/')}}/js/scripts.js"></script>
</body>

</html>