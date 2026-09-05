<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>StudentHub - Student Details</title>

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
        max-width: 650px;
        margin: 50px auto;
    }

    .card {
        background: white;
        padding: 35px;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(91, 33, 182, 0.1);
    }

    .profile {
        text-align: center;
        margin-bottom: 30px;
    }

    .avatar {
        width: 75px;
        height: 75px;
        margin: auto;
        border-radius: 50%;
        background: #ede9fe;
        color: #6d28d9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: bold;
    }

    h1 {
        color: #3b1d6b;
        margin-top: 15px;
    }

    .info {
        background: #faf8ff;
        border: 1px solid #eee8f7;
        padding: 17px;
        border-radius: 10px;
        margin-bottom: 12px;
    }

    .label {
        display: block;
        color: #8b819d;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .value {
        font-size: 17px;
        font-weight: bold;
        color: #3b2855;
    }

    .buttons {
        margin-top: 25px;
        display: flex;
        gap: 10px;
    }

    .back-btn,
    .edit-btn {
        padding: 12px 20px;
        border-radius: 9px;
        text-decoration: none;
        font-weight: bold;
    }

    .back-btn {
        background: #f3e8ff;
        color: #6d28d9;
    }

    .edit-btn {
        background: #6d28d9;
        color: white;
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

        <div class="profile">

            <div class="avatar">
                {{ strtoupper(substr($student->name, 0, 1)) }}
            </div>

            <h1>{{ $student->name }}</h1>

        </div>

       <div class="info">

             <span class="label">
                 Student ID
            </span>

             <span class="value">
                  #{{ $studentNumber }}
             </span>
        </div>


        <div class="info">

            <span class="label">
                Course
            </span>

            <span class="value">
                {{ $student->course }}
            </span>

        </div>

        <div class="info">

        <span class="label">
                Subject
        </span>

        <span class="value">
            {{ $student->subject }}
        </span>
    </div>

        </div>

        <div class="buttons">

            <a
                href="{{ route('students.index') }}"
                class="back-btn">
                ← Back
            </a>

            <a
                href="{{ route('students.edit', $student->id) }}"
                class="edit-btn">
                Edit Student
            </a>

        </div>

    </div>

</div>

</body> 
</html>