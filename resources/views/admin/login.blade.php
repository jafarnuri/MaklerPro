<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Login & Signup Form | CodingNepal</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="{{asset('/')}}loginandregister/style.css">
    <script src="{{asset('/')}}loginandregister/script.js" defer></script>
</head>

<body>

    <div class="form-popup">

        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay connected with us.</p>
            </div>

            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="{{route('postlogin')}}" method="POST">
                    @csrf

                    <!-- Email Sahəsi -->
                    <div class="input-field">
                        <input type="email" name="email" value="" required>
                        <label>Email</label>
                        @error('email')
                            <div class="error text-danger"></div>
                        @enderror
                    </div>

                    <!-- Şifrə Sahəsi -->
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                        @error('password')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Giriş düyməsi -->
                    <button type="submit">Log In</button>
                </form>


            </div>
        </div>

    </div>
</body>

</html>