<?php
class todos extends querybuilder
{
    function __construct()
    {
        parent::__construct();
    }
    // function _add($user_id, $title, $description, $deadline, $status)
    // {
    //     $sql = 'INSERT INTO `todos` 
    //     (`user_id`, `title`, `description`, `deadline`, `status`) 
    //     VALUES (?,?,?,?,?);';
    //     return $this->setquery($sql)->save([$user_id, $title, $description, $deadline, $status]);
    // }
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
}
