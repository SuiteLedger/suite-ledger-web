<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Apartment Complexes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Apartment</a></li>
                <li class="breadcrumb-item active">List Apartment Complexes</li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Complex Name</th>
                            <th>Contact Person</th>
                            <th>Contact Number</th>
                            <th>Number of Buildings</th>
                            <th>Number of Units</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Complex Name</th>
                            <th>Contact Person</th>
                            <th>Contact Number</th>
                            <th>Number of Buildings</th>
                            <th>Number of Units</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($apartments as $apartment) { ?>
                            <tr>
                                <td><?= $apartment->name ?></td>
                                <td><?= $apartment->contact_person ?></td>
                                <td><?= $apartment->contact_number ?></td>
                                <td><?= $apartment->no_of_buildings ?></td>
                                <td><?= $apartment->no_of_units ?></td>
                                <td><?= getTypeNameById(getItemStatuses(), $apartment->status) ?></td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm edit-btn"
                                       href="<?= ROOT_DIRECTORY . PAGE_URL_EDIT_APARTMENT_COMPLEX
                                       . "/" . $apartment->id ?>">Edit
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm delete-btn"
                                            onclick="deleteItem(<?= $apartment->id ?>)">Delete
                                    </button>
                                    <a type="button" class="btn btn-primary btn-sm edit-btn"
                                       href="<?= ROOT_DIRECTORY . PAGE_URL_ADD_APARTMENT_UNIT
                                       . "/" . $apartment->id ?>">Add Unit
                                    </a>
                                    <a type="button" class="btn btn-primary btn-sm edit-btn"
                                       href="<?= ROOT_DIRECTORY . PAGE_URL_LIST_APARTMENT_UNIT
                                       . "/" . $apartment->id ?>">List Unit
                                    </a>
                                    <a type="button" class="btn btn-primary btn-sm edit-btn"
                                       href="<?= ROOT_DIRECTORY . PAGE_URL_ADD_USER
                                       . "/" . $apartment->id ?>">Add User
                                    </a>
                                    <a type="button" class="btn btn-primary btn-sm edit-btn"
                                       href="<?= ROOT_DIRECTORY . PAGE_URL_LIST_USER
                                       . "/" . $apartment->id ?>">List User
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>


        </div>
    </main>

    <script>
        var deleteUrl = '<?=ROOT_DIRECTORY . PAGE_URL_DELETE_APARTMENT_COMPLEX. "/" ?>';

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
