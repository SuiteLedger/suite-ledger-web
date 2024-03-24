<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User Accounts</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">User Accounts</a></li>
                <li class="breadcrumb-item active">List User Accounts</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>User Type</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Apartment Complex</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>User Type</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Apartment Complex</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td>Property Manager</td>
                            <td>John Smith</td>
                            <td>centralpark@apartments.com</td>
                            <td>555-1234</td>
                            <td>Active</td>
                            <td>
                                <button type="button" href="edit-user-account.php"
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
                window.location.href = "edit-user-account.php"; // Replace with actual edit URL
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const confirmation = confirm("Are you sure you want to delete this user account?");
                if (confirmation) {
                    // Add logic to handle deletion (e.g., redirect to delete script)
                    console.log("Apartment complex deleted!"); // Replace with actual deletion logic
                } else {
                    console.log("Deletion cancelled.");
                }
            });
        });
    </script>

    <?php
    $this->view("/includes/footer", $data);
    ?>
