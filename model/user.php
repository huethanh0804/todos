<?php
class user extends querybuilder
{
    function __construct()
    {
        parent::__construct();
    }
    function login($user, $pass)
    {
        return $this->item('users', ['username' => $user, 'password' => $pass]);
    }
}
