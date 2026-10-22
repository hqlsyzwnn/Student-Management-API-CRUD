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

        console.log(result);

        form.reset();
        } catch (error) {
            alert(error.message);
            throw new Error(error);
        }
    });
}

addstudent();