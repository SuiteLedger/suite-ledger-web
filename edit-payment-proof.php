<?php
include_once ('header.php');

?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Payment Proofs</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Payment Proofs</a></li>
        <li class="breadcrumb-item active">Edit Payment Proofs</li>
      </ol>
      <div class="card mb-4">
        <div class="card-body">
          <form method="post" action="add-payment.php" id="add-payment-form">
            <div class="form-group mb-3">
              <label for="apartment_units">Apartment Unit:</label>
              <input type="text" class="form-control" id="apartment_units" name="apartment_units"
                placeholder="Enter apartment unit" required></input>
            </div>
            <div class="form-group mb-3">
              <label for="amount">Amount:</label>
              <input type="number" disabled class="form-control" id="amount" name="amount" required>
            </div>
            <div class="form-group mb-3">
              <label for="submitted_by">Submitted By:</label>
              <input type="text" class="form-control" id="submitted_by" name="submitted_by"
                placeholder="Enter submitter's name" required>
            </div>
            <div class="form-group mb-3">
              <label for="submitted_date">Submitted Date:</label>
              <input type="date" class="form-control" id="submitted_date" name="submitted_date" required>
            </div>
            <div class="form-group mb-3">
              <label for="comment_by_submitter">Comment By Submitter:</label>
              <textarea class="form-control" disabled id="comment_by_submitter" name="comment_by_submitter"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="payment_date">Payment Date:</label>
              <input type="date" disabled class="form-control" id="payment_date" name="payment_date">
            </div>
            <div class="form-group mb-3">
              <label for="payment_type">Payment Type:</label>
              <select class="form-control" id="payment_type" name="payment_type">
                <option value="">Select Payment Type</option>
                <option value="cash">Cash</option>
                <option value="online_transfer">Online Transfer</option>
                <option value="check">Check</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="payment_proof">Payment Proof:</label>
              <input type="file" class="form-control" id="payment_proof" name="payment_proof">
            </div>
            <div class="form-group mb-3">
              <label for="status">Status:</label>
              <select class="form-control" id="status" name="status">
                <option value="">Select Status</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="reviewed_by">Reviewed By:</label>
              <input type="text" class="form-control" id="reviewed_by" name="reviewed_by">
            </div>
            <div class="form-group mb-3">
              <label for="reviewed_date">Reviewed Date:</label>
              <input type="date" class="form-control" id="reviewed_date" name="reviewed_date">
            </div>
            <div class="form-group mb-3">
              <label for="comment_by_reviewer">Comment By Reviewer:</label>
              <textarea class="form-control" id="comment_by_reviewer" name="comment_by_reviewer"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script>
    const addPaymentForm = document.getElementById('add-payment-form');

    addPaymentForm.addEventListener('submit', (event) => {
      event.preventDefault(); // Prevent default form submission

      const isValid = validateForm();
      if (!isValid) {
        return; // Don't submit if form is invalid
      }

      // If validation passes, submit the form
      addPaymentForm.submit();
    });

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

  <?php include_once ('footer.php'); ?>