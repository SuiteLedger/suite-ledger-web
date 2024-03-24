<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Payment Proofs</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Payment Proofs</a></li>
                <li class="breadcrumb-item active">Manage Payment Proofs</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Payment Id</th>
                            <th>Appartment Unit</th>
                            <th>Amount</th>
                            <th>Payment Proof</th>
                            <th>Payment Date</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Submitted Date</th>
                            <th>Reviewed Date</th>
                            <th>Reviewed By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Payment Id</th>
                            <th>Appartment Unit</th>
                            <th>Amount</th>
                            <th>Payment Proof</th>
                            <th>Payment Date</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Submitted Date</th>
                            <th>Reviewed Date</th>
                            <th>Reviewed By</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td>PAY-00001</td>
                            <td>102</td>
                            <td>1,500.00 (LKR)</td>
                            <td><a href="path/to/proof.pdf" target="_blank">View Proof</a></td>
                            <td>2024-03-22</td>
                            <td>Online Transfer</td>
                            <td>Pending</td>
                            <td>2024-03-21</td>
                            <td>2024-03-28</td>
                            <td>Afzhal</td>
                            <td>
                                <button type="button" href="edit-payment-proof.php"
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
                window.location.href = "edit-payment-proof.php"; // Replace with actual edit URL
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const confirmation = confirm("Are you sure you want to delete this payment proof?");
                if (confirmation) {
                    // Add logic to handle deletion (e.g., redirect to delete script)
                    console.log("Payment Proof Unit deleted!"); // Replace with actual deletion logic
                } else {
                    console.log("Deletion cancelled.");
                }
            });
        });
    </script>

    <?php
    $this->view("/includes/footer", $data);
    ?>
