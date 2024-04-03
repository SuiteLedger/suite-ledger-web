<?php
$this->view("/includes/header", $data);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $pageTitle ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= ROOT_DIRECTORY . $pageUrl ?>">User Accounts</a></li>
                <li class="breadcrumb-item active"><?= $pageTitle ?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">

                    <form method="post" action="<?= ROOT_DIRECTORY . $pageUrl ?>" id="add-user-form">

                        <input type="hidden" name="id" value="<?=getInputValue('id')?>">

                        <div class="form-group mb-3">
                            <label for="user_type">User Type:</label>
                            <select class="form-control" id="user_type" name="user_type" required>
                                <?php
                                foreach (getUserTypes() as $userType) {
                                    displaySelectOptions($userType->getId(),
                                        $userType->getName(),
                                        getInputValue("user_type"));
                                }
                                ?>
                            </select>
                            <?= displayInputError($errors['user_type']) ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Full Name:</label>
                            <input type="text" id="full_name" name="full_name"
                                   class="form-control <?= getInputClass('full_name', $errors) ?>"
                                   value="<?= getInputValue('full_name') ?>"
                                   placeholder="Enter Full Name" required>
                            <?= displayInputError($errors['full_name']) ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email"
                                   class="form-control <?= getInputClass('email', $errors) ?>"
                                   placeholder="Enter Email Address" required autocomplete="false">
                            <?= displayInputError($errors['email']) ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Enter Password" required>
                            <?= displayInputError($errors['password']) ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="apartment_complex">Role:</label>
                            <select class="form-control" id="role" name="role" required>
                                <?php
                                foreach ($userRoles as $userRole) {
                                    displaySelectOptions($userRole->id,
                                        $userRole->name,
                                        getInputValue("role"));
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="apartment_complex">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <?php
                                foreach (getUserStatuses() as $userStatus) {
                                    displaySelectOptions($userStatus->getId(),
                                        $userStatus->getName(),
                                        getInputValue('status'));
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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

