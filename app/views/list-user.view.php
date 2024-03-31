<?php
$this->view("/includes/header", $data);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User Accounts</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">User Accounts</li>
                <li class="breadcrumb-item active">List User Accounts</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>

                            <?php foreach ($users as $user) { ?>

                            <td><?=$user->full_name?></td>
                            <td><?=$user->email?></td>
                            <td><?= getTypeNameById(getUserTypes(), $user->user_type) ?></td>
                            <td><?= getTypeNameById(getUserStatuses(), $user->status) ?></td>
                            <td>
                                <a type="button" class="btn btn-primary btn-sm edit-btn"
                                        href="<?= ROOT_DIRECTORY . PAGE_URL_EDIT_USER . "/" . $user->id ?>"
                                >
                                    Edit
                                </a>
                            </td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php
    $this->view("/includes/footer", $data);
    ?>
