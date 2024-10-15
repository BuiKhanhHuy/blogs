<?php
echo $this->Html->script(['users_script'], ['block' => true]);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">UPDATE USER</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><span class="text-danger"># <?= h($user['id']) ?></span></li>
    </ol>
    <div>
        <?= $this->Flash->render() ?>
    </div>
    <div class="mb-4">
        <div class="card">
            <div class="card-body">
                <div>
                    <?php echo $this->Form->create($user, [
                        'url' => ['controller' => 'Users', 'action' => 'update', $user['id']],
                        'method' => 'post',
                        'class' => 'needs-validation',
                        'id' => 'updateUserForm',
                    ]); ?>
                    <div class="mb-3">
                        <?= $this->Form->control('email', ['placeholder' => 'Enter email', 'class' => 'form-control', 'type' => 'text', 'id' => 'email', 'label' => 'Email (*)', 'required' => false]) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('username', ['placeholder' => 'Enter username', 'class' => 'form-control', 'type' => 'text', 'id' => 'username', 'label' => 'Username (*)', 'required' => false]) ?>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <?= $this->Form->control('isUpdatePassword', [
                                'id' => 'isUpdatePassword',
                                'class' => "form-check-input",
                                'type' => 'checkbox',
                                'label' => 'Is update password?',
                                'checked' => false,
                            ]); ?>
                        </div>

                        <div class="card" id="updatePasswordArea">
                            <div class="card-body">
                                <?= $this->Form->control('password', ['placeholder' => 'Enter new password', 'class' => 'form-control', 'type' => 'text', 'id' => 'password', 'label' => 'New password', 'value' => '', 'required' => false]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-pencil-square me-1"></i>
                            Save</button>
                        <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-refresh me-1"></i>
                            Reset</button>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="/users/" class="btn btn-sm btn-primary">Users list</a>
        <?= $this->Form->postLink(
            "<i class='fa fa-trash me-1'></i> Delete",
            ['controller' => 'Users', 'action' => 'delete', $user['id']],
            ['confirm' => __('Are you sure you want to delete # {0}?', $user['id']), 'class' => 'btn btn-danger btn-sm', 'escape' => false]
        ) ?>
    </div>
</div>