<!DOCTYPE html>
<html>
<head>
	<title><?=ucwords(TITOLO) ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="?url="><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Tux.svg/220px-Tux.svg.png" width=50><?= TITOLO ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?url=">Home <span class="sr-only">(current)</span></a>
      </li>
<!-- menu utenti -->
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Utenti</a>
    
	<div class="dropdown-menu">
	  <a class="dropdown-item" href="?url=users/login">Login</a>
		<a class="dropdown-item" href="?url=users/logout">Logout</a>
		<a class="dropdown-item" href="?url=users/signup">Registrati</a>
		<a class="dropdown-item" href="?url=users/index">Elenco</a>
		<a class="dropdown-item" href="?url=users/insert">Aggiungi</a>
	</div>
      </li>
	  
	<!-- menu Categorie -->
	  
	<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorie</a>
    
		<div class="dropdown-menu">
					<a class="dropdown-item" href="?url=categories/index">Elenco</a>
					<a class="dropdown-item" href="?url=categories/insert">Aggiungi</a>
		</div>
	</li>
	  
	<!-- menu Post -->
	  
	<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Post</a>
    
		<div class="dropdown-menu">
					<a class="dropdown-item" href="?url=posts/index">Elenco</a>
					<a class="dropdown-item" href="?url=posts/insert">Aggiungi</a>
		</div>
	</li>

		<!-- menu Commenti -->
	  
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Commenti</a>
    
		<div class="dropdown-menu">
					<a class="dropdown-item" href="?url=commenti/index">Elenco</a>
		</div>
	</li>
	  
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="container"> 

	
