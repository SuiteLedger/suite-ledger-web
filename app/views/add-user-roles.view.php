<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User Roles</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">User Roles</a></li>
                <li class="breadcrumb-item active">Add a User Role</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="add-user-role.php" id="add-user-role-form">
                        <div class="form-group mb-3">
                            <label for="role">Role:</label>
                            <input type="text" class="form-control" id="role" name="role" placeholder="Enter Role"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="user_type">User Type:</label>
                            <input type="text" class="form-control" id="user_type" name="user_type"
                                placeholder="Enter User Type" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description"
                                placeholder="Enter Description" required></textarea>
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