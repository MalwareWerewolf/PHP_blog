<?php 
    if(isset($_SESSION['email'])){
        foreach ($data['posts'] as $post) : ?>
            <form method="post" action="?url=commenti/insert/<?= $post->id ?>">
                <h4>Scrivi un commento</h4>
                <textarea class="form-control" name="testo" id="testo" rows="2" required placeholder="testo"></textarea>
                <br>
                <input type="submit" class="btn btn-primary" value="inserisci">
            </form>
<?php 
        endforeach; 
    }

    else{
        ?><br><p><a href="?url=users/login" class="btn btn-primary">Effettua il login per commentare</a></p><?php 
    }
?>
