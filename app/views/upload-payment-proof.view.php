<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title><?=$pageTitle . " | " . APP_NAME?></title>
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
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Upload Payment
                                    Proof</h3></div>
                            <div class="card-body">

                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <h4><?=$apartmentComplexName?></h4>
                                        <h5>#<?=$apartmentUnitNo?></h5>
                                    </div>
                                </div>

                                <?php if(getPageMessage()) : ?>
                                    <div class="alert alert-<?=getPageMessage()['cssClass']?> mb-3" role="alert">
                                        <?=getPageMessage(true)['message']?>
                                    </div>
                                <?php endIf; ?>

                                <form id="loginForm" action="<?=ROOT_DIRECTORY. PAGE_URL_SUBMIT_PAYMENT_PROOF?>"
                                method="post" enctype="multipart/form-data">

                                    <input type="hidden" name="apartment_unit" value="<?=$apartmentUnitId?>">

<!--                                    <div class="form-floating mb-3">-->
<!--                                        <input class="form-control" id="full-name" type="text" placeholder="John Doe"-->
<!--                                               required>-->
<!--                                        <label for="full-name">Full Name</label>-->
<!--                                    </div>-->
<!--                                    <div class="form-floating mb-3">-->
<!--                                        <input class="form-control" id="apartment-unit" type="text"-->
<!--                                               placeholder="Please enter an apartment unit" required>-->
<!--                                        <label for="apartment-unit">Apartment Unit</label>-->
<!--                                    </div>-->
                                    <div class="orm-floating mb-3">
                                        <label for="formFile" class="form-label">Payment proof</label>
                                        <input class="form-control" type="file" id="formFile" name="payment_proof_file">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" min="1" id="amount" name="amount" type="number"
                                               placeholder="Please enter an amount" required>
                                        <label for="amount">Amount</label>
                                    </div>
<!--                                    <div class="form-floating mb-3">-->
<!--                                        <input class="form-control" id="submitted-date" type="date"-->
<!--                                               placeholder="Select Date" required>-->
<!--                                        <label for="submitted-date">Submitted Date</label>-->
<!--                                    </div>-->
<!--                                    <div class="form-floating mb-3">-->
<!--                                        <select class="form-select" id="payment-type" aria-label="Payment Type">-->
<!--                                            <option value="">Select Payment Type</option>-->
<!--                                            <option value="credit_card">Credit Card</option>-->
<!--                                            <option value="debit_card">Debit Card</option>-->
<!--                                            <option value="bank_transfer">Bank Transfer</option>-->
<!--                                        </select>-->
<!--                                        <label for="payment-type">Payment Type</label>-->
<!--                                    </div>-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="comment" name="comment_by_submiter"
                                                  type="text"
                                                  placeholder="Please add a comment here (Optional)"></textarea>
                                        <label for="comment">Remark</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
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
<script src="<?= ROOT_DIRECTORY ?>/assets/js/scripts.js"></script>
<script>
    // Validation and redirection script
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        var emailInput = document.getElementById('inputEmail');
        var passwordInput = document.getElementById('inputPassword');

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
