<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $pageTitle ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="<?= ROOT_DIRECTORY . PAGE_URL_PENDING_PAYMENT
                    . "/" . $apartmentComplex->id ?>">Pending payments</a>
                </li>
                <li class="breadcrumb-item active"><?= $pageTitle ?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">

                    <div class="row">
                        <!-- Start: Left Column -->
                        <div class="col-md-6">
                            <img class="img-fluid mb-3"
                                 src="<?= FILE_UPLOAD_DIRECTORY . "/" . $payment->payment_proof ?>">
                        </div>
                        <!-- End: Left Column -->
                        <!-- Start: Right Column -->
                        <div class="col-md-6">
                            <form id="add-payment-form" method="post"
                                  action="<?=ROOT_DIRECTORY . PAGE_URL_REVIEW_PAYMENT . "/" . $payment->id?>" >

                                <div class="form-group mb-3">
                                    <label for="apartment_units">Apartment Complex</label>
                                    <input type="text" class="form-control" id="apartment_complex"
                                           value="<?= $apartmentComplex->name ?>" disabled>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="apartment_units">Apartment Unit</label>
                                    <input type="text" class="form-control" id="apartment_units"
                                           value="<?= $apartmentUnit->unit_no ?>" disabled>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="submitted_date">Submitted Date</label>
                                    <input type="text" class="form-control" id="submitted_date"
                                           value="<?= $payment->submitted_date ?>" disabled>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="submitted_date">User Submitted Amount</label>
                                    <input type="text" class="form-control" id="submitted_amount"
                                           value="<?= $payment->amount ?>" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="comment_by_submitter">Comment By Submitter:</label>
                                    <textarea class="form-control" id="comment_by_submitter"
                                              disabled><?= $payment->comment_by_submiter ?>
                                    </textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="payment_date">Payment Date:</label>
                                    <input type="date" class="form-control" id="payment_date" name="payment_date"
                                           value="<?=getInputValue('payment_date')?>"
                                    <?=$pendingApproval ? '' : ' disabled' ?>>
                                    <?= displayInputError($errors['payment_date']) ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="amount">Amount:</label>
                                    <input type="number" class="form-control" id="amount" name="amount"
                                           value="<?=getInputValue('amount')?>"
                                        <?=$pendingApproval ? '' : ' disabled' ?>>
                                    <?= displayInputError($errors['amount']) ?>
                                </div>

                                <?php if($pendingApproval) { ?>
                                <div class="form-group mb-3">
                                    <label for="amount">Confirm Amount:</label>
                                    <input type="number" class="form-control" id="amount" name="confirm_amount"
                                           value="<?=getInputValue('confirm_amount')?>">
                                    <?= displayInputError($errors['confirm_amount']) ?>
                                </div>
                                <?php } ?>

                                <div class="form-group mb-3">
                                    <label for="payment_type">Payment Type:</label>
                                    <select class="form-control" id="payment_type" name="payment_type"
                                        <?=$pendingApproval ? '' : ' disabled' ?>>
                                        <?php
                                        foreach ($paymentTypes as $paymentType) {
                                            displaySelectOptions($paymentType->id,
                                                $paymentType->name, getInputValue('payment_type'));
                                        }
                                        ?>
                                    </select>
                                    <?= displayInputError($errors['payment_type']) ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="comment_by_reviewer">Comment By Reviewer:</label>
                                    <textarea class="form-control" id="comment_by_reviewer"
                                              <?=$pendingApproval ? '' : ' disabled ' ?>
                                              name="comment_by_reviewer"
                                    ><?=getInputValue('comment_by_reviewer')?>
                                    </textarea>
                                    <?= displayInputError($errors['comment_by_reviewer']) ?>
                                </div>

                                <input id="buttonAction" type="hidden" value="">

                                <?php if($pendingApproval) { ?>
                                <button type="submit" class="btn btn-primary" name="action" value="approve">
                                    Approve
                                </button>
                                <button type="submit" class="btn btn-danger"name="action" value="reject">
                                    Reject
                                </button>
                                <?php } else { ?>
                                    <a class="btn btn-primary" href="<?= ROOT_DIRECTORY . PAGE_URL_LIST_PAYMENT
                                    . "/" . $apartmentComplex->id ?>">
                                        Back
                                    </a>
                                <?php } ?>
                            </form>
                        </div>
                        <!-- End: Right Column -->

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>

        // const form = document.getElementById('add-payment-form');
        // const buttonAction = document.getElementById('buttonAction');
        //
        // function setButtonAction(action) {
        //     buttonAction.value = action;
        // }
        //
        // form.addEventListener('submit', function(event) {
        //     event.preventDefault();
        //
        //     var formData = new FormData(form);
        //     console.log(formData.get('amount'));
        //
        //     var action = formData.get('action');
        //     console.log(action);
        //
        //     var title = "Approve payment?";
        //     var confirmButtonText = "Yes, Approve!";
        //
        //     if(buttonAction.value == 'reject') {
        //         title = "Reject payment?";
        //         confirmButtonText = "Yes, Reject!";
        //         formData.append('action', 'reject');
        //     } else {
        //         formData.append('action', 'approve');
        //     }
        //
        //     Swal.fire({
        //         title: title,
        //         text: "You won't be able to revert this!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#d33",
        //         cancelButtonColor: "#3085d6",
        //         confirmButtonText: confirmButtonText
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             form.submit();
        //         }
        //     });
        //
        // });

        // addPaymentForm.addEventListener('submit', (event) => {
        //     event.preventDefault(); // Prevent default form submission
        //
        //     const isValid = validateForm();
        //     if (!isValid) {
        //         return; // Don't submit if form is invalid
        //     }
        //
        //     // If validation passes, submit the form
        //     addPaymentForm.submit();
        // });

        function validateForm() {
            let isValid = true;
            const errorMessages = [];

            // Apartment Units
            const apartmentUnits = document.getElementById('apartment_units').value.trim();
            if (apartmentUnits === '') {
                errorMessages.push('Please enter apartment units.');
                isValid = false;
            }

            // Amount
            const amount = document.getElementById('amount').value.trim();
            if (amount === '') {
                errorMessages.push('Please enter an amount.');
            } else if (isNaN(amount) || parseFloat(amount) <= 0) {
                errorMessages.push('Please enter a valid positive amount.');
                isValid = false;
            }

            // Submitted By
            const submittedBy = document.getElementById('submitted_by').value.trim();
            if (submittedBy === '') {
                errorMessages.push('Please enter the submitter\'s name.');
                isValid = false;
            }

            // Submitted Date
            const submittedDate = document.getElementById('submitted_date').value;
            if (submittedDate === '') {
                errorMessages.push('Please select a submitted date.');
                isValid = false;
            }

            // Payment Date (Optional)
            const paymentDate = document.getElementById('payment_date').value;
            if (paymentDate !== '') { // Only validate if a date is entered
                if (new Date(paymentDate) < new Date()) {
                    errorMessages.push('Payment date cannot be in the future.');
                    isValid = false;
                }
            }

            // Payment Type
            const paymentType = document.getElementById('payment_type').value;
            if (paymentType === '') {
                errorMessages.push('Please select a payment type.');
                isValid = false;
            }

            // Payment Proof (Optional)
            const paymentProof = document.getElementById('payment_proof').files;
            // You can add additional validation for file type or size here if needed

            // Status
            const status = document.getElementById('status').value;
            if (status === '') {
                errorMessages.push('Please select a status.');
                isValid = false;
            }

            // Display error messages (if any)
            if (!isValid) {
                alert(errorMessages.join('\n')); // Combine all errors into a single message
            }

            return isValid;
        }


    </script>

    <?php
    $this->view("/includes/footer", $data);
    ?>

