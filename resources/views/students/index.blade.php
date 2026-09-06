<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentHub - Student Management</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; }
        body { margin: 0; background: #f5eee8; color: #493328; }
        .navbar { min-height: 58px; display: flex; align-items: center; gap: 28px; padding: 0 28px; background: #4a2b1e; color: #fffaf6; }
        .brand { display: flex; align-items: center; gap: 9px; margin-right: 14px; font: bold 20px Georgia, serif; white-space: nowrap; }
        .nav-links { display: flex; align-self: stretch; gap: 4px; }
        .nav-link { display: flex; align-items: center; gap: 7px; padding: 0 15px; color: #eadbd1; font-size: 12px; text-decoration: none; }
        .nav-link.active, .nav-link:hover { background: #603a29; color: #fff; }
        .account { display: flex; align-items: center; gap: 14px; margin-left: auto; }
        .account-info { text-align: right; font-size: 11px; }
        .account-info small { display: block; margin-top: 3px; color: #d9c5b7; font-size: 9px; }
        .logout { padding: 7px 12px; border: 1px solid #a78a78; border-radius: 5px; background: transparent; color: #fffaf6; cursor: pointer; font-size: 10px; }
        .logout:hover { background: #603a29; }
        .container { width: min(94%, 1240px); margin: 25px auto; }
        .heading { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
        h1 { margin: 0 0 5px; color: #382219; font: 28px Georgia, serif; }
        .subtitle { margin: 0; color: #8d7668; font-size: 11px; }
        .date { padding: 9px 13px; border: 1px solid #e5d8cf; border-radius: 6px; background: #fffaf6; color: #765d4e; font-size: 10px; }
        .stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 17px; margin-bottom: 17px; }
        .stat-card { min-height: 88px; display: flex; justify-content: space-between; padding: 16px; border: 1px solid #eaded5; border-radius: 8px; background: #fffaf6; box-shadow: 0 4px 12px rgba(80, 43, 25, .07); }
        .stat-label { margin: 0 0 9px; color: #8e7567; font-size: 10px; }
        .stat-value { margin: 0; color: #3d281d; font-size: 20px; font-weight: bold; }
        .stat-note { display: block; margin-top: 7px; color: #799174; font-size: 9px; }
        .stat-icon { width: 34px; height: 34px; display: grid; place-items: center; align-self: center; border-radius: 7px; background: #edddcd; color: #70482f; font-size: 16px; }
        .table-card { overflow: hidden; border: 1px solid #eaded5; border-radius: 8px; background: #fffaf6; box-shadow: 0 4px 12px rgba(80, 43, 25, .07); }
        .table-heading { display: flex; align-items: center; justify-content: space-between; padding: 14px 16px; border-bottom: 1px solid #eaded5; }
        .table-heading h2 { margin: 0 0 4px; color: #573626; font: bold 15px Georgia, serif; }
        .table-heading p { margin: 0; color: #a08879; font-size: 10px; }
        .add-btn { color: #70482f; font-size: 10px; font-weight: bold; text-decoration: none; }
        .add-btn:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; }
        th { padding: 10px 20px; border-bottom: 1px solid #eaded5; color: #8e7567; font-size: 9px; text-align: left; text-transform: uppercase; }
        td { padding: 12px 20px; border-bottom: 1px solid #f0e7e1; color: #644d40; font-size: 10px; }
        tr:last-child td { border-bottom: 0; }
        .student-name { color: #493126; font-weight: bold; }
        .course-badge { padding: 4px 8px; border-radius: 12px; background: #edddcd; color: #70482f; font-size: 9px; }
        .actions { display: flex; gap: 7px; }
        .action-btn { padding: 5px 8px; border: 0; border-radius: 4px; font-size: 9px; text-decoration: none; cursor: pointer; }
        .view { background: #f0e4da; color: #70482f; }
        .edit { background: #70482f; color: white; }
        .delete { background: #f8e1dc; color: #a54436; }
        .empty { padding: 35px; color: #9b887c; text-align: center; }
        @media (max-width: 800px) {
            .navbar { gap: 12px; padding: 0 15px; }
            .nav-links { display: none; }
            .stats { grid-template-columns: repeat(2, 1fr); }
            .container { width: 92%; }
        }
        @media (max-width: 560px) {
            .heading { align-items: flex-start; flex-direction: column; gap: 12px; }
            .stats { grid-template-columns: 1fr; }
            .account-info { display: none; }
            .table-card { overflow-x: auto; }
            table { min-width: 650px; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="brand">StudentHub</div>
        <div class="nav-links">
            <a class="nav-link active" href="{{ route('students.index') }}">▦ Dashboard</a>
            <a class="nav-link" href="{{ route('students.create') }}">＋ Add Student</a>
        </div>
        <div class="account">
            <div class="account-info">
                {{ auth()->user()->name }}
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout" type="submit">⇥ Logout</button>
            </form>
        </div>
    </nav>

    <main class="container">
        <div class="heading">
            <div>
                <h1>Student Management</h1>
                <p class="subtitle">Welcome back, {{ auth()->user()->name }}! Here's what's happening today.</p>
            </div>
            <div class="date">▣ {{ now()->format('F j, Y') }}</div>
        </div>

        <section class="stats">
            <article class="stat-card">
                <div>
                    <p class="stat-label">Total Students</p>
                    <p class="stat-value">{{ $students->count() }}</p>
                    <span class="stat-note">↑ Active records</span>
                </div>
                <div class="stat-icon">♙</div>
            </article>
            <article class="stat-card">
                <div>
                    <p class="stat-label">Courses</p>
                    <p class="stat-value">{{ $students->pluck('course')->unique()->count() }}</p>
                    <span class="stat-note">Unique courses</span>
                </div>
                <div class="stat-icon">▤</div>
            </article>
            <article class="stat-card">
                <div>
                    <p class="stat-label">Subjects</p>
                    <p class="stat-value">{{ $students->pluck('subject')->unique()->count() }}</p>
                    <span class="stat-note">Subjects tracked</span>
                </div>
                <div class="stat-icon">▥</div>
            </article>
            <article class="stat-card">
                <div>
                    <p class="stat-label">Account</p>
                    <p class="stat-value">Active</p>
                    <span class="stat-note">Signed in securely</span>
                </div>
                <div class="stat-icon">♙</div>
            </article>
        </section>

        @if(session('success'))
            <div style="margin-bottom: 17px; padding: 11px 15px; border-radius: 6px; background: #e3f0e1; color: #477044; font-size: 11px;">
                {{ session('success') }}
            </div>
        @endif

        <section class="table-card">
            <div class="table-heading">
                <div>
                    <h2>Recent Students</h2>
                    <p>Latest student records in your system.</p>
                </div>
                <a class="add-btn" href="{{ route('students.create') }}">Add Student →</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>#{{ str_pad((string) $student->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="student-name">{{ $student->name }}</td>
                            <td><span class="course-badge">{{ $student->course }}</span></td>
                            <td>{{ $student->subject }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('students.show', $student->id) }}" class="action-btn view">View</a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="action-btn edit">Edit</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">No students found. Add your first student record to get started.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
