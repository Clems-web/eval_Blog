<h1>Bienvenue sur ma super home page !</h1>
<span>Welcome <?= $_SESSION['user']->getUsername() ?></span>

<div>
    <a href="?controller=articles">Consulter la liste de nos articles</a>
    <a href="?controller=connection">Se connecter</a>
</div>