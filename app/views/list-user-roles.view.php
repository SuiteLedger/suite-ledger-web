<?php
$this->view("/includes/header", $data);
?>

    <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $pageTitle ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">User Roles</a></li>
                <li class="breadcrumb-item active">List User Roles</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Role</th>
                            <th>User Type</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Role</th>
                            <th>User Type</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach ($userRoles as $userRole) { ?>
                            <tr>
                                <th><?= $userRole->name ?></th>
                                <th><?= getTypeNameById(getUserTypes(), $userRole->user_type) ?></th>
                                <th><?= empty($userRole->description) ? 'N/A' : $userRole->description ?></th>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm edit-btn"
                                       href="<?= ROOT_DIRECTORY . PAGE_URL_EDIT_USER_ROLE . "/" . $userRole->id ?>"
                                    >
                                        Edit
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm delete-btn"
                                            onclick="deleteRole(<?= $userRole->id ?>)">Delete
                                    </button>
                                </td>
                            </tr>

                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>

        // function delete(id) {
        //     alert(id);
        // }

        var deleteUrl = '<?=ROOT_DIRECTORY . PAGE_URL_DELETE_USER_ROLE . "/" ?>';

        function deleteRole(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteUrl += id;
                    fetch(deleteUrl, {
                        method: 'POST'
                    }).then(response => {
                        location.reload();

                    });

                }
            });
        }

        const editButtons = document.querySelectorAll('.edit-btn');
        const deleteButtons = document.querySelectorAll('.delete-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = "edit-user-role.php"; // Replace with actual edit URL
            });
        });

        // deleteButtons.forEach(button => {
        //     button.addEventListener('click', () => {
        //         const confirmation = confirm("Are you sure you want to delete this user account?");
        //         if (confirmation) {
        //             // Add logic to handle deletion (e.g., redirect to delete script)
        //             console.log("User Role deleted!"); // Replace with actual deletion logic
        //         } else {
        //             console.log("Deletion cancelled.");
        //         }
        //     });
        // });
    </script>

<?php
$this->view("/includes/footer", $data);
?>