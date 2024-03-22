<?php
include_once ('header.php');

?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Payment History</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Payment History</a></li>
      </ol>
      <div class="card mb-4">
        <div class="card-body">
        <div class="text-right mb-3">
            <button type="button" id="export-to-csv" class="btn btn-primary">Export to CSV</button>
          </div>
        <table id="datatablesSimple">
  <thead>
    <tr>
      <th>Payment Id</th>
      <th>Apartment Unit</th>
      <th>Amount</th>
      <th>Submitted By</th>
      <th>Submitted Date</th>
      <th>Comment By Submitter</th>
      <th>Payment Type</th>
      <th>Payment Date</th>
      <th>Payment Proof</th>
      <th>Status</th>
      <th>Reviewed By</th>
      <th>Reviewed Date</th>
      <th>Comment By Reviewer</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Payment Id</th>
      <th>Apartment Unit</th>
      <th>Amount</th>
      <th>Submitted By</th>
      <th>Submitted Date</th>
      <th>Comment By Submitter</th>
      <th>Payment Type</th>
      <th>Payment Date</th>
      <th>Payment Proof</th>
      <th>Status</th>
      <th>Reviewed By</th>
      <th>Reviewed Date</th>
      <th>Comment By Reviewer</th>
    </tr>
  </tfoot>
  <tbody>
    <tr>
      <td>PAY-00001</td>
      <td>Unit 102, Building B</td>  <td>$1,500.00 (USD)</td>  <td>John Doe</td>  <td>2024-03-22</td>
      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>  <td>Online Transfer</td>
      <td></td>
      <td><a href="path/to/proof.pdf" target="_blank">View Proof (PDF)</a></td>  <td>Pending</td>
      <td>NULL</td>
      <td>NULL</td>
      <td>NULL</td>
    </tr>
    </tbody>
</table>
        </div>
      </div>
    </div>
  </main>
  <?php include_once ('footer.php'); ?>