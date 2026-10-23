async function addstudent()
{
    const form = document.querySelector('#addStudentForm');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const student = {
            name: document.querySelector('#name').value.trim(),
            email: document.querySelector('#email').value.trim(),
            course: document.querySelector('#course').value.trim(),
            no_phone: document.querySelector('#no_phone').value.trim()
        };

        if(student.name === '' || student.email === '' || student.course === '' || student.no_phone === ''){
            alert('All fields requires');

            return;
        }

        try {
            const response = await fetch('createstudent.php', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(student)
        });

        const result = await response.json();

        if(!response.ok) {
            alert(result.message);
            throw new Error('Respond not okay');

            return;
        }

        if(result.success){
            await showAllStudent();
        }

        console.log(result);

        form.reset();
        // location.reload();
        } catch (error) {
            alert(error.message);
            throw new Error(error);
        }
    });
}

addstudent();

async function showAllStudent()
{
    const list = document.querySelector('#studentList');

    try {
        const response = await fetch('showall.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        const result = await response.json();

        if(!response.ok){
            alert(result.message);
            throw new Error(result.message);

            return;
        }

        console.log(result);

        if (!list) return;

        list.innerHTML = '';

        result.data.forEach((student) => {
            list.innerHTML += `
                                <tr>
                                    <td>${student.id}</td>
                                    <td>${student.name}</td>
                                    <td>${student.email}</td>
                                    <td>${student.course}</td>
                                    <td>${student.no_phone}</td>
                                    <td>
                                        <div class="actions">
                                    <a
                                        href="editstudent.php?id=${student.id}"
                                        class="btn btn-edit"
                                    >Edit</a>

                                    <button
                                        onClick="deleteStudent(${student.id})"
                                        type="button"
                                        class="btn btn-delete"
                                    >Delete</button>
                                </div>
                                    </td>
                                </tr>
                            `
        })
    } catch (error){
        alert(error.message);
        console.log(error);
    }
}

showAllStudent();

async function deleteStudent(id)
{
    try {
        const response = await fetch(`deletestudent.php?id=${id}`, {
            method: 'DELETE'
        });

        const result = await response.json();

        if(!response.ok){
            alert(result.message);

            return;
        }

        console.log(result);

        alert(result.message);

        if(result.success) {
            await showAllStudent();
        }

        // location.reload();
    } catch (error){
        alert(error.message);
        console.error(error);
    }
}

async function showStudent() 
{
    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');

    try {
        const response = await fetch(`show.php?id=${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if(!response.ok){
            alert('respond not okay');

            return;
        }

        const result = await response.json();

        const student = result.data;

        document.querySelector('#editname').value = student.name;
        document.querySelector('#editemail').value = student.email;
        document.querySelector('#editcourse').value = student.course;
        document.querySelector('#editphone').value = student.no_phone;

        console.log(result);
    } catch (error) {
        alert(error);
        console.error(error);
    }
}

showStudent();

async function editStudent()
{
    const form = document.querySelector('#editStudentForm');

    if(!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const params = new URLSearchParams(window.location.search);
        const id = params.get('id');

        const student = {
            name: document.querySelector('#editname').value.trim(),
            email: document.querySelector('#editemail').value.trim(),
            course: document.querySelector('#editcourse').value.trim(),
            no_phone: document.querySelector('#editphone').value.trim(),
        };

        try {
            const response = await fetch(`edit.php?id=${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(student)
            });

            const result = await response.json();

            if(result.success){
                alert(result.message);
                window.location.href = "index.php";
                return;
            }
        } catch (error){
            alert(error);
        }
    })
}

editStudent();