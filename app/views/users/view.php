<h1>Profilo autore</h1>


<?php foreach ($data['utenti'] as $utente) : ?>

    <h2><?= $utente->cognome ?></h2>
    <h3><?= $utente->nome ?></h3>
    <h4><?= $utente->ruolo ?></h4>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis natus atque minima obcaecati molestiae maiores eius consequuntur assumenda cumque sint velit, suscipit inventore, necessitatibus ducimus mollitia. Fuga deserunt vel itaque.</p>
    
<?php endforeach; ?>