<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <main class="container">

        <header>
            <h1>Student Management</h1>
            <p>Add, view, edit and delete student records.</p>
        </header>

        <!-- Add Student -->
        <section class="card">
            <h2>Add Student</h2>

            <form id="addStudentForm">

                <div class="form-group">
                    <label for="name">Student Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
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
                        placeholder="Enter student course"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input
                        type="tel"
                        id="no_phone"
                        name="phone"
                        placeholder="Enter phone number"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-add">
                    Add Student
                </button>

            </form>
        </section>

        <!-- Show Student -->
        <section class="card">
            <h2>Student List</h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="studentList">

                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>ahmad@example.com</td>
                            <td>Computer Science</td>
                            <td>012-3456789</td>
                            <td>
                                <div class="actions">
                                    <a
                                        href="editstudent.php?id=1"
                                        class="btn btn-edit"
                                    >Edit</a>

                                    <button
                                        type="button"
                                        class="btn btn-delete"
                                        data-id="1"
                                    >Delete</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Siti</td>
                            <td>siti@example.com</td>
                            <td>Information Technology</td>
                            <td>013-4567890</td>
                            <td>
                                <div class="actions">
                                    <a
                                        href="editstudent.php?id=2"
                                        class="btn btn-edit"
                                    >Edit</a>

                                    <button
                                        type="button"
                                        class="btn btn-delete"
                                        data-id="2"
                                    >Delete</button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <script src="app.js"></script>

</body>
</html>
