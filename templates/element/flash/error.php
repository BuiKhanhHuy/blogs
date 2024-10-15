<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */

use Cake\Log\Log;

if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div>
        <strong><?= $message ?>!</strong>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div>
        <?php echo $params['details'] ?? ''; ?>
    </div>
</div>