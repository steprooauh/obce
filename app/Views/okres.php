<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                foreach ($okresyData as $row) {
                    echo ('<li class="nav-item"><a class="nav-link " href="index.html">' . anchor('okres/'.$row->kod, $row->nazev) . '</a></li>');
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<div class="" style="margin-top: 50px;">
    <?php if ($pager): ?>
        <?= $pager->links('default', 'pager') ?>
    <?php endif ?>
</div>

<?php

foreach($obceData as $row){
    echo($row->nazev.'<br>');
}
?>

<?=  $this->endSection(); ?>
