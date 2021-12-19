<?php

use core\Controller;

class IndexController extends Controller
{
    public function indexAction() 
    {    
        
        $this->view->render('Main page');
    }

}