<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Apartment Units</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Apartment</a></li>
                <li class="breadcrumb-item active">List Apartment Units</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Floor Number</th>
                            <th>Building</th>
                            <th>Unit Number</th>
                            <th>Unit Name</th>
                            <th>Monthly Fee</th>
                            <th>Owner Name</th>
                            <th>Owner Contact (Primary)</th>
                            <th>Owner Contact (Secondary)</th>
                            <th>Owner Email</th>
                            <th>Square Footage</th>
                            <th>Available</th>
                            <th>Action</th>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Floor Number</th>
                            <th>Building</th>
                            <th>Unit Number</th>
                            <th>Unit Name</th>
                            <th>Monthly Fee</th>
                            <th>Owner Name</th>
                            <th>Owner Contact (Primary)</th>
                            <th>Owner Contact (Secondary)</th>
                            <th>Owner Email</th>
                            <th>Square Footage</th>
                            <th>Available</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Building A</td>
                            <td>101</td>
                            <td>Studio Apartment</td>
                            <td>$1,200</td>
                            <td>Jane Doe</td>
                            <td>(555) 555-1234</td>
                            <td></td>
                            <td>jane.doe@email.com</td>
                            <td>500</td>
                            <td>Yes</td>
                            <td>
                                <button type="button" href="edit-apartment-unit.php"
                                        class="btn btn-primary btn-sm edit-btn-units">Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm delete-btn-units">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        const editButtons = document.querySelectorAll('.edit-btn-units');
        const deleteButtons = document.querySelectorAll('.delete-btn-units');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = "edit-apartment-unit.php"; // Replace with actual edit URL
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const confirmation = confirm("Are you sure you want to delete this apartment unit?");
                if (confirmation) {
                    // Add logic to handle deletion (e.g., redirect to delete script)
                    console.log("Apartment Unit deleted!"); // Replace with actual deletion logic
                } else {
                    console.log("Deletion cancelled.");
                }
            });
        });
    </script>

    <?php
    $this->view("/includes/footer", $data);
    ?>
