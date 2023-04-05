<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-2 text-gray-800">Task list</h1>
        </div>
        <div class="col-6 text-right">
            <a name="" id="" class="btn btn-primary" href="<?= href('todos', 'create') ?>" role=" button">Create new
                task</a>
        </div>
    </div>
    <div class="">
        <?= $this->get_error('alert') ?>
    </div>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Task list has <b><?= count($list) ?></b> item</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                        ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td><?= $item->name ?></td>
                            <td><?= $item->title ?></td>
                            <td><?= $item->description ?></td>
                            <td><?= date("Y-m-d", strtotime($item->deadline)) ?></td>
                            <td> <?= $item->status ?></td>
                            <td>
                                <a name="" id="" class="btn btn-primary btn-sm"
                                    href="<?= href('todos', 'edit', ['id' => $item->id]) ?>" role="button">Edit</a>
                                <a name="" id="" class="btn btn-danger btn-sm"
                                    href="<?= href('todos', 'delete', ['id' => $item->id]) ?>"
                                    onclick="return confirm('Bạn có muốn xóa dòng này không?')" role="button">Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->