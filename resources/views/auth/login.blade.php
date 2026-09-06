<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentHub - Login</title>
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
            width: min(90%, 410px);
            padding: 30px 28px 27px;
            background: #fffaf6;
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 12px;
            box-shadow: 0 18px 35px rgba(20, 10, 5, .28);
        }

        .brand {
            text-align: center;
            margin-bottom: 26px;
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            margin: 0 auto 10px;
            border-radius: 50%;
            background: #ead9c8;
            color: #70482f;
            font-size: 20px;
        }

        .brand-name {
            margin: 0;
            color: #633e29;
            font-family: Georgia, serif;
            font-size: 24px;
        }

        .brand-subtitle {
            margin: 4px 0 0;
            color: #9b887c;
            font-size: 11px;
        }

        h1 {
            margin: 0 0 5px;
            color: #3d2a20;
            font-family: Georgia, serif;
            font-size: 22px;
        }

        .intro {
            margin: 0 0 22px;
            color: #9b887c;
            font-size: 12px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #5a4032;
            font-size: 11px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #dfd5ce;
            border-radius: 6px;
            background: #fff;
            color: #3d2a20;
            font-size: 12px;
        }

        input:focus {
            outline: none;
            border-color: #805333;
            box-shadow: 0 0 0 3px #f0e3d8;
        }

        .error {
            margin-bottom: 16px;
            padding: 10px;
            border-radius: 6px;
            background: #fbe1dd;
            color: #a33b2d;
            font-size: 12px;
        }

        .success {
            margin-bottom: 16px;
            padding: 10px;
            border-radius: 6px;
            background: #e3f0e1;
            color: #477044;
            font-size: 12px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            margin: 2px 0 20px;
            color: #8d796c;
            font-size: 11px;
            font-weight: normal;
        }

        .remember input {
            width: auto;
            accent-color: #70482f;
        }

        button {
            width: 100%;
            padding: 11px;
            border: 0;
            border-radius: 6px;
            background: #70482f;
            color: white;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
        }

        button:hover {
            background: #5d3824;
        }

        .switch {
            margin: 17px 0 0;
            color: #a08e83;
            text-align: center;
            font-size: 11px;
        }

        a {
            color: #70482f;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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

        <h1>Welcome Back!</h1>
        <p class="intro">Sign in to manage your students.</p>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="login">Username or Email</label>
                <input id="login" type="text" name="login" value="{{ old('login') }}" placeholder="Enter your username or email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Enter your password" required>
            </div>

            <label class="remember">
                <input type="checkbox" name="remember" value="1">
                Remember me
            </label>

            <button type="submit">Login</button>
        </form>

        <p class="switch">Don't have an account? <a href="{{ route('register') }}">Create Account</a></p>
    </main>
</body>
</html>
