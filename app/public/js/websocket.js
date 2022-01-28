let messages = document.querySelector('#messages');

if (messages) {
    const conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function (e) {
        console.log("Connection established!");
    };

    conn.onmessage = function (e) {
        let par = document.createElement('p');
        par.innerText = e.data;
        par.className = "text-left";
        messages.appendChild(par);
        console.log(e.data);
    };

    function handleSubmit(event) {
        event.preventDefault();
        let message = document.querySelector('#message').value;
        conn.send(message);
        let par = document.createElement('p');
        par.innerText = message;
        par.className = 'text-center';
        messages.appendChild(par);
        document.querySelector('#message').value = "";
    }
}

