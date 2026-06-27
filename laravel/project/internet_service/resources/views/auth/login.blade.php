<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Amar IT</title>
    
    <!-- Tailwind CSS CDN (স্টাইল সাথে সাথে কাজ করার জন্য) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border-t-4 border-red-600">
        
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-red-600">AMAR <span class="text-gray-800">IT</span></h1>
            <p class="text-gray-500 mt-2 font-medium">Sign in to your account</p>
        </div>

        <!-- Session Status (if any) -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Laravel Error Handling (ভুল পাসওয়ার্ড দিলে এই লাল বক্সটি দেখাবে) -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm font-semibold border border-red-200">
                <i class="fa fa-exclamation-circle mr-1"></i> 
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span><br>
                @endforeach
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-gray-800 font-bold mb-1">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-red-500 outline-none transition-all text-gray-800 font-medium focus:border-red-500">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-800 font-bold mb-1">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" 
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-red-500 outline-none transition-all text-gray-800 font-medium focus:border-red-500">
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" name="remember" 
                           class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500 accent-red-500">
                    <span class="ms-2 text-sm text-gray-800 font-bold">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-red-600 hover:underline font-bold">
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg transition shadow-md mt-4">
                Secure Login
            </button>
        </form>

    </div>

</body>
</html>