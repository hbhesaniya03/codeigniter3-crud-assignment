<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Add User</h3>
        </div>

        <div class="card-body">

            <?= validation_errors('<div class="alert alert-danger">','</div>'); ?>

            <form method="post" action="<?= base_url('user/store') ?>">

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label><br>

                    <input type="radio" name="gender" value="Male"> Male

                    <input type="radio" name="gender" value="Female" class="ms-3"> Female
                </div>

                <div class="mb-3">
                    <label class="form-label">State</label>

                    <select name="state_id" class="form-select">
                        <option value="">Select State</option>

                        <?php foreach($states as $state){ ?>

                            <option value="<?= $state->id ?>">
                                <?= $state->state_name ?>
                            </option>

                        <?php } ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Save User
                </button>

                <a href="<?= base_url('user') ?>" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>