async function addstudent()
{
    const form = document.querySelector('#addStudentForm');

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
                                        href="editstudent.php?${student.id}"
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

        if(result.success) {
            await showAllStudent();
        }

        // location.reload();
    } catch (error){
        alert(error.message);
        console.error(error);
    }
}