<?php
class usercontroller extends controller
{
    function forgotpassword()
    {
        $this->render('view/user/forgot-password.php', [], 'emptylayout');
    }

    function register()
    {
        $this->render('view/user/register.php', [], 'emptylayout');
    }

    function login()
    {
        $tb  = '';
        if (isset($_POST['username'], $_POST['password'])) {
            $obj = new user();
            $user = $obj->login($_POST['username'], $_POST['password']);
            $obj->disconnect();
            if ($user) {
                if ($user->status == 1) {
                    $_SESSION['status_login'] = true;
                    $_SESSION['name_login'] = $user->name;
                    $_SESSION['avt_login'] = $user->image;
                    redirect(href('system', 'index'));
                } else {
                    $tb = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>Tài khoản bị khóa</strong> 
                </div>
                
                <script>
                  $(".alert").alert();
                </script>';
                }
            } else {
                $tb = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong>Thông tin đăng nhập không đúng</strong> 
              </div>
              
              <script>
                $(".alert").alert();
              </script>';
            }
        }
        $this->render('view/user/login.php', ['tb' => $tb], 'emptylayout');
    }
    function logout()
    {
        session_destroy();
        redirect(href('user', 'login'));
    }
}
