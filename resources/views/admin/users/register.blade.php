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

</head>

<body>

    <div class="form-popup">

        <div class="form-box signup">
            <div class="form-details">
                <h2>Create Account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>
            </div>

            <div class="form-content">
                <h2>SIGNUP</h2>
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Xəta! </strong> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Təbriklər! </strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <form action="{{route('admin.postregister')}}" method="POST">
                    @csrf

                    <!-- Name Sahəsi -->
                    <div class="input-field">
                        <input type="text" name="name" value="" required>
                        <label>Adınızı yazın</label>
                        @error('name')
                        <div class="error text-danger"></div>
                        @enderror
                    </div>

                    <!-- Email Sahəsi -->
                    <div class="input-field">
                        <input type="email" name="email" value="" required>
                        <label>Emailnizi yazın</label>
                        @error('email')
                        <div class="error text-danger"></div>
                        @enderror
                    </div>

                    <!-- Password Sahəsi -->
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Şifrənizi yazın</label>
                        @error('password')
                        <div class="error text-danger"></div>
                        @enderror
                    </div>

                    <!-- Confirm Password Sahəsi -->
                    <div class="input-field">
                        <input id="confirm_password" type="password" name="password_confirmation" required>
                        <label for="confirm_password">Şifrəni təkrar yazın</label>
                        @error('password_confirmation')
                        <div class="error text-danger"></div>
                        @enderror
                    </div>

                    <div class="input-field">
                        <input type="hidden" name="role" value="user">
                    </div>

                    <button type="submit">Sign Up</button>
                </form>

            </div>
        </div>
    </div>
    <script src="{{asset('/')}}loginandregister/script.js" defer></script>
</body>

</html>