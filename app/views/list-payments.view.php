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
                            <th>Payment Type</th>
                            <th>Submitted Date</th>
                            <th>Reviewed Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Apartment Unit</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Submitted Date</th>
                            <th>Reviewed Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach ($payments as $payment) { ?>
                            <tr>
                                <th><?= $payment->unit_no ?></th>
                                <th><?= $payment->amount ?></th>
                                <th><?= getPaymentTypeNameByTypeId($paymentTypes, $payment->payment_type) ?></th>
                                <th><?= $payment->submitted_date ?></th>
                                <th><?= $payment->reviewed_date ?></th>
                                <th><?= getTypeNameById(getPaymentStatuses(), $payment->status) ?></th>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm edit-btn-units"
                                       href="<?= ROOT_DIRECTORY . PAGE_URL_REVIEW_PAYMENT . "/" . $payment->id ?>"
                                    ><?= $payment->status == PAYMENT_STATUS_PENDING_APPROVAL ? "Review" : "View"?>
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
