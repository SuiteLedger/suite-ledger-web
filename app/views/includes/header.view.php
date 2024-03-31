<?=Authentication::hasLoggedIn()?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?=$pageTitle . ' | ' . APP_NAME ?></title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= ROOT_DIRECTORY ?>/assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?= ROOT_DIRECTORY ?>/dashboard">
        <?= APP_NAME ?>
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group"></div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
                <i class="fas fa-user fa-fw"></i> <?=getLoggedInUser()->full_name ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= ROOT_DIRECTORY ?>/logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/dashboard">
                        <div class="sb-nav-link-icon"><i href="add-apartment-complex.php"
                                                         class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Apartment</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                       data-bs-target="#collapseComplex" aria-expanded="false" aria-controls="collapseComplex">
                        <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                        Complex
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseComplex" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/apartmentComplex/add">
                                Add Apartment complex
                            </a>
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/apartmentComplex/list">List Apartment
                                Complex</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUnits"
                       aria-expanded="false" aria-controls="collapseUnits">
                        <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                        Units
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUnits" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/apartmentUnit/add">
                                Add Apartment Units</a>
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/apartmentUnit/list">
                                List Apartment Units</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Payments & Services</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                       data-bs-target="#collapsePayments" aria-expanded="false" aria-controls="collapsePayments">
                        <div class="sb-nav-link-icon"><i class="fas fa-money-bill-alt"></i></div>
                        Payments
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePayments" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/paymentProof/list">
                                Manage Payment Proofs</a>
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/paymentProof/history">
                                Payment History</a>
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/paymentProof/upload">
                                Upload (To be removed)</a>
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/paymentProof/edit">
                                Edit (To be removed)</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/maintenanceFee">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-wrench"></i>
                        </div>
                        Maintenance Fees
                    </a>
                    <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/subscription">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        Manage Subscriptions
                    </a>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                       data-bs-target="#collapsePackage" aria-expanded="false" aria-controls="collapsePackage">
                        <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                        Package
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePackage" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/package/add">
                                Add Packages</a>
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/package/list">
                                List Packages</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Access Management</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                       data-bs-target="#collapseUserAccounts" aria-expanded="false"
                       aria-controls="collapseUserAccounts">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        User Accounts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUserAccounts" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/user/add">Add User Accounts</a>
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/user/list">List User Accounts</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                       data-bs-target="#collapseUserRoles" aria-expanded="false"
                       aria-controls="collapseUserRoles">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        User Roles
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUserRoles" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/userRole/list">List User Roles</a>
                            <a class="nav-link" href="<?= ROOT_DIRECTORY ?>/userRole/add">Add User Roles</a>
                        </nav>
                    </div>

                </div>
            </div>
            <!--                <div class="sb-sidenav-footer">-->
            <!--                    <div class="small">Logged in as:</div>-->
            <!--                    SuperAdmin-->
            <!--                </div>-->
        </nav>
    </div>
