<button id="buttonAdd"><a href="?controller=articles&action=new">Add article</a></button>

<div class="articles">
    <?php
    if(isset($var['articles'])) {
        foreach ($var['articles'] as $article) { ?>
            <article id=article-"<?= $article->getId() ?>">
                <?= $article->getContent() ?>
                <span class="author">Author : <?= $article->getUser()->getUsername() ?></span>
            </article> <?php
        }
    } ?>
</div>