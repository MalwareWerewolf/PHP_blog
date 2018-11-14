<h1>Elenco post</h1>

<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['categorie'] as $categorie) : ?>
        <tr>
            <td class="nomepost"><?= $categorie->titolo ?></td>
            <td class="sottotitolo"><?= $categorie->sottotitolo ?></td>
            <?php if(!empty($_SESSION['admin'])):?>
                <td><p><a href="?url=posts/delete/<?= $categorie->id_post ?>" class="btn btn-danger">elimina</a></p>
            <?php 
                endif; 
                if(!empty($_SESSION['admin']) || !empty($_SESSION['redattore'])):
            ?>    
                <td><p><a href="?url=posts/update/<?= $categorie->id_post ?>" class="btn btn-secondary">modifica</a></p>
            <?php endif;?>    
            <td><a  class="btn btn-primary anvedi" href='?url=posts/vista/<?= $categorie->id_post ?>'>leggi tutto</a></td>
        </tr>
    <?php endforeach; ?>
</table>