<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Zircos - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}frontend_assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{ asset('') }}frontend_assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="{{ asset('') }}frontend_assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('') }}frontend_assets/css/app.min.css" rel="stylesheet" type="text/css"
        id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('') }}frontend_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-start">
        <div class="m-3 row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="p-3 mb-0 overflow-hidden text-center card p-xxl-4">
                    <a href="index.html" class="mb-4 auth-brand">
                        <img src="{{ asset('') }}frontend_assets/images/logo-dark.png" alt="dark logo"
                            height="26" class="logo-dark">
                        <img src="{{ asset('') }}frontend_assets/images/logo.png" alt="logo light"
                            height="26" class="logo-light">
                    </a>

                    <h4 class="mb-2 fw-semibold fs-18">Log In to your account</h4>

                    <p class="mb-4 text-muted">Enter your email address and password to access admin panel.</p>

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

                        <div class="mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>

                            <a href="auth-recoverpw.html" class="border-dashed text-muted border-bottom">Forget
                                Password</a>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary fw-semibold" type="submit">Log In</button>
                        </div>
                    </form>

                </div>

                <div class="mt-3 text-center">
                    <p class="mb-4 fs-14">Don't have an account? <a href="auth-register.html"
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
    <script src="{{ asset('') }}frontend_assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('') }}frontend_assets/js/app.js"></script>

</body>

</html>
