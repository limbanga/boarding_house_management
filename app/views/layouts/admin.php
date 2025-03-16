<?php
$title = isset($title) ? $title : 'Quản trị hệ thống';
ob_start();
?>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-2">
            <?php require_once __DIR__ . '/sidebar.php'; ?>
        </div>
        <!-- Nội dung chính -->
        <div class="col-10">
          <div class="py-3">
            <h2><?= $title; ?></h2>
          </div>
            <?= $content; ?>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/base.php';
?>