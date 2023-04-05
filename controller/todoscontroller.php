<?php
class todoscontroller extends controller
{
  function index()
  {
    $model = new todos();
    $list = $model->_listmenu();
    $this->render('view/todos/tasklist.php', ['list' => $list], 'layout');
  }
  function delete()
  {
    if (isset($_GET['id']) && $_GET['id']) {
      $model = new todos();
      $todo = $model->_item($_GET['id']);
      if ($todo && $todo->status_id != 3) {
        if ($model->update('todos', ['status_id' => 3], ['id' => $_GET['id']])) {
          $this->set_error(['alert' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>Xóa thành công ID: ' . $_GET['id'] . '</strong> 
                </div>
                
                <script>
                  $(".alert").alert();
                </script>']);
          redirect(href('todos', 'index'));
        } else {
          $this->set_error(['alert' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>Xóa thất bại ID: ' . $_GET['id'] . '</strong> 
                </div>
                
                <script>
                  $(".alert").alert();
                </script>']);
          redirect(href('todos', 'index'));
        }
      } else {
        $this->set_error(['alert' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong>ID: ' . $_GET['id'] . ' không tồn tại</strong> 
              </div>
              
              <script>
                $(".alert").alert();
              </script>']);
        redirect(href('todos', 'index'));
      }
    } else {
      redirect(href('todos', 'index'));
    }
  }
  function edit()
  {
    $id = get('id');
    if (!$id) {
      redirect(href('todos', 'index'));
    }
    $model = new todos();
    $todos = $model->select('todos_status');
    $users = $model->select('users');
    $todo = $model->_itemtodo($id);
    $this->render('view/todos/edit.php', ['todo' => $todo, 'todos' => $todos, 'users' => $users]);
  }
  function update()
  {
    $id = post('id');
    $user_id = post('user_id');
    $title = post('title');
    $description = post('description');
    $deadline = post('deadline');
    $status_id = post('status_id');
    if ($id) {
      $model = new todos();
      $model->update('todos', ['user_id' => $user_id, 'title' => $title, 'description' => $description, 'deadline' => $deadline, 'status_id' => $status_id], ['id' => $id]);
      $this->set_error(['alert' =>
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Task update successful</strong> 
      </div>
    
        <script>
          $(".alert").alert();
        </script>']);
      redirect(href('todos', 'index'));
    } else {
      $this->set_error(['alert' =>
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Update task failed</strong> 
      </div>
    
        <script>
          $(".alert").alert();
        </script>']);
      redirect(href('todos', 'index'));
    }
  }

  function create()
  {
    $model = new todos();
    $todos = $model->select('todos_status');
    $users = $model->select('users');
    $this->render('view/todos/create.php', ['todos' => $todos, 'users' => $users]);
  }

  function insert()
  {
    $title = post('title');
    $description = post('description');
    $deadline = post('deadline');
    $status_id = post('status_id');
    $user_id = post('user_id');
    if ($title && $description && $status_id) {
      $model = new todos();
      $model->insert('todos', ['user_id' => $user_id, 'title' => $title, 'description' => $description, 'deadline' => $deadline, 'status_id' => $status_id]);
      $this->set_error(['alert' =>
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Task create successful</strong> 
      </div>
    
        <script>
          $(".alert").alert();
        </script>']);
      redirect(href('todos', 'index'));
    } else {
      $this->set_error(['alert' =>
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Create task failed</strong> 
      </div>
    
        <script>
          $(".alert").alert();
        </script>']);
      redirect(href('todos', 'index'));
    }
  }
}
