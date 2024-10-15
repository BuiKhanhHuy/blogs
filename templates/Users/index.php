<div class="container-fluid px-4">
    <h1 class="mt-4">USERS LIST</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <div>
        <?= $this->Flash->render() ?>
    </div>
    <div class="d-flex flex-row-reverse pb-3">
        <a class="btn btn-sm btn-success" href="/users/create">
            <i class="fa fa-plus me-1"></i> Create user
        </a>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <?php echo $this->Form->create(
                null,
                [
                    'type' => 'get',
                    'id' => 'searchForm',
                    'url' => [
                        'controller' => 'Users',
                        'action' => 'index'
                    ]
                ]
            ) ?>
            <div>
                <div class="row">
                    <div class="col-4">
                        <?= $this->Form->control('id', [
                            'label' => 'ID',
                            'placeholder' => 'Your ID',
                            'class' => 'form-control',
                            'id' => 'id',
                            'default' => $this->request->getQuery('id', null)
                        ])
                            ?>
                    </div>
                    <div class="col-4">
                        <?= $this->Form->control('email', ['label' => 'Email', 'placeholder' => 'Your email', 'class' => 'form-control', 'type' => 'text', 'id' => 'email', 'default' => $this->request->getQuery('email', '')]) ?>
                    </div>
                    <div class="col-4">
                        <?= $this->Form->control('username', ['label' => 'Username', 'placeholder' => 'Your username', 'class' => 'form-control', 'id' => 'username', 'default' => $this->request->getQuery('username', '')]) ?>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <div class="col-auto">
                        <a type="button" class="btn btn-secondary btn-sm mb-3 me-2" href="/users/"><i
                                class="fa fa-remove me-1"></i>
                            Clear</a>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa fa-search me-1"></i>
                            Search</button>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row" class="text-left"><?= h($user['id']) ?></th>
                    <td><?= h($user['email']) ?></td>
                    <td><?= h($user['username']) ?></td>
                    <td><?= h($user['created_at']->format('Y-m-d h:m:s')) ?></td>
                    <td><?= h($user['updated_at']->format('Y-m-d h:m:s')) ?></td>
                    <td class="col-2">
                        <div class="d-grid gap-2 d-md-block">
                            <a class="btn btn-primary btn-sm" href="/users/view/<?= $user['id'] ?>"><i
                                    class="fa fa-eye me-1"></i> View</a>
                            <a class="btn btn-warning btn-sm" href="/users/update/<?= $user['id'] ?>"><i
                                    class="fa fa-pencil me-1"></i> Edit</a>
                            <?= $this->Form->postLink(
                                "<i class='fa fa-trash me-1'></i> Delete",
                                ['controller' => 'Users', 'action' => 'delete', $user['id']],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $user['id']), 'class' => 'btn btn-danger btn-sm', 'escape' => false]
                            ) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <?php echo $this->element('pagination') ?>
    </div>
</div>