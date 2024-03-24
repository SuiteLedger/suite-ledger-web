<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Subscription</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Subscription</a></li>
                <li class="breadcrumb-item active">Manage-subscription</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Buildings Allowed</th>
                            <th>Units Allowed</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Buildings Allowed</th>
                            <th>Units Allowed</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td>John Smith</td>
                            <td>123</td>
                            <td>123</td>
                            <td>On Hold</td>
                            <td>
                                <button type="button" href="#"
                                        class="btn btn-success btn-sm edit-btn">Start
                                </button>
                                <button type="button" class="btn btn-danger btn-sm delete-btn">Hold</button>
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
                window.location.href = "edit-apartment-complex.php"; // Replace with actual edit URL
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const confirmation = confirm("Are you sure you want to delete this apartment complex?");
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
