<?php

namespace App\Controllers;

use App\Request;
use App\Controller;
use App\Session;

final class LogoutController extends Controller
{

    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }
    public function index()
    {
        $db = $this->getDB();
        $dataview = ['title' => 'Todo'];
        $this->render($dataview);
    }

    public function out()
    {
        session_destroy();
        header('Location:' . BASE . 'index');
    }
}
