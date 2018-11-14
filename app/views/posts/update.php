<h1>Modifica il post</h1>

<?php foreach ($data['posts'] as $utente) : ?>
        <form method="post" action="?url=posts/update/<?= $utente->id?>">
    <?php endforeach; ?>

    <label for="titolo">titolo</label>
    <input class="form-control" type="text" name="titolo" id="titolo" required placeholder="titolo">
    <label for="sottotitolo">sottotitolo</label>
    <input class="form-control" type="text" name="sottotitolo" id="sottotitolo" required placeholder="sottotitolo">
    <label for="testo">testo</label>
    <textarea class="form-control" name="testo" id="testo" required placeholder="testo"></textarea>
    <input type="submit" value="inserisci">
</form>