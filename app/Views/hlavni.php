<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<nav class="navbar navbar-expand-lg **navbar-light bg-light**">
    <div class="container-fluid">
        
        <a class="navbar-brand" href="<?= base_url(); ?>">Obce</a> 

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                foreach ($okresyData as $row) {
                    echo ('<li class="nav-item">');
                    echo anchor('okres/'.$row->kod, $row->nazev, ['class' => 'nav-link']);
                    echo ('</li>');
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<img style="margin-left: -24%;" src="<?= base_url('img/hlavni.webp'); ?>" alt="">
<div class="center-container" style="margin-top: -70%;">
    <h1 style="color: white;">VÍTEJTE V ZLÉNSKÉM KRAJI</h1><br>
    <h5 style="color: #dfd7d7b3;">Vybérte z nabédke výše nějaké okres prosím</h5>
</div>

<?= $this->endSection(); ?> 