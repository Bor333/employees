const addButton = document.getElementById('add');
addButton.onclick = function (event) {
    event.preventDefault();

    const name = document.getElementById('add-name').value;
    const surname = document.getElementById('add-surname').value;
    const position = document.getElementById('add-position').value;
    const salary = document.getElementById('add-salary').value;

    (async () => {
        const response = await fetch('add.php', {
            method: 'POST',
            headers: new Headers({
                'Content-Type': 'application/json'
            }),
            body: JSON.stringify({
                name: name,
                surname: surname,
                position: position,
                salary: salary
            }), // body data type must match "Content-Type" header
        });
        const answer = await response.json();
        //
        const newTitle = `<li style="list-style-type: none">
            <h3>${answer.name} ${answer.surname}</h3>
            <p>Должность: ${answer.position}</p>
            <p>Зарплата: ${answer.salary}</p>
        </li>`
         document.querySelector("ul").insertAdjacentHTML("beforeend", newTitle);
    })();
}
