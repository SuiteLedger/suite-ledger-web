<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title><?=$pageTitle . ' | ' . APP_NAME ?></title>
    <link href="<?= ROOT_DIRECTORY ?>/assets/css/styles.css" rel="stylesheet"/>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                            <div class="card-body">

                                <?php if(getPageMessage()) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?=getPageMessage(true)['message']?>
                                    </div>
                                <?php endIf; ?>

                                <form id="loginForm" method="post" action="<?= ROOT_DIRECTORY . PAGE_URL_LOGIN ?>">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" type="email" name="email"
                                               placeholder="name@example.com" required>
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPassword" type="password" name="password"
                                               placeholder="Password" required>
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="<?= ROOT_DIRECTORY ?>">Go to Homepage!</a>
                                        <button class="btn btn-primary" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; SuiteLedger 2024</div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script>
    // Validation and redirection script
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        var emailInput = document.getElementById('inputEmail');
        var passwordInput = document.getElementById('inputPassword');


        window.location.href = 'dashboard';

        if (!emailInput.checkValidity()) {
            event.preventDefault();
            alert('Please enter a valid email address.');
        } else if (!passwordInput.checkValidity()) {
            event.preventDefault();
            alert('Please enter a password.');
        } else {
            // Redirect to index.html if both email and password inputs are valid
            window.location.href = 'index.html';
        }
    });
</script>

</body>
</html>
