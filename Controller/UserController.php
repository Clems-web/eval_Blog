<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;

Class UserController {

    use RenderViewTrait;

    public function user() {

        $this->render('connection', 'Connection');
    }




}
