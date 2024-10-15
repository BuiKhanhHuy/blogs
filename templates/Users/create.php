<?php
echo $this->Html->script(['users_script'], ['block' => true]);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">CREATE USER</h1>
    <div>
        <?= $this->Flash->render() ?>
    </div>
    <div class="mb-4">
        <div class="card">
            <div class="card-body">
                <div>
                    <?php echo $this->Form->create($user, [
                        'url' => ['controller' => 'Users', 'action' => 'create'],
                        'method' => 'post',
                        'class' => 'needs-validation',
                        'id' => 'createUserForm',
                    ]); ?>
                    <div class="mb-3">
                        <?= $this->Form->control('email', ['placeholder' => 'Enter email', 'class' => 'form-control', 'type' => 'text', 'id' => 'email', 'label' => 'Email (*)', 'required' => false]) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('username', ['placeholder' => 'Enter username', 'class' => 'form-control', 'type' => 'text', 'id' => 'username', 'label' => 'Username (*)', 'required' => false]) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('password', ['placeholder' => 'Enter password', 'class' => 'form-control', 'type' => 'text', 'id' => 'password', 'label' => 'Password', 'value' => '', 'required' => false]) ?>
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
    </div>
</div>