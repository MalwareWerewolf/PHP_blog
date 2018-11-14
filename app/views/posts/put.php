<h1>Inserisci nuovo post</h1>

<?php if(!empty($_SESSION['email'])){?>

<form method="post" action="?url=posts/insert">
    <div class="form-group mx-sm-3 mb-2">
        <label for="titolo">titolo</label>
        <input class="form-control" type="text" name="titolo" id="titolo" required placeholder="titolo">
        <label for="sottotitolo">sottotitolo</label>
        <input class="form-control" type="text" name="sottotitolo" id="sottotitolo" required placeholder="sottotitolo">
        <label for="id_autore">autore</label>
        <select required class="form-control" name="id_autore" id="id_autore">
            <option>Scegli autore</option>  
            <?php foreach ($data['utenti'] as $utente) : ?>
                <option value="<?= $utente->id ?>"><?= $utente?></option>
            <?php endforeach; ?>    
        </select>
        <label for="id_categoria">categoria</label>
        <select required class="form-control" name="id_categoria" id="id_categoria">
            <option>Scegli categoria</option>  
            <?php foreach ($data['categorie'] as $categoria) : ?>
                <option value="<?= $categoria->id ?>"><?= $categoria?></option>
            <?php endforeach; ?>    
        </select>
        <label for="testo">testo</label>
        <textarea class="form-control" name="testo" id="testo" required placeholder="testo"></textarea>
        <br>
        <input type="submit" class="btn btn-primary" value="inserisci">
    </div>
</form>

<?php 

} 

else{
    echo "Non hai le autorizzazioni per inserire un post";
}

?>