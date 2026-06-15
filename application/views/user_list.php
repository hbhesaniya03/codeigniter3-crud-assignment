<!DOCTYPE html>
<html>
<head>
    <title>User List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <?php if($this->session->flashdata('success')){ ?>

    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>

    <?php } ?>

    <div class="d-flex justify-content-between mb-3">

        <h2>User Management</h2>

        <a href="<?= base_url('user/create') ?>" class="btn btn-primary">
            Add User
        </a>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>State</th>
                    <th width="180">Action</th>
                </tr>

                </thead>

                <tbody>

                <?php foreach($users as $user){ ?>

                <tr>

                    <td><?= $user->id ?></td>

                    <td><?= htmlspecialchars($user->name) ?></td>

                    <td><?= htmlspecialchars($user->email) ?></td>

                    <td><?= htmlspecialchars($user->mobile) ?></td>

                    <td><?= htmlspecialchars($user->gender) ?></td>

                    <td><?= htmlspecialchars($user->state_name) ?></td>

                    <td>

                        <a href="<?= base_url('user/edit/'.$user->id) ?>"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="<?= base_url('user/delete/'.$user->id) ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete this user?')">
                            Delete
                        </a>

                    </td>

                </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>