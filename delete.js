const deleteButtonArr = document.querySelectorAll('.delete');

addDeleteButtonAction = (deleteButton) => {
    deleteButton.onclick = function (event) {
        event.preventDefault();
        (async () => {
            const id = this.dataset.id;
            const response = await fetch('delete.php', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    id: id
                }), // body data type must match "Content-Type" header
            });
            const answer = await response.json();
            const deletingTitle = document.querySelector(`[data-id="${answer.id}"]`);
            deletingTitle.remove();
        })();
    }
}

deleteButtonArr.forEach((deleteButton) => {
        addDeleteButtonAction(deleteButton);
});

