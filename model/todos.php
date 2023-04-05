<?php
class todos extends querybuilder
{
    function __construct()
    {
        parent::__construct();
    }
    function _list()
    {
        return $this->select('todos', ['status' => 1]);
    }
    function _item($id)
    {
        return $this->item('todos', ['id' => $id, 'status' => 1]);
    }
    function _itemuser($id)
    {
        return $this->item('users', ['id' => $id, 'status' => 1]);
    }
    function _itemtodo($id)
    {
        return $this->item('todos', ['id' => $id]);
    }
    function _listmenu()
    {
        return $this->setquery(
            'SELECT todos.id, users.name, todos.title, todos.description, todos.deadline, todos_status.status
            FROM  todos 
            LEFT JOIN  users  ON  users .id =  todos.user_id  
            LEFT JOIN  todos_status  ON  todos_status.id  =  todos.status_id
            WHERE todos.status_id != 3;'
        )->rows();
    }
}
