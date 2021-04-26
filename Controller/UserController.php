<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\User\UserManager;

Class UserController {

    use RenderViewTrait;

    public function user() {
        $manager = new UserManager();
        $user = $manager->getUser();

        $this->render('connection', 'Connection');
    }


}
