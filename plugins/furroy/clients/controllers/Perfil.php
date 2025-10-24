<?php namespace Furroy\Clients\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use BackendAuth;


class Perfil extends Controller
{
    // Sin requiredPermissions: acceso libre a usuarios autenticados

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Furroy.Clients', 'mostrarbiografia');
    }

    public function index()
    {
        $user = BackendAuth::getUser();
        $this->vars['user'] = $user;
    }
}
