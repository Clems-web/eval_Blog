<h1>Bienvenue sur ma super home page !</h1>
    <span>Welcome
        <?php
        if(isset($_SESSION['user'])) {
            echo $_SESSION['user']->getUsername() .",votre rôle est : ".$_SESSION['user']->getRole();
        }
        else {
            echo "guest";
        }
    ?></span>

<div>
    <a href="?controller=articles">Consulter la liste de nos articles</a>
    <a href="?controller=connection">Se connecter</a>
</div>