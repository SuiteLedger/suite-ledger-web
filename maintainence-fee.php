<?php
include_once ('header.php');

?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Maintainence Fee</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Maintainence Fee</a></li>
      </ol>
      <div class="card mb-4">
        <div class="card-body">
          <div class="text-right mb-3">
            <button type="button" id="export-to-csv" class="btn btn-primary">Export to CSV</button>
          </div>
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>Apartment Unit</th>
                <th>Balance</th>
                <th>Incoming Balance</th>
                <th>Last Updated Date</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Apartment Unit</th>
                <th>Balance</th>
                <th>Incoming Balance</th>
                <th>Last Updated Date</th>
              </tr>
            </tfoot>
            <tbody>
              <tr>
                <td>00001</td>
                <td>$1,500.00 (USD)</td>
                <td>$1,500.00 (USD)</td>
                <td>2024-03-22</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <?php include_once ('footer.php'); ?>