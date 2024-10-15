<?php 
    echo $this->Html->css([
        'https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css'
    ], ['block' => true]);
?>
<?php 
    $this->start('ignitionScript');
        echo $this->element('databases/template');
    $this->end();
?>
<?php 
    echo $this->Html->script([
        'https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js'
], ['block' => 'scriptBottom']);
?>