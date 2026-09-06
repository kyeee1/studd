<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentHub - Register</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: #382116;
            color: #3d2a20;
        }

        .card {
            width: min(92%, 530px);
            padding: 28px 27px 23px;
            background: #fffaf6;
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 12px;
            box-shadow: 0 18px 35px rgba(20, 10, 5, .28);
        }

        .brand {
            text-align: center;
            margin-bottom: 23px;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            margin: 0 auto 9px;
            border-radius: 50%;
            background: #ead9c8;
            color: #70482f;
            font-size: 19px;
        }

        .brand-name {
            margin: 0;
            color: #633e29;
            font-family: Georgia, serif;
            font-size: 23px;
        }

        .brand-subtitle {
            margin: 3px 0 0;
            color: #9b887c;
            font-size: 10px;
        }

        h1 {
            margin: 0 0 4px;
            color: #3d2a20;
            font-family: Georgia, serif;
            font-size: 21px;
            text-align: center;
        }

        .intro {
            margin: 0 0 22px;
            color: #9b887c;
            font-size: 11px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .password-fields {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #5a4032;
            font-size: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px 11px;
            border: 1px solid #dfd5ce;
            border-radius: 6px;
            background: #fff;
            color: #3d2a20;
            font-size: 11px;
        }

        input:focus {
            outline: none;
            border-color: #805333;
            box-shadow: 0 0 0 3px #f0e3d8;
        }

        .error {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 6px;
            background: #fbe1dd;
            color: #a33b2d;
            font-size: 11px;
        }

        button {
            width: 100%;
            margin-top: 2px;
            padding: 11px;
            border: 0;
            border-radius: 6px;
            background: #70482f;
            color: white;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
        }

        button:hover {
            background: #5d3824;
        }

        .switch {
            margin: 16px 0 0;
            color: #a08e83;
            text-align: center;
            font-size: 10px;
        }

        a {
            color: #70482f;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 500px) {
            .password-fields {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <main class="card">
        <div class="brand">
            <div class="brand-mark" aria-hidden="true">S</div>
            <h2 class="brand-name">StudentHub</h2>
            <p class="brand-subtitle">Student Management System</p>
        </div>

        <h1>Create Account</h1>
        <p class="intro">Register your student management account.</p>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required autofocus>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" placeholder="Choose a username" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required>
            </div>

            <div class="password-fields">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Create a password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your password" required>
                </div>
            </div>

            <button type="submit">Create Account</button>
        </form>

        <p class="switch">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </main>
</body>
</html>
