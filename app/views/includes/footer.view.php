<?php if(getPageMessage()) : ?>
    <div class="toast-container top-0 end-0 p-3">
        <div id="toastMessage" class="toast align-items-center text-bg-<?=getPageMessage()['cssClass']?> border-0"
             role="alert" aria-live="assertive"  aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?=getPageMessage(true)['message'];?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        const toastMessage = document.getElementById('toastMessage');
        const bootstrapToast = bootstrap.Toast.getOrCreateInstance(toastMessage);
        bootstrapToast.show();
    </script>
<?php endif; ?>

<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; SuiteLedger 2024</div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= ROOT_DIRECTORY ?>/assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= ROOT_DIRECTORY ?>/assets/demo/chart-area-demo.js"></script>
<script src="<?= ROOT_DIRECTORY ?>/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
<script src="<?= ROOT_DIRECTORY ?>/assets/js/datatables-simple-demo.js"></script>
</body>
</html>