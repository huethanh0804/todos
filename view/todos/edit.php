<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update task</h1>
    <div class="">
        <?= $this->get_error('alert') ?>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> ID task : <?= $todo->id ?> </h6>
        </div>
        <div class="card-body">
            <form action="<?= href('todos', 'update') ?>" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">User</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                        <?php
                        foreach ($users as $user) {
                        ?>
                            <option value="<?= $user->id ?>"><?= $user->name ?? ''  ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="" value="<?= $todo->title ?>">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" id="" rows="3"><?= $todo->description ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Deadline</label>
                    <input type="date" class="form-control" name="deadline" id="" aria-describedby="helpId" placeholder="" value="<?= date("Y-m-d", strtotime($todo->deadline)) ?>">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status_id">
                        <?php
                        foreach ($todos as $status) {
                        ?>
                            <option value="<?= $status->id ?>"><?= $status->status ?? ''  ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <input type="hidden" name="id" value="<?= $todo->id ?>" />
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>

        <!-- /.container-fluid -->