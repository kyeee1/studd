<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>StudentHub - Students</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        background: #f6f3ff;
        color: #29233d;
    }

    .navbar {
        background: linear-gradient(135deg, #6d28d9, #8b5cf6);
        color: white;
        padding: 22px 7%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
    }

    .logo span {
        color: #e9d5ff;
    }

    .navbar-text {
        font-size: 14px;
        opacity: 0.9;
    }

    .container {
        width: 86%;
        max-width: 1100px;
        margin: 45px auto;
    }

    .welcome {
        margin-bottom: 25px;
    }

    .welcome h1 {
        font-size: 32px;
        color: #3b1d6b;
        margin-bottom: 8px;
    }

    .welcome p {
        color: #7c7196;
    }

    .top-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .student-count {
        background: white;
        padding: 15px 20px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(91, 33, 182, 0.08);
    }

    .student-count strong {
        color: #6d28d9;
        font-size: 20px;
    }

    .add-btn {
        background: #6d28d9;
        color: white;
        padding: 12px 20px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.2s;
    }

    .add-btn:hover {
        background: #5b21b6;
    }

    .table-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(91, 33, 182, 0.08);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #f3e8ff;
        color: #5b21b6;
        text-align: left;
        padding: 15px;
        font-size: 14px;
    }

    td {
        padding: 16px 15px;
        border-bottom: 1px solid #eee8f7;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover {
        background: #faf8ff;
    }

    .student-name {
        font-weight: bold;
        color: #34234f;
    }

    .course-badge {
        background: #ede9fe;
        color: #6d28d9;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }

    .actions {
        display: flex;
        gap: 7px;
    }

    .action-btn {
        border: none;
        padding: 7px 11px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 13px;
        cursor: pointer;
    }

    .view {
        background: #ede9fe;
        color: #6d28d9;
    }

    .edit {
        background: #7c3aed;
        color: white;
    }

    .delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .success {
        background: #dcfce7;
        color: #166534;
        padding: 13px 17px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .empty {
        text-align: center;
        padding: 40px;
        color: #8b819d;
    }

    footer {
        text-align: center;
        color: #9a91a8;
        padding: 25px;
        font-size: 13px;
    }

    @media (max-width: 700px) {
        .navbar {
            padding: 20px;
        }

        .navbar-text {
            display: none;
        }

        .container {
            width: 92%;
            margin: 30px auto;
        }

        .top-section {
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }

        .add-btn {
            text-align: center;
        }

        .table-card {
            padding: 15px;
        }
    }
</style>

    </head> 
    <body>
        <nav class="navbar">
            <div class="logo">
                Student<span>Hub</span>
            </div>

            <div class="navbar-text">
                Student Management System
            </div>
        </nav>

    <div class="container">

        <div class="welcome">
            <h1>Students</h1>
            <p>Manage your student records in one simple place.</p>
        </div>

        @if(session('success'))
            <div class="success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="top-section">

            <div class="student-count">
                Total Students:
                <strong>{{ $students->count() }}</strong>
            </div>

            <a href="{{ route('students.create') }}" class="add-btn">
                + Add Student
            </a>

        </div>

    <div class="table-card">

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
                        <td>{{ $loop->iteration }}</td>

                        <td class="student-name">
                            {{ $student->name }}
                        </td>

                        <td>
                            <span class="course-badge">
                                {{ $student->course }}
                            </span>
                        </td>

                        <td>{{ $student->subject }}</td>

                        <td>
                            <div class="actions">
                                <a href="{{ route('students.show', $student->id) }}" class="action-btn view">
                                    View
                                </a>

                                <a href="{{ route('students.edit', $student->id) }}" class="action-btn edit">
                                    Edit
                                </a>

                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn delete"
                                        onclick="return confirm('Are you sure you want to delete this student?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty">
                            No students found.<br><br>
                            Click "Add Student" to create your first record.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

<footer>
    StudentHub &copy; {{ date('Y') }} — Student CRUD System
</footer>

</body>
 </html>