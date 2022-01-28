<?php

use Cacofony\Helper\AuthHelper;
use App\Entity\User;

?>

<?php if (AuthHelper::isLoggedIn()) : ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?= AuthHelper::getLoggedUser()->getFirstName(); ?>, vous êtes connecté ! <a href="/logout">Logout</a>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        Vous n'êtes pas connecté ! <a href="/login">Login</a>
    </div>
<?php endif; ?>

<h1>Je suis la page d'accueil</h1>

<?php if (AuthHelper::isLoggedIn()) : ?>
    <h2>Le chat</h2>

    <div id="messages"></div>

    <form>
        <input type="text" id="message" class="form-control mb-3">
        <button type="submit" class="btn btn-primary" onclick="handleSubmit(event)">Send</button>
    </form>
<?php endif; ?>

