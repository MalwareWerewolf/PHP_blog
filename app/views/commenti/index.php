<h1>Elenco commenti</h1>

<?php  require_once '../app/controllers/commenti.php'; if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <tr>
        <td><b>Autore</b></td>
        <td><b>Titolo post</b></td>
        <td><b>Commento</b></td>
        <td><b>Data Commento</b></td>
        <td><b>Approva commento</b></td>
        <td><b>Elimina commento</b></td>
    <tr>
    <?php foreach ($data['commenti'] as $commenti) : ?>      
        <tr>
        <td class="email"><?= $commenti->email?></td>
        <td class="titolo"><?= $commenti->titolo?></td>
        <td class="testoCom"><?= $commenti->testoCom?></td>
        <td class="data"><?= $commenti->dataCommento?></td>
        <td><p><a href="?url=commenti/approvato/<?= $commenti->id_commento ?>" class="btn btn-secondary">approva</a></p>
        <td><p><a href="?url=commenti/deleteFromList/<?= $commenti->id_commento ?>" class="btn btn-danger">elimina</a></p>
        </tr>
    <?php endforeach; ?>
</table>