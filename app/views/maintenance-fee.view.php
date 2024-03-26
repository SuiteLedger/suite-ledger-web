<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Maintenance Fee</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Maintenance Fee</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="text-right mb-3">
                        <button type="button" id="filter-button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#filterModal">Filter</button>
                            <button type="button" id="export-button" class="btn btn-primary" data-bs-toggle="modal">Export CSV</button>
                    </div>
                    <table id="datatablesSimple" class="table">
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
                            <!-- Add more rows as needed -->
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
                                <label for="minApartmentUnit" class="form-label">Minimum Apartment Unit</label>
                                <input type="number" class="form-control" id="minApartmentUnit" name="minApartmentUnit">
                            </div>
                            <div class="col-md-6">
                                <label for="maxApartmentUnit" class="form-label">Maximum Apartment Unit</label>
                                <input type="number" class="form-control" id="maxApartmentUnit" name="maxApartmentUnit">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="minBalance" class="form-label">Minimum Balance</label>
                                <input type="number" class="form-control" id="minBalance" name="minBalance">
                            </div>
                            <div class="col-md-6">
                                <label for="maxBalance" class="form-label">Maximum Balance</label>
                                <input type="number" class="form-control" id="maxBalance" name="maxBalance">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="minIncomingBalance" class="form-label">Incoming Balance Minimum</label>
                                    <input type="number" class="form-control" id="minIncomingBalance"
                                        name="minIncomingBalance">
                                </div>
                                <div class="col-md-6">
                                    <label for="maxIncomingBalance" class="form-label">Incoming Balance Maximum</label>
                                    <input type="number" class="form-control" id="maxIncomingBalance"
                                        name="maxIncomingBalance">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lastUpdatedDate" class="form-label">Last Updated Date</label>
                            <input type="date" class="form-control" id="lastUpdatedDate" name="lastUpdatedDate">
                        </div>

                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>