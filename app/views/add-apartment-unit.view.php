<?php
$this->view("/includes/header", $data);
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Apartment Units</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="#">Apartment</a></li>
                    <li class="breadcrumb-item active">Add an Apartment Unit</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="add-apartment-unit.php" id="add-apartment-unit-form">
                            <div class="form-group mb-3">
                                <label for="apartment_complex">Apartment Complex:</label>
                                <select class="form-select" id="apartment_complex" name="apartment_complex">
                                    <option value="complex1">Complex 1</option>
                                    <option value="complex2">Complex 2</option>
                                    <option value="complex3">Complex 3</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="floor_number">Floor Number:</label>
                                <input type="number" class="form-control" id="floor_number" name="floor_number"
                                       placeholder="Enter Floor Number">
                            </div>
                            <div class="form-group mb-3">
                                <label for="building">Building:</label>
                                <select class="form-control" id="building" name="building_id" required>
                                    <option value="">Select Building</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="unit_number">Unit Number:</label>
                                <input type="number" class="form-control" id="unit_number" name="unit_number"
                                       placeholder="Enter Unit Number" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="unit_name">Unit Name (Optional):</label>
                                <input type="text" class="form-control" id="unit_name" name="unit_name"
                                       placeholder="Enter Unit Name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="rent">Monthly Fee:</label>
                                <input type="number" class="form-control" id="rent" name="rent"
                                       placeholder="Enter Monthly Rent" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="owner_name">Owner Name:</label>
                                <input type="text" class="form-control" id="owner_name" name="owner_name"
                                       placeholder="Enter Owner Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="owner_contact_number_1">Owner Contact Number 1:</label>
                                <input type="tel" class="form-control" id="owner_contact_number_1"
                                       name="owner_contact_number_1" placeholder="Enter Owner Contact Number">
                            </div>
                            <div class="form-group mb-3">
                                <label for="owner_contact_number_2">Owner Contact Number 2 (Optional):</label>
                                <input type="tel" class="form-control" id="owner_contact_number_2"
                                       name="owner_contact_number_2" placeholder="Enter Owner Contact Number">
                            </div>
                            <div class="form-group mb-3">
                                <label for="owner_email">Owner Email:</label>
                                <input type="email" class="form-control" id="owner_email" name="owner_email"
                                       placeholder="Enter Owner Email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="square_footage">Square Footage:</label>
                                <input type="number" class="form-control" id="square_footage" name="square_footage"
                                       placeholder="Enter Square Footage" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="available">Available:</label>
                                <select class="form-control" id="available" name="available" required>
                                    <option value="">Select Availability</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
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