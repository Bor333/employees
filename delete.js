const deleteButtonArr = document.querySelectorAll('.delete');

deleteButtonArr.forEach((deleteButton) => {
    {
        deleteButton.onclick = function(event)  {
            event.preventDefault();

            (async () => {
                console.log(this.dataset.id)
                // const id = document.getElementById('delete-id').value;
                // const response = await fetch('add.php', {
                //     method: 'POST',
                //     headers: new Headers({
                //         'Content-Type': 'application/json'
                //     }),
                //     body: JSON.stringify({
                //         id: id,
                //
                //     }), // body data type must match "Content-Type" header
                // });
                // const answer = await response.json();
                //
                //  console.log(answer);
            })();
        }
    }
});

