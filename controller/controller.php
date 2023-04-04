<?php
class controller
{
    function _404()
    {
        $this->render('view/system/404.php', [], 'emptylayout');
    }
    //data phai la 1 array có key tự đặt
    function render($view, $data = [], $layout = 'layout')
    {
        if (is_array($data)) {
            extract($data);
        }
        include 'view/' . $layout . '.php';
    }
    function set_error($data = [])
    {
        foreach ($data as $key => $value) {
            $_SESSION['_errors_' . $key] = $value;
        }
    }
    function get_error($key)
    {
        $value = '';
        if (isset($_SESSION['_errors_' . $key])) {
            $value = $_SESSION['_errors_' . $key];
            unset($_SESSION['_errors_' . $key]);
        }
        return $value;
    }
}
