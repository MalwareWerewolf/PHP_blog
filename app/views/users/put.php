<h1>Inserisci nuovo utente</h1>
<p><a href="?url=users/index" class="btn btn-secondary">elenco</a></p>

<form method="post" action="?url=users/insert">
    <input class="form-control" type="text" name="nome" id="nome" placeholder="nome" required>
    <input class="form-control" type="text" name="cognome" id="cognome" placeholder="cognome" required>
    <input class="form-control" type="email" name="email" id="email" placeholder="email" required>
    <input class="form-control" type="password" name="password" id="password" placeholder="password" required>
    <input class="form-control" type="text" name="ruolo" id="ruolo" placeholder="ruolo" required>
    <br>
    <input type="submit" class="btn btn-primary" value="inserisci">
</form>