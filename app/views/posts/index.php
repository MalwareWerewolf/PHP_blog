<h1>Elenco post</h1>
<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['posts'] as $post) : ?>
        <tr>
            <td class="nomepost"><?= $post ?></td>
            <?php if(!empty($_SESSION['admin'])):?>
                <td><p><a href="?url=posts/delete/<?= $post->id ?>" class="btn btn-danger">elimina</a></p>
            <?php 
                endif; 
                if(!empty($_SESSION['admin']) || !empty($_SESSION['redattore'])):
            ?>     
            <td><p><a href="?url=posts/update/<?= $post->id ?>" class="btn btn-secondary">modifica</a></p>
            <?php endif;?>    
            <td><a  class="btn btn-primary anvedi" title="<?= $post->id ?>" href='?url=posts/vista/<?= $post->id ?>'>leggi tutto</a></td>
        </tr>
    <?php endforeach; ?>
</table>

