<h1>Elenco utenti</h1>
<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['utenti'] as $utente) : ?>
        <tr>
            <td class="nomeutente"><?= $utente ?></td>
            <td><a class="btn btn-warning anvedi" title="<?= $utente->id ?>" href='?url=users/vista/<?= $utente->id ?>'>vedi profilo</a></td>
            <?php if(!empty($_SESSION['admin'])):?>
                <td><a href="?url=users/delete/<?= $utente->id ?>" class="btn btn-danger">elimina</a></td>
            <?php endif; ?>              
        </tr>
    <?php endforeach; ?>
</table>

