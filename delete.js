const deleteButtonArr = document.querySelectorAll('.delete');

deleteButtonArr.forEach((deleteButton) => {
    {
        deleteButton.onclick = function(event)  {
            event.preventDefault();

            (async () => {
                const id = this.dataset.id;
                console.log(id)
                const response = await fetch('delete.php', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }), // body data type must match "Content-Type" header
                });
                // const answer = await response.json();
                //
                //  console.log(answer);
            })();
        }
    }
});

