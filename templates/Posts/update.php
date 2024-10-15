<?php
echo $this->Html->script(['posts_script'], ['block' => true]);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">UPDATE POST</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><span class="text-danger"># <?= h($post['id']) ?></span></li>
    </ol>
    <div>
        <?= $this->Flash->render() ?>
    </div>
    <div class="mb-4">
        <div class="card">
            <div class="card-body">
                <div>
                    <?php echo $this->Form->create($post, [
                        'url' => ['controller' => 'Posts', 'action' => 'update', $post['id']],
                        'method' => 'post',
                        'id' => 'updatePostForm',
                    ]); ?>
                    <div class="mb-3">
                        <?= $this->Form->control('title', ['placeholder' => 'Enter title', 'class' => 'form-control', 'type' => 'text', 'id' => 'title', 'label' => 'Title (*)', 'required' => false]) ?>
                    </div>
                    <div class="mb-3">
                        <?php $categoriesOption = array_column($categories->toArray(), 'category_name', 'id'); ?>
                        <?= $this->Form->control('category_id', [
                            'type' => 'select',
                            'options' => $categoriesOption,
                            'empty' => 'Select a category',
                            'class' => 'form-select',
                            'label' => 'Category (*)',
                            'required' => false
                        ]) ?>
                    </div>
                    <div class="mb-3">
                        <?php $authorsOption = array_column($users->toArray(), 'email', 'id'); ?>
                        <?= $this->Form->control('user_id', [
                            'type' => 'select',
                            'options' => $authorsOption,
                            'empty' => 'Select a author',
                            'class' => 'form-select',
                            'label' => 'Author',
                            'required' => false
                        ]) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('content', ['placeholder' => 'Enter content', 'rows' => 10, 'class' => 'form-control', 'type' => 'textarea', 'id' => 'content', 'label' => 'Content (*)', 'required' => false]) ?>
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
        <a href="/posts/" class="btn btn-sm btn-primary">Posts list</a>
        <?= $this->Form->postLink(
            "<i class='fa fa-trash me-1'></i> Delete",
            ['controller' => 'Posts', 'action' => 'delete', $post['id']],
            ['confirm' => __('Are you sure you want to delete # {0}?', $post['id']), 'class' => 'btn btn-danger btn-sm', 'escape' => false]
        ) ?>
    </div>
</div>