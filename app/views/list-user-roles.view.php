<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User Accounts</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">User Accounts</a></li>
                <li class="breadcrumb-item active">Manage Roles</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>User Type</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                <th>Updated By</th>
                                <th>Updated Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Role</th>
                                <th>User Type</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                <th>Updated By</th>
                                <th>Updated Date</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                            <th>Administrator</th>
                                <th>Property Manager</th>
                                <th>Fazarath</th>
                                <th>Defines a specific set of permissions and responsibilities within a system.</th>
                                <th>Naveen</th>
                                <th>3/14/2024</th>
                                <th>Rifkhan</th>
                                <th>3/27/2024</th>
                                <td>
                                    <button type="button" href="edit-user-role.php"
                                        class="btn btn-primary btn-sm edit-btn">Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        const editButtons = document.querySelectorAll('.edit-btn');
        const deleteButtons = document.querySelectorAll('.delete-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = "edit-user-role.php"; // Replace with actual edit URL
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const confirmation = confirm("Are you sure you want to delete this user account?");
                if (confirmation) {
                    // Add logic to handle deletion (e.g., redirect to delete script)
                    console.log("User Role deleted!"); // Replace with actual deletion logic
                } else {
                    console.log("Deletion cancelled.");
                }
            });
        });
    </script>

    <?php
    $this->view("/includes/footer", $data);
    ?>