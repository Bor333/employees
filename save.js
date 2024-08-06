async function save() {
    const id = document.getElementById('add-id').value;
    console.log(id)
    const name = document.getElementById('add-name').value;
    const surname = document.getElementById('add-surname').value;
    const position = document.getElementById('add-position').value;
    const salary = document.getElementById('add-salary').value;

    const response = await fetch('save.php', {
        method: 'POST',
        headers: new Headers({
            'Content-Type': 'application/json'
        }),
        body: JSON.stringify({
            id: id,
            name: name,
            surname: surname,
            position: position,
            salary: salary
        }), // body data type must match "Content-Type" header
    });
    const answer = await response.json();

    document.getElementById('add-name').value = null;
    document.getElementById('add-surname').value = null;
    document.getElementById('add-position').value = null;
    document.getElementById('add-salary').value = null;

    const updatingTitle = document.querySelector(`[data-id="${answer.id}"]`);

    const updatingName = updatingTitle.querySelector('.item-name');
    updatingName.innerText = answer.name;

    const updatingSurname = updatingTitle.querySelector('.item-surname');
    updatingSurname.innerText = answer.surname;

    const updatingPosition = updatingTitle.querySelector('.item-position');
    updatingPosition.innerText = answer.position;

    const updatingSalary = updatingTitle.querySelector('.item-salary');
    updatingSalary.innerText = answer.salary;

}