<?php
class systemcontroller extends controller
{
    function index()
    {
        $this->render('view/system/index.php', [], 'layout');
    }
}