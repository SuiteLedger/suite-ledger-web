<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Packages</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Packages</a></li>
                <li class="breadcrumb-item active">Add Package</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="add-package.php" id="add-package-form">
                        <div class="form-group mb-3">
                            <label for="package_name">Package Name:</label>
                            <input type="text" class="form-control" id="package_name" name="package_name"
                                placeholder="Enter Package Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="amount">Amount:</label>
                            <input type="number" class="form-control" id="amount" name="amount"
                                placeholder="Enter Amount (e.g., 100.00)" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_buildings_allowed">No. Buildings Allowed:</label>
                            <input type="number" class="form-control" id="no_buildings_allowed"
                                name="no_buildings_allowed" placeholder="Enter Number of Buildings Allowed" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_units_allowed">No. Units Allowed:</label>
                            <input type="number" class="form-control" id="no_units_allowed" name="no_units_allowed"
                                placeholder="Enter Number of Units Allowed" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Package</button>
                    </form>


                </div>
            </div>
        </div>
    </main>

    <script>
        const form = document.getElementById('add-package-form');
        const packageNameInput = document.getElementById('package_name');
        const amountInput = document.getElementById('amount');
        const noBuildingsInput = document.getElementById('no_buildings_allowed');
        const noUnitsInput = document.getElementById('no_units_allowed');
        const statusSelect = document.getElementById('status');
        const submitButton = document.querySelector('button[type="submit"]');
        const validationMessage = document.getElementById('validation-message');

        // Function to display validation message
        function showErrorMessage(message) {
            validationMessage.textContent = message;
            validationMessage.style.color = 'red';
            submitButton.disabled = true; // Disable submit button on error
        }

        // Function to clear validation message
        function clearErrorMessage() {
            validationMessage.textContent = '';
            validationMessage.style.color = '';
            submitButton.disabled = false; // Enable submit button on successful validation
        }

        // Event listener for form submission
        form.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent default form submission

            let isValid = true;

            // Package Name validation - check if empty
            if (packageNameInput.value === '') {
                showErrorMessage('Please enter a package name.');
                isValid = false;
            } else {
                clearErrorMessage(); // Clear any previous name error message
            }

            // Amount validation - check if empty and is a number
            if (amountInput.value === '' || isNaN(amountInput.value)) {
                showErrorMessage('Please enter a valid amount.');
                isValid = false;
            } else {
                clearErrorMessage(); // Clear any previous amount error message
            }

            // Number of Buildings Allowed validation - check if empty and is a number
            if (noBuildingsInput.value === '' || isNaN(noBuildingsInput.value)) {
                showErrorMessage('Please enter a valid number of buildings allowed.');
                isValid = false;
            } else {
                clearErrorMessage(); // Clear any previous number of buildings error message
            }

            // Number of Units Allowed validation - check if empty and is a number
            if (noUnitsInput.value === '' || isNaN(noUnitsInput.value)) {
                showErrorMessage('Please enter a valid number of units allowed.');
                isValid = false;
            } else {
                clearErrorMessage(); // Clear any previous number of units error message
            }

            // Status validation - check if a valid option is selected
            if (statusSelect.value === '') {
                showErrorMessage('Please select a valid status.');
                isValid = false;
            } else {
                clearErrorMessage(); // Clear any previous status error message
            }

            // Submit form if all fields are valid
            if (isValid) {
                form.submit(); // Submit the form after successful validation
            }
        });

    </script>

    <?php
    $this->view("/includes/footer", $data);
    ?>