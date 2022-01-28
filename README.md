# La base d'un serveur WebSocket en PHP, avec Ratchet

Plus simple, tu meurs, le serveur va log des messages
quand quelqu'un se connecte, se déconnecte ou envoie
un message

Le catch, c'est que ça tourne sur une stack Docker et
qu'on va pouvoir étendre ça dans les prochains épisodes !

Pour la lancer, rien de plus simple, docker-compose embarque
directement la commande d'initialisation donc :

````
docker-compose up
````

Puis rendez-vous sur le port ws://localhost:8080

## Having fun ?
Pour la drôlerie, ouvrez plusieurs navigateurs et, dans
la console, collez ça et regarder le s'afficher sur les
autres et dans les logs de notre app PHP

````
var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    console.log(e.data);
};
````

Pour envoyer un message

````
conn.send('Hello World!');
````