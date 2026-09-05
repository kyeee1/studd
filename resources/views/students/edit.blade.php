<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>StudentHub - Edit Student</title>

<style>
    * {
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        margin: 0;
        background: #f6f3ff;
        color: #29233d;
    }

    .navbar {
        background: linear-gradient(135deg, #6d28d9, #8b5cf6);
        color: white;
        padding: 22px 7%;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
    }

    .logo span {
        color: #e9d5ff;
    }

    .container {
        width: 90%;
        max-width: 600px;
        margin: 50px auto;
    }

    .card {
        background: white;
        padding: 35px;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(91, 33, 182, 0.1);
    }

    h1 {
        color: #3b1d6b;
        margin-bottom: 8px;
    }

    .subtitle {
        color: #8b819d;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 7px;
        font-weight: bold;
        color: #4c3b64;
    }

    input {
        width: 100%;
        padding: 13px;
        border: 1px solid #ddd6fe;
        border-radius: 9px;
        outline: none;
        font-size: 15px;
    }

    input:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 0 3px #ede9fe;
    }

    .error {
        background: #fee2e2;
        color: #b91c1c;
        padding: 12px;
        border-radius: 9px;
        margin-bottom: 20px;
    }

    .buttons {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .update-btn {
        background: #6d28d9;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 9px;
        cursor: pointer;
        font-weight: bold;
    }

    .update-btn:hover {
        background: #5b21b6;
    }

    .back-btn {
        background: #f3e8ff;
        color: #6d28d9;
        padding: 12px 20px;
        border-radius: 9px;
        text-decoration: none;
        font-weight: bold;
    }
</style>

</head> 
<body>
<nav class="navbar">
    <div class="logo">
        Student<span>Hub</span>
    </div>
</nav>

<div class="container">

    <div class="card">

        <h1>Edit Student</h1>

        <p class="subtitle">
            Update the student's information.
        </p>

        @if($errors->any())

            <div class="error">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        <form
            action="{{ route('students.update', $student->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Name</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $student->name) }}"
                    placeholder="Enter student name"
                >

            </div>

            <div class="form-group">

                <label>Course</label>

                <input
                    type="text"
                    name="course"
                    value="{{ old('course', $student->course) }}"
                    placeholder="Enter course"
                >

            </div>

            <div class="form-group">

                <label>Subject</label>

                <input
                    type="text"
                    name="subject"
                    value="{{ old('subject', $student->subject) }}"
                    placeholder="Enter subject"
                >

            </div>

            <div class="buttons">

                <button type="submit" class="update-btn">
                    Update Student
                </button>

                <a
                    href="{{ route('students.index') }}"
                    class="back-btn">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body> 
</html>