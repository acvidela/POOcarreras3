<?php
abstract class BaseController {
    protected $smarty;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $this->smarty = new Smarty\Smarty();
        $this->smarty->assign('usuario', $_SESSION['usuario'] ?? null);
    }
}