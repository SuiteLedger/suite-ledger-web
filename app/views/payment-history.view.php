<?php
$this->view("/includes/header", $data);
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
                        <button type="button" id="filter-button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#filterModal">Filter</button>
                            <button type="button" id="export-button" class="btn btn-primary" data-bs-toggle="modal">Export CSV</button>
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
                            <td>Unit 102, Building B</td>
                            <td>$1,500.00 (USD)</td>
                            <td>John Doe</td>
                            <td>2024-03-22</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                            <td>Online Transfer</td>
                            <td></td>
                            <td><a href="path/to/proof.pdf" target="_blank">View Proof (PDF)</a></td>
                            <td>Pending</td>
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

    <?php
    $this->view("/includes/footer", $data);
    ?>
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filters</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="filterForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="minPaymentId" class="form-label">Minimum Payment ID</label>
                            <input type="text" class="form-control" id="minPaymentId" name="minPaymentId">
                        </div>
                        <div class="col-md-6">
                            <label for="maxPaymentId" class="form-label">Maximum Payment ID</label>
                            <input type="text" class="form-control" id="maxPaymentId" name="maxPaymentId">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="minAmount" class="form-label">Minimum Amount</label>
                            <input type="number" class="form-control" id="minAmount" name="minAmount">
                        </div>
                        <div class="col-md-6">
                            <label for="maxAmount" class="form-label">Maximum Amount</label>
                            <input type="number" class="form-control" id="maxAmount" name="maxAmount">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="minSubmittedDate" class="form-label">Minimum Submitted Date</label>
                                <input type="date" class="form-control" id="minSubmittedDate" name="minSubmittedDate">
                            </div>
                            <div class="col-md-6">
                                <label for="maxSubmittedDate" class="form-label">Maximum Submitted Date</label>
                                <input type="date" class="form-control" id="maxSubmittedDate" name="maxSubmittedDate">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="minPaymentDate" class="form-label">Minimum Payment Date</label>
                                <input type="date" class="form-control" id="minPaymentDate" name="minPaymentDate">
                            </div>
                            <div class="col-md-6">
                                <label for="maxPaymentDate" class="form-label">Maximum Payment Date</label>
                                <input type="date" class="form-control" id="maxPaymentDate" name="maxPaymentDate">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="payment-type" class="form-label">Payment Type</label>
                        <select class="form-select" id="payment-type" name="payment-type">
                            <option value="">Select Payment Type</option>
                            <option value="Pending">Option</option>
                            <option value="Approved">Option</option>
                            <option value="Rejected">Option</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="apartment-unit" class="form-label">Apartment Unit</label>
                        <select class="form-select" id="apartment-unit" name="apartment-unit">
                            <option value="">Select Apartment Unit</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="">Select Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Apply Filter</button>
                </form>
            </div>
        </div>
    </div>
</div>
