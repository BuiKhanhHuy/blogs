<div class="container-fluid px-4">
    <h1 class="mt-4">USER DETAIL</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><span class="text-danger"># <?= h($user['id']) ?></span></li>
    </ol>
    <div class="mb-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-1">
                    <span class="fw-bold">ID</span>: <?= h($user['id']) ?>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">Email</span>: <?= h($user['email']) ?>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">Username</span>: <?= h($user['username']) ?>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">Created at</span>: <?= h($user['created_at']->format('Y-m-d h:m:s')) ?>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">Updated at</span>: <?= h($user['updated_at']->format('Y-m-d h:m:s')) ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="/users/" class="btn btn-sm btn-primary">Users list</a>
        <a href="/users/update/<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <?= $this->Form->postLink(
            "<i class='fa fa-trash me-1'></i> Delete",
            ['controller' => 'Users', 'action' => 'delete', $user['id']],
            ['confirm' => __('Are you sure you want to delete # {0}?', $user['id']), 'class' => 'btn btn-danger btn-sm', 'escape' => false]
        ) ?>
    </div>
</div>