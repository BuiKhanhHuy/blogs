<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
    ]) ?>
    <?= $this->Html->css([
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH',
        'styles.css',
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <?php echo $this->Html->script([
        'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',
        'https://use.fontawesome.com/releases/v6.3.0/js/all.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js',
        'scripts.js',
    ]); ?>
</head>

<body class="sb-nav-fixed">
    <?php echo $this->element('header'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php echo $this->element('sidebar'); ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php echo $this->fetch('content'); ?>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <?php echo $this->element('footer'); ?>
            </footer>
        </div>
    </div>

    <?= $this->Html->script([
        'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js',
    ]) ?>
    <?php echo $this->fetch('scriptBottom'); ?>
    <?php echo $this->fetch('ignitionScript'); ?>
</body>

</html>