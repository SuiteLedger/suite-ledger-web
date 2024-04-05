<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $pageTitle ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Payments</a></li>
                <li class="breadcrumb-item active"><?= $pageTitle ?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Apartment Unit</th>
                            <th>Amount</th>
                            <th>Submitted Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Apartment Unit</th>
                            <th>Amount</th>
                            <th>Submitted Date</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach ($pendingPayments as $pendingPayment) { ?>
                        <tr>
                            <th><?=$pendingPayment->unit_no?></th>
                            <th><?=$pendingPayment->amount?></th>
                            <th><?=$pendingPayment->submitted_date?></th>
                            <td>
                                <a type="button" class="btn btn-primary btn-sm edit-btn-units"
                                   href="<?=ROOT_DIRECTORY . PAGE_URL_REVIEW_PAYMENT . "/" . $pendingPayment->id?>"
                                >Review
                                </a>
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
