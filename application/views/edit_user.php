<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">
            <h3>Edit User</h3>
        </div>

        <div class="card-body">

            <form method="post" action="<?= base_url('user/update/'.$user->id) ?>">

                <div class="mb-3">
                    <label class="form-label">Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="<?= $user->name ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?= $user->email ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile</label>

                    <input type="text"
                           name="mobile"
                           class="form-control"
                           value="<?= $user->mobile ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <br>

                    <input type="radio"
                           name="gender"
                           value="Male"
                           <?= ($user->gender == 'Male') ? 'checked' : '' ?>>
                    Male

                    <input type="radio"
                           name="gender"
                           value="Female"
                           class="ms-3"
                           <?= ($user->gender == 'Female') ? 'checked' : '' ?>>
                    Female
                </div>

                <div class="mb-3">
                    <label class="form-label">State</label>

                    <select name="state_id" class="form-select" required>

                        <option value="">Select State</option>

                        <?php foreach($states as $state){ ?>

                            <option value="<?= $state->id ?>"
                                <?= ($user->state_id == $state->id) ? 'selected' : '' ?>>

                                <?= $state->state_name ?>

                            </option>

                        <?php } ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Update User
                </button>

                <a href="<?= base_url('user') ?>" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>