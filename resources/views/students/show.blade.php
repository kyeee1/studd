<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentHub - Student Details</title>
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
        .profile { margin-bottom: 24px; text-align: center; }
        .avatar { width: 62px; height: 62px; display: grid; place-items: center; margin: 0 auto 12px; border-radius: 50%; background: #edddcd; color: #70482f; font: bold 25px Georgia, serif; }
        h1 { margin: 0 0 5px; color: #382219; font: 26px Georgia, serif; }
        .subtitle { margin: 0; color: #8d7668; font-size: 11px; }
        .info { margin-bottom: 10px; padding: 13px 15px; border: 1px solid #eaded5; border-radius: 6px; background: #fff; }
        .label { display: block; margin-bottom: 5px; color: #8e7567; font-size: 10px; }
        .value { color: #493126; font-size: 14px; font-weight: bold; }
        .buttons { display: flex; gap: 10px; margin-top: 22px; }
        .back-btn, .edit-btn { padding: 10px 16px; border-radius: 5px; font-size: 11px; font-weight: bold; text-decoration: none; }
        .back-btn { background: #f0e4da; color: #70482f; }
        .edit-btn { background: #70482f; color: white; }
        @media (max-width: 700px) { .nav-links { display: none; } .account-info { display: none; } }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="brand" href="{{ route('students.index') }}">StudentHub</a>
        <div class="nav-links">
            <a class="nav-link active" href="{{ route('students.index') }}">▦ Dashboard</a>
            <a class="nav-link" href="{{ route('students.create') }}">＋ Add Student</a>
        </div>
        <div class="account">
            <div class="account-info">{{ auth()->user()->name }}</div>
            <form action="{{ route('logout') }}" method="POST">@csrf<button class="logout" type="submit">⇥ Logout</button></form>
        </div>
    </nav>
    <main class="container">
        <section class="card">
            <div class="profile">
                <div class="avatar">{{ strtoupper(substr($student->name, 0, 1)) }}</div>
                <h1>{{ $student->name }}</h1>
                <p class="subtitle">Student Details</p>
            </div>
            <div class="info"><span class="label">Student ID</span><span class="value">#{{ str_pad((string) $studentNumber, 4, '0', STR_PAD_LEFT) }}</span></div>
            <div class="info"><span class="label">Course</span><span class="value">{{ $student->course }}</span></div>
            <div class="info"><span class="label">Subject</span><span class="value">{{ $student->subject }}</span></div>
            <div class="buttons">
                <a href="{{ route('students.index') }}" class="back-btn">← Back to Dashboard</a>
                <a href="{{ route('students.edit', $student->id) }}" class="edit-btn">Edit Student</a>
            </div>
        </section>
    </main>
</body>
</html>
