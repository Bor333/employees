const updateButtonArr = document.querySelectorAll('.update');

updateButtonArr.forEach((updateButton) => {
    addUpdateButtonAction(updateButton);
});

function addUpdateButtonAction(updateButton) {
    updateButton.onclick = function (event) {
        event.preventDefault();
        // document.getElementById('add-name').value = document.getElementById('add-name').value;
        (async () => {
            const id = this.dataset.id;
            const response = await fetch('update.php', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    id: id
                }), // body data type must match "Content-Type" header
            });
            const answer = await response.json();
            document.getElementById('add-id').value = answer.id;
            document.getElementById('add-name').value = answer.name;
            document.getElementById('add-surname').value = answer.surname;
            document.getElementById('add-position').value = answer.position;
            document.getElementById('add-salary').value = answer.salary;
            const addButton = document.getElementById('add')
            addButton.value = 'Сохранить';
            addButton.onclick = function (event) {
                event.preventDefault();
                save();
            }
        })();
    }
}