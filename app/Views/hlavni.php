<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                foreach ($okresyData as $row) {
                    echo ('<li class="nav-item">');
                    echo ('<a class="nav-link" href="index.html">' . $row->nazev . '</a>');
                    echo ('</li>');
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container">

</div>

<?=  $this->endSection(); ?>