<?php
$this->view("/includes/header", $data);
?>

    <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?=$pageTitle?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= ROOT_DIRECTORY ?>/userRole/list">User Roles</a></li>
                <li class="breadcrumb-item active"><?=$pageTitle?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="<?= ROOT_DIRECTORY . $pageUrl ?>" id="add-user-role-form">
                        <input type="hidden" name="id" value="<?=getInputValue('id')?>">

                        <div class="form-group mb-3">
                            <label for="user_type">User Type:</label>
                            <select class="form-select" id="user_type" name="user_type">
                                <?php
                                foreach (getUserTypes() as $userType) {
                                    displaySelectOptions($userType->getId(),
                                        $userType->getName(), getInputValue('user_type'));
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="role">Role Name:</label>
                            <input type="text" id="role" name="name" placeholder="Enter Role Name"
                                   class="form-control <?= !empty($errors['name']) ? 'border-danger' : '' ?>"
                                   value="<?= getInputValue('name') ?>"
                                   required>
                            <?= !empty($errors['name']) ?
                                "<small class='text-danger'>{$errors['name']}</small>" : '' ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" id="description" name="description"
                                   value="<?= getInputValue('description') ?>"
                                   placeholder="Enter Description" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Permissions:</label>

                            <?php foreach ($permissions as $permission) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           value="<?= $permission->permission ?>"
                                        <?= getInputValue('permissions')
                                        && in_array($permission->permission, getInputValue('permissions'))
                                            ? ' checked ' : '' ?>
                                           name="permissions[]">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?= $permission->name ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#add-user-role-form").validate({
                rules: {
                    role: "required",
                    user_type: "required",
                    name: "required",
                    description: "required"
                },
                messages: {
                    role: "Please enter the role.",
                    user_type: "Please enter the user type.",
                    name: "Please enter the name.",
                    description: "Please enter the description."
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    </script>


<?php
$this->view("/includes/footer", $data);
?>