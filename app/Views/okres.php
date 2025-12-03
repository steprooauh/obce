use CodeIgniter

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

                use CodeIgniter\CodeIgniter;

                foreach ($okresyData as $row) {
                    echo ('<li class="nav-item">');
                    echo anchor('okres/' . $row->kod, $row->nazev, ['class' => 'nav-link']);
                    echo ('</li>');
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

$table = new \CodeIgniter\View\Table();

$template = [
    'table_open' => '<table class="table table-bordered table-striped table-hover table-sm align-middle">',
    'thead_open' => '<thead class="table-dark text-center">',
    'thead_close' => '</thead>',
    'heading_row_start' => '<tr>',
    'heading_row_end' => '</tr>',
    'heading_cell_start' => '<th scope="col" class="text-nowrap">',
    'heading_cell_end' => '</th>',
    'tbody_open' => '<tbody>',
    'tbody_close' => '</tbody>',
    'row_start' => '<tr>',
    'row_end'  => '</tr>',
    'cell_start' => '<td class="text-center">',
    'cell_end' => '</td>',
    'cell_alt_start' => '<td class="text-center">',
    'table_close' => '</table>'
];

$table->setTemplate($template);

$table->setHeading(
    'Obec',
    'Počet adres',
);

foreach ($obceData as $row) {
    $table->addRow(
        $row->nazev,
        $row->poradi
    );
}

echo $table->generate();
?>
?>

<?= $this->endSection(); ?>