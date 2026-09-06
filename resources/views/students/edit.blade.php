<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentHub - Edit Student</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; }
        body { margin: 0; background: #f5eee8; color: #493328; }
        .navbar { min-height: 58px; display: flex; align-items: center; gap: 28px; padding: 0 28px; background: #4a2b1e; color: #fffaf6; }
        .brand { display: flex; align-items: center; margin-right: 14px; color: #fffaf6; font: bold 20px Georgia, serif; text-decoration: none; }
        .nav-links { display: flex; align-self: stretch; gap: 4px; }
        .nav-link { display: flex; align-items: center; padding: 0 15px; color: #eadbd1; font-size: 12px; text-decoration: none; }
        .nav-link.active, .nav-link:hover { background: #603a29; color: #fff; }
        .account { display: flex; align-items: center; gap: 14px; margin-left: auto; }
        .account-info { text-align: right; font-size: 11px; }
        .account-info small { display: block; margin-top: 3px; color: #d9c5b7; font-size: 9px; }
        .logout { padding: 7px 12px; border: 1px solid #a78a78; border-radius: 5px; background: transparent; color: #fffaf6; cursor: pointer; font-size: 10px; }
        .container { width: min(92%, 650px); margin: 32px auto; }
        .card { padding: 28px; border: 1px solid #eaded5; border-radius: 8px; background: #fffaf6; box-shadow: 0 4px 12px rgba(80, 43, 25, .07); }
        h1 { margin: 0 0 5px; color: #382219; font: 26px Georgia, serif; }
        .subtitle { margin: 0 0 24px; color: #8d7668; font-size: 11px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; color: #5a4032; font-size: 10px; font-weight: bold; }
        input { width: 100%; padding: 11px; border: 1px solid #dfd5ce; border-radius: 6px; font-size: 12px; }
        input:focus { outline: none; border-color: #805333; box-shadow: 0 0 0 3px #f0e3d8; }
        .error { margin-bottom: 16px; padding: 10px; border-radius: 6px; background: #fbe1dd; color: #a33b2d; font-size: 11px; }
        .buttons { display: flex; gap: 10px; margin-top: 23px; }
        .update-btn, .back-btn { padding: 10px 16px; border-radius: 5px; font-size: 11px; font-weight: bold; text-decoration: none; cursor: pointer; }
        .update-btn { border: 0; background: #70482f; color: white; }
        .back-btn { background: #f0e4da; color: #70482f; }
        @media (max-width: 700px) { .nav-links { display: none; } .account-info { display: none; } }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="brand" href="{{ route('students.index') }}">StudentHub</a>
        <div class="nav-links">
            <a class="nav-link" href="{{ route('students.index') }}">▦ Dashboard</a>
            <a class="nav-link active" href="{{ route('students.create') }}">＋ Add Student</a>
        </div>
        <div class="account">
            <div class="account-info">{{ auth()->user()->name }}</div>
            <form action="{{ route('logout') }}" method="POST">@csrf<button class="logout" type="submit">⇥ Logout</button></form>
        </div>
    </nav>
    <main class="container">
        <section class="card">
            <h1>Edit Student</h1>
            <p class="subtitle">Update the student's information below.</p>
            @if($errors->any())
                <div class="error">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>
            @endif
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group"><label for="name">Student Name</label><input id="name" type="text" name="name" value="{{ old('name', $student->name) }}" placeholder="Enter student name" required autofocus></div>
                <div class="form-group"><label for="course">Course</label><input id="course" type="text" name="course" value="{{ old('course', $student->course) }}" placeholder="Example: BSIT" required></div>
                <div class="form-group"><label for="subject">Subject</label><input id="subject" type="text" name="subject" value="{{ old('subject', $student->subject) }}" placeholder="Example: Web Development" required></div>
                <div class="buttons"><button type="submit" class="update-btn">Update Student</button><a href="{{ route('students.index') }}" class="back-btn">Cancel</a></div>
            </form>
        </section>
    </main>
</body>
</html>
