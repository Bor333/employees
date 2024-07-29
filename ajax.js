window.onload = function () {
    const addButton = document.getElementById('add');
    addButton.onclick = function (event) {
        event.preventDefault();

        (async () => {
            const name = document.getElementById('add-name').value;
            const surname = document.getElementById('add-surname').value;
            const position = document.getElementById('add-position').value;
            const salary = document.getElementById('add-salary').value;

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

             console.log(answer);
        })();
    }
}