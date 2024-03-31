<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Apartment Units</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Apartment</li>
                <li class="breadcrumb-item active">List Apartment Units</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <!-- <th>Floor Number</th>-->
                            <!-- <th>Building</th>-->
                            <th>Unit Number</th>
                            <!-- <th>Unit Name</th>-->
                            <th>Monthly Fee</th>
                            <th>Owner Name</th>
                            <th>Owner Contact (Primary)</th>
                            <th>Owner Contact (Secondary)</th>
                            <th>Owner Email</th>
                            <!-- <th>Square Footage</th>-->
                            <!-- <th>Available</th>-->
                            <th>Action</th>
                        </thead>
                        <tfoot>
                        <tr>
                            <!-- <th>Floor Number</th>-->
                            <!-- <th>Building</th>-->
                            <th>Unit Number</th>
                            <!-- <th>Unit Name</th>-->
                            <th>Monthly Fee</th>
                            <th>Owner Name</th>
                            <th>Owner Contact (Primary)</th>
                            <th>Owner Contact (Secondary)</th>
                            <th>Owner Email</th>
                            <!-- <th>Square Footage</th>-->
                            <!-- <th>Available</th>-->
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach ($apartmentUnits as $apartmentUnit) { ?>
                            <tr>
                                <td><?= $apartmentUnit->unit_no ?></td>
                                <td><?= $apartmentUnit->monthly_fee ?></td>
                                <td><?= $apartmentUnit->owner_name ?></td>
                                <td><?= $apartmentUnit->owner_contact_no_1 ?></td>
                                <td><?= $apartmentUnit->owner_contact_no_2 ?></td>
                                <td><?= $apartmentUnit->owner_email ?></td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm edit-btn-units"
                                            href="<?= ROOT_DIRECTORY . PAGE_URL_EDIT_APARTMENT_UNIT
                                            . "/" . $apartmentUnit->id ?>">Edit
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm delete-btn-units"
                                            onclick="deleteItem(<?= $apartmentUnit->id ?>)">Delete
                                    </button>
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
        var deleteUrl = '<?=ROOT_DIRECTORY . PAGE_URL_DELETE_APARTMENT_UNIT . "/" ?>';

        function deleteItem(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteUrl += id;
                    fetch(deleteUrl, {
                        method: 'POST'
                    }).then(response => {
                        location.reload();
                    });

                }
            });
        }

    </script>

    <?php
    $this->view("/includes/footer", $data);
    ?>
