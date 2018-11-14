<h1>Dettaglio utenti</h1>

<p><a href="?url=users/index" class="btn btn-primary">elenco</a></p>

<?php foreach ($data['utenti'] as $utente) : ?>

    <h2><?= $utente->nome ?><?= $utente->cognome ?></h2>
    <h3><?= $utente ?></h3>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis natus atque minima obcaecati molestiae maiores eius consequuntur assumenda cumque sint velit, suscipit inventore, necessitatibus ducimus mollitia. Fuga deserunt vel itaque.</p>
    
    <?php endforeach; ?>
    <p><a href="?url=users/delete/<?= $utente->id ?>" class="btn btn-danger">elimina</a></p>