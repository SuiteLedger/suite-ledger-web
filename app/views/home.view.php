<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SuiteLedger</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles_home.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="#page-top">SuiteLedger</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-primary bg-gradient text-white">
        <div class="container px-4 text-center">
            <h1 class="fw-bolder">Meet: Suite Ledger</h1>
            <p class="lead">- Convenient Apartment Fees & Maintainence Tracker -</p>
            <a class="btn btn-lg btn-light" href="#contact">Get Started!</a>
        </div>
    </header>
    <!-- About section-->
    <section id="about">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>About Us</h2>
                    <p class="lead">We at SuiteLedger understand the complexities of apartment living. Between rent
                        payments, utilities, and unexpected maintenance needs, keeping track of finances can feel
                        overwhelming. That's why we created SuiteLedger, a convenient web app designed to simplify
                        apartment
                        fee and maintenance management for both residents and property managers.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section-->
    <section class="bg-light" id="services">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>Services we offer</h2>
                    <p class="lead">We are passionate about making apartment living more convenient and hassle-free by
                        offering the below services in our app;</p>
                    <ul>
                        <li>Enable Property managers' to efficiently Track and manage maintenance fees from one
                            dashboard.</li>
                        <li>Transform manual bookkeeping by automating invoicing, payment receipts, balance statements,
                            and payment histories.</li>
                        <li>Grant landlords complete control to access timely, precise, and transparent financial
                            reports.</li>
                        <li>Email-based tenant self-service for uploading deposit slips.</li>
                        <li>Smart notifications and reminders for landlords.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section-->
    <section id="contact">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>Contact us</h2>
                    <p class="lead">Reach out to us here to get started!</p>

                    <?php if(getPageMessage()) : ?>
                        <div class="alert alert-<?=getPageMessage()['cssClass']?>" role="alert">
                            <?=getPageMessage(true)['message']?>
                        </div>
                    <?php endIf; ?>

                    <form method="post" id="contact-form"
                          action="http://localhost/suite-ledger-web/public/contactUsForm">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; SuiteLedger 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/scripts_home.js"></script>
</body>

</html>
