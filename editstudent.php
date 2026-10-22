
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <main class="container">

        <header>
            <h1>Edit Student</h1>
            <p>Update student information.</p>
        </header>

        <section class="card">

            <div class="edit-header">
                <h2>Student Details</h2>

                <a href="index.html" class="btn btn-home">
                    Home
                </a>
            </div>

            <form id="editStudentForm">

                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="Ahmad"
                        placeholder="Enter student name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="ahmad@example.com"
                        placeholder="Enter student email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="course">Course</label>
                    <input
                        type="text"
                        id="course"
                        name="course"
                        value="Computer Science"
                        placeholder="Enter student course"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        value="012-3456789"
                        placeholder="Enter phone number"
                        required
                    >
                </div>

                <div class="actions form-actions">
                    <button type="submit" class="btn btn-add">
                        Update Student
                    </button>

                    <a href="index.html" class="btn btn-cancel">
                        Cancel
                    </a>
                </div>

            </form>

        </section>

    </main>

    <script src="app.js"></script>

</body>
</html>
