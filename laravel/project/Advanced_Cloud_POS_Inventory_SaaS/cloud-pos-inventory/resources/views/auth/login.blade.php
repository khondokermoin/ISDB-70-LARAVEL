<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Zircos - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}build/frontend_assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{ asset('') }}build/frontend_assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="{{ asset('') }}build/frontend_assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('') }}build/frontend_assets/css/app.min.css" rel="stylesheet" type="text/css"
        id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('') }}build/frontend_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-start">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center p-xxl-4 p-3 mb-0">
                    <a href="index.html" class="auth-brand mb-4">
                        <img src="{{ asset('') }}build/frontend_assets/images/logo-dark.png" alt="dark logo"
                            height="26" class="logo-dark">
                        <img src="{{ asset('') }}build/frontend_assets/images/logo.png" alt="logo light"
                            height="26" class="logo-light">
                    </a>

                    <h4 class="fw-semibold mb-2 fs-18">Log In to your account</h4>

                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="text-start">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="example-email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" required autofocus
                                autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="example-password">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>

                            <a href="auth-recoverpw.html" class="text-muted border-bottom border-dashed">Forget
                                Password</a>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary fw-semibold" type="submit">Log In</button>
                        </div>
                    </form>

                </div>

                <div class="text-center mt-3">
                    <p class="fs-14 mb-4">Don't have an account? <a href="auth-register.html"
                            class="fw-semibold text-danger ms-1">Sign Up !</a></p>

                    <p class="mt-auto mb-0">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Zircos - By <a href="https://coderthemes.com/" target="_blank"
                            class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Coderthemes</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="{{ asset('') }}build/frontend_assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('') }}build/frontend_assets/js/app.js"></script>

</body>

</html>
