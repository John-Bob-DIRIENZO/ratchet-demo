let messages = document.querySelector('#messages');

if (messages) {
    const conn = new WebSocket('ws://localhost:8080');

    const user = messages.dataset.user;

    conn.onopen = function (e) {
        console.log("Connection established!");
        conn.send(`${user} vient d\'arriver`);
    };

    conn.onmessage = function (e) {
        let par = document.createElement('p');
        let incomingMessage = JSON.parse(e.data);
        par.innerText = `${incomingMessage.sender} : ${incomingMessage.message}`;
        par.className = "text-left";
        messages.appendChild(par);
    };

    function handleSubmit(event) {
        event.preventDefault();
        let message = document.querySelector('#message').value;
        conn.send(JSON.stringify({
            message: message,
            sender: user
        }));
        let par = document.createElement('p');
        par.innerText = `Me : ${message}`;
        par.className = 'text-center';
        messages.appendChild(par);
        document.querySelector('#message').value = "";
    }
}

