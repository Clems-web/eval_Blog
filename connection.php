<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/Traits/ManagerTrait.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';

use Model\Manager\UserManager;
use Model\Manager\Traits\ManagerTrait;


if (isset($_POST['username'], $_POST['user-pass'])) {
    $manager = new UserManager();
    $userConnected = $manager->getUser($_POST['username'], $_POST['user-pass']);

    $_SESSION['user'] = $userConnected;

    header('location: index.php');
}


