<?php
$this->view("/includes/header", $data);
?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4"><?=$pageTitle?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="#">User Accounts</a></li>
                    <li class="breadcrumb-item active">Add User Accounts</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">

                        <form method="post" action="<?= ROOT_DIRECTORY ?>/user/add" id="add-user-form">
                            <div class="form-group mb-3">
                                <label for="user_type">User Type:</label>
                                <select class="form-control" id="user_type" name="user_type" required>
                                    <option value="">Select User Type</option>
                                    <option value="tenant">Tenant</option>
                                    <option value="landlord">Landlord</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="text" id="full_name" name="full_name"
                                       class="form-control <?=!empty($errors['full_name']) ? 'border-danger' : '' ?>"
                                       value="<?=getInputValue('full_name')?>"
                                       placeholder="Enter Full Name" required>
                                <?= !empty($errors['full_name']) ?
                                    "<small class='text-danger'>{$errors['full_name']}</small>" : '' ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email Address:</label>
                                <input type="email" id="email" name="email"
                                       class="form-control <?=!empty($errors['email']) ? 'border-danger' : '' ?>"
                                       placeholder="Enter Email Address"
                                       required>
                                <?= !empty($errors['email']) ?
                                    "<small class='text-danger'>{$errors['email']}</small>" : '' ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Enter Password"
                                       required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="apartment_complex">Apartment Complex:</label>
                                <select class="form-control" id="apartment_complex" name="apartment_complex" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="apartment_complex">Status:</label>
                                <select class="form-control" id="apartment_complex" name="apartment_complex" required>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                    <option value="3">On Hold</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </form>

                    </div>
                </div>
            </div>
        </main>

<!--        <script>-->
<!--            const form = document.getElementById('add-user-form');-->
<!--            const nameInput = document.getElementById('full_name');-->
<!--            const emailInput = document.getElementById('email');-->
<!--            const passwordInput = document.getElementById('password');-->
<!--            const submitButton = document.querySelector('button[type="submit"]');-->
<!--            const validationMessage = document.getElementById('validation-message');-->
<!---->
<!--            // Function to display validation message-->
<!--            function showErrorMessage(message) {-->
<!--                validationMessage.textContent = message;-->
<!--                validationMessage.style.color = 'red';-->
<!--                submitButton.disabled = true; // Disable submit button on error-->
<!--            }-->
<!---->
<!--            // Function to clear validation message-->
<!--            function clearErrorMessage() {-->
<!--                validationMessage.textContent = '';-->
<!--                validationMessage.style.color = '';-->
<!--                submitButton.disabled = false; // Enable submit button on successful validation-->
<!--            }-->
<!---->
<!--            // Event listener for form submission-->
<!--            form.addEventListener('submit', (event) => {-->
<!--                event.preventDefault(); // Prevent default form submission-->
<!---->
<!--                let isValid = true;-->
<!---->
<!--                // Name validation - check if empty and only alphabets and spaces-->
<!--                if (nameInput.value === '') {-->
<!--                    showErrorMessage('Please enter your name.');-->
<!--                    //isValid = false;-->
<!--                } else {-->
<!--                    const regex = /^[a-zA-Z\s]*$/;-->
<!--                    if (!regex.test(nameInput.value)) {-->
<!--                        showErrorMessage('Please enter only alphabets for your name.');-->
<!--                        isValid = false;-->
<!--                    } else {-->
<!--                        clearErrorMessage(); // Clear any previous name error message-->
<!--                    }-->
<!--                }-->
<!---->
<!--                // Email validation - check format and emptiness-->
<!--                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;-->
<!--                if (!emailRegex.test(emailInput.value) || emailInput.value === '') {-->
<!--                    showErrorMessage('Please enter a valid email address.');-->
<!--                    isValid = false;-->
<!--                } else {-->
<!--                    clearErrorMessage(); // Clear any previous email error message-->
<!--                }-->
<!---->
<!--                // Password validation - check minimum length (adjust as needed)-->
<!--                if (passwordInput.value.length < 6) {-->
<!--                    showErrorMessage('Password must be at least 6 characters long.');-->
<!--                    isValid = false;-->
<!--                } else {-->
<!--                    clearErrorMessage(); // Clear any previous password error message-->
<!--                }-->
<!---->
<!--                // Submit form if all fields are valid-->
<!--                if (isValid) {-->
<!--                    form.submit(); // Submit the form after successful validation-->
<!--                }-->
<!--            });-->
<!--        </script>-->

<?php
$this->view("/includes/footer", $data);
?>

