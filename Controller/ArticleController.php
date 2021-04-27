<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\Entity\Article;
use Model\Manager\ArticleManager;
use Model\Manager\UserManager;

class ArticleController {

    use RenderViewTrait;

    /**
     * Affiche la liste des articles disponibles.
     */
    public function articles() {
        $manager = new ArticleManager();
        $articles = $manager->getAll();

        $this->render('articles', 'Mes articles', [
            'articles' => $articles,
        ]);
    }

    /**
     * Ajoute un nouvel article.
     */
    public function addArticle($fields){
        if(isset($fields['content'], $fields['user']) && ($_SESSION['user']->getRole() === 'Admin')) {
            // Alors ca veut dure que le formulaire a été envoyé.
            $userManager = new UserManager();
            $articleManager = new ArticleManager();

            $content = htmlentities($fields['content']);
            $user_fk = intval($fields['user']);

            $user = $userManager->getUser($_SESSION['user']->getUsername(), $_SESSION['user']->getPassword());
            if($user) {
                $article = new Article($content, $user);
                $articleManager->add($article);
            }
        }
        else if($_SESSION['user']->getRole() !== 'Admin'){
            echo "Attention : Vous devez être Admin pour pouvoir poster un article !";
        }
        $this->render('add.article', 'Ajouter un article');
    }
}