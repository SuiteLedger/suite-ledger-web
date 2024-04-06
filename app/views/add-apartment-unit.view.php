<?php
$this->view("/includes/header", $data);
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"><?= $pageTitle ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="<?= ROOT_DIRECTORY . PAGE_URL_LIST_APARTMENT_UNIT
                        . "/". $apartmentComplex->id  ?>">Apartment</a>
                    </li>
                    <li class="breadcrumb-item active"><?= $pageTitle ?></li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="<?= ROOT_DIRECTORY . $pageUrl ?>" id="add-apartment-unit-form">

                            <input type="hidden" name="id" value="<?=getInputValue('id')?>">
                            <input type="hidden" name="apartment_complex"
                                   value="<?=$apartmentComplex->id?>">

                            <div class="form-group mb-3">
                                <label for="apartment_complex">Apartment Complex:</label>
                                <select class="form-select" id="apartment_complex" name="apartment_complex" disabled>
                                    <option value="<?=$apartmentComplex->id?>" selected>
                                        <?=$apartmentComplex->name?>
                                    </option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="unit_number">Unit Number:</label>
                                <input type="text" class="form-control" id="unit_number" name="unit_no"
                                       value="<?=getInputValue('unit_no')?>"
                                       placeholder="Enter Unit Number" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="rent">Monthly Fee:</label>
                                <input type="number" class="form-control" id="rent" name="monthly_fee"
                                       value="<?=getInputValue('monthly_fee')?>"
                                       placeholder="Enter Monthly Fee" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="owner_name">Owner Name:</label>
                                <input type="text" class="form-control" id="owner_name" name="owner_name"
                                       value="<?=getInputValue('owner_name')?>"
                                       placeholder="Enter Owner Name" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="owner_contact_number_1">Owner Contact Number 1:</label>
                                <input type="tel" class="form-control" id="owner_contact_number_1"
                                       value="<?=getInputValue('owner_contact_no_1')?>"
                                       name="owner_contact_no_1" placeholder="Enter Owner Contact Number">
                            </div>

                            <div class="form-group mb-3">
                                <label for="owner_contact_number_2">Owner Contact Number 2 (Optional):</label>
                                <input type="tel" class="form-control" id="owner_contact_number_2"
                                       value="<?=getInputValue('owner_contact_no_2')?>"
                                       name="owner_contact_no_2" placeholder="Enter Owner Contact Number">
                            </div>

                            <div class="form-group mb-3">
                                <label for="owner_email">Owner Email:</label>
                                <input type="email" class="form-control" id="owner_email" name="owner_email"
                                       value="<?=getInputValue('owner_email')?>"
                                       placeholder="Enter Owner Email" required>
                            </div>

                            <?php if(!empty(getInputValue('id'))) { ?>
                                <div class="form-group mb-3">
                                    <p>Payment Link:
                                        <a href="<?=ROOT_DIRECTORY . PAGE_URL_UPLOAD_PAYMENT_PROOF
                                        . "/" . getInputValue('id') ?>">
                                            <?=ROOT_DIRECTORY . PAGE_URL_UPLOAD_PAYMENT_PROOF
                                            . "/" . getInputValue('id') ?>
                                        </a>
                                    </p>
                                </div>
                             <?php } ?>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#add-apartment-unit-form").validate({
                    rules: {
                        building_id: "required",
                        unit_number: "required",
                        rent: "required",
                        owner_name: "required",
                        owner_email: {
                            required: true,
                            email: true
                        },
                        square_footage: "required"
                    },
                    messages: {
                        building_id: "Please select a building.",
                        unit_number: "Please enter the unit number.",
                        rent: "Please enter the monthly rent amount.",
                        owner_name: "Please enter the owner's name.",
                        owner_email: {
                            required: "Please enter the owner's email address.",
                            email: "Please enter a valid email address."
                        },
                        square_footage: "Please enter the square footage."
                    },
                    submitHandler: function (form) {
                        form.submit();
                    }
                });
            });
        </script>

<?php
$this->view("/includes/footer", $data);
?>

