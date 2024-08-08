const addButton = document.getElementById('add');
addButton.onclick = function (event) {
    event.preventDefault();

    const nameEl = document.getElementById('add-name');
    const name = nameEl.value;

    const surnameEl = document.getElementById('add-surname');
    const surname = surnameEl.value;

    const positionEl = document.getElementById('add-position');
    const position = positionEl.value;

    const salaryEl = document.getElementById('add-salary');
    const salary = salaryEl.value;


    if (name.length < 3) {
        // nameEl.insertAdjacentHTML('afterend', 'Введите имя не меньше 3 символов');
        document.getElementById('name-label').textContent = 'Введите имя не меньше 3 символов';
    } else if (surname.length < 3) {
        document.getElementById('surname-label').textContent = 'Введите фамилию не меньше 3 символов';
    } else if (position.length < 3) {
        document.getElementById('position-label').textContent = 'Введите должность не меньше 3 символов';
    } else if (salary.length < 3) {
        document.getElementById('salary-label').textContent = 'Введите зарплату не меньше 3 символов';
    } else {
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
            const newTitle = `<li style="list-style-type: none" data-id="${answer.id}"> 
            <h3><span class="item-name">${answer.name}</span><span class="item-surname">${answer.surname}</span></h3>
            <p>Должность: <span class="item-position">${answer.position}</span></p>
            <p>Зарплата: <span class="item-salary">${answer.salary}</span></p>        
            <form method="post" enctype="multipart/form-data">
                <input hidden type="text" class="update-name">
                <input hidden type="text" class="update-surname">
                <input hidden type="text" class="update-position">
                <input hidden type="text" class="update-salary">
                <input type="submit" class="update" value="Внести правки" data-id="${answer.id}">
            </form>
            <br>
            <form method="post" enctype="multipart/form-data">
                <input type="submit" class="delete" value="Уволить" data-id="${answer.id}">
            </form>
        </li>`
            document.querySelector("ul").insertAdjacentHTML("beforeend", newTitle);
            nameEl.value = null;
            surnameEl.value = null;
            positionEl.value = null;
            salaryEl.value = null;

             const addedTitle = document.querySelector(`[data-id="${answer.id}"]`);
             const deleteButton = addedTitle.querySelector('.delete');
             const updateButton = addedTitle.querySelector('.update');
             addDeleteButtonAction(deleteButton);
             addUpdateButtonAction(updateButton);
        })();
    }

}



