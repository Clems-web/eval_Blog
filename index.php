<?php

// Un controller chope ce que l'utilisateur cherche à faire ( données entrées, etc.... )
// Il interragit avec le modèle ( adéquat )
// Il affiche la vue adéquate en fonction de la demande de l'utilisateur.

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/Traits/ManagerTrait.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/Traits/RenderViewTrait.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/ArticleManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/HomeController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/ArticleController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/UserController.php';

session_start();

use Controller\HomeController;
use Controller\ArticleController;
use Controller\UserController;
use Model\Entity\User;

// Soit l'url contient le paramètre controller ( $_GET['controller'] => http://localhost?controller=MonSuperController.
if(isset($_GET['controller'])) {

    // Alors, l'utilisateur demande une action à effectuer.
    switch($_GET['controller']) {

        // Affichage de tous les articles.
        case 'articles': // ex: http://localhost?controller=articles
            $controller = new ArticleController();

            // Pour l'ajout / l'édition / la suppression, on va checker un paramètre 'action' => http://localhost?controller=articles&action=new
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        $controller->addArticle($_POST);
                        break;
                    default:
                        break;
                }
            }
            else {
                $controller->articles();
            }

            break;
        case 'connection':


            $controller = new UserController();
            $controller->user();



            break;
        default:
            // Éventuellement, afficher une page 404 not found. Car le controller n'existe pas !
            break;
    }
}
else {
    // Si le paramètre cxontroller ne se trouve pas dans l'url, alors la page 'home' doit être affichée.
    // Donc on part sur le Home controller en demandant d'afficher la home page.
    $controller = new HomeController();
    $controller->homePage();
}

// Soit l'url ne contient pas le paramètre controller.