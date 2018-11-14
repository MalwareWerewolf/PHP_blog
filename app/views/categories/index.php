<h1>Elenco categorie</h1>

<?php  require_once '../app/controllers/posts.php'; if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['categorie'] as $cat) : ?>
        <tr>
        <td class="nomecat"><?= $cat ?></td>
        <td><p><a href="?url=categories/viewPosts/<?= $cat->id ?>" class="btn btn-primary">visualizza i post</a></p>
        <?php if(!empty($_SESSION['admin'])):?>
            <td><p><a href="?url=categories/delete/<?= $cat->id ?>" class="btn btn-danger">elimina</a></p>
        <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>