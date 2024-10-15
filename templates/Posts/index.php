<div class="container-fluid px-4">
    <h1 class="mt-4">POSTS LIST</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Posts</li>
    </ol>
    <div>
        <?= $this->Flash->render() ?>
    </div>
    <div class="d-flex flex-row-reverse pb-3">
        <a class="btn btn-sm btn-success" href="/posts/create">
            <i class="fa fa-plus me-1"></i> Create post
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
                        'controller' => 'Posts',
                        'action' => 'index'
                    ]
                ]
            ) ?>
            <div>
                <div class="row">
                    <div class="col-3">
                        <?= $this->Form->control('id', [
                            'label' => 'ID',
                            'placeholder' => 'Post ID',
                            'class' => 'form-control',
                            'id' => 'id',
                            'default' => $this->request->getQuery('id', null)
                        ])
                            ?>
                    </div>
                    <div class="col-3">
                        <?= $this->Form->control('title', ['label' => 'Title', 'placeholder' => 'Post title', 'class' => 'form-control', 'type' => 'text', 'id' => 'title', 'default' => $this->request->getQuery('title', '')]) ?>
                    </div>
                    <div class="col-3">
                        <?php $categoriesOption = array_column($categories->toArray(), 'category_name', 'id'); ?>
                        <?= $this->Form->control('category_id', [
                            'type' => 'select',
                            'options' => $categoriesOption,
                            'empty' => 'Select a category',
                            'class' => 'form-select',
                            'label' => 'Category'
                        ]) ?>
                    </div>
                    <div class="col-3">
                        <?php $authorsOption = array_column($users->toArray(), 'email', 'id'); ?>
                        <?= $this->Form->control('user_id', [
                            'type' => 'select',
                            'options' => $authorsOption,
                            'empty' => 'Select a author',
                            'class' => 'form-select',
                            'label' => 'Author'
                        ]) ?>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <div class="col-auto">
                        <a type="button" class="btn btn-secondary btn-sm mb-3 me-2" href="/posts/"><i
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
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <th scope="row" class="text-left"><?= h($post['id']) ?></th>
                    <td><?= h($post['title']) ?></td>
                    <td class="col-3"><?= h($post['short_content']) ?></td>
                    <td><?= $post['category_name'] ?></td>
                    <td><?= $post['author_name'] ?></td>
                    <td><?= h($post['created_at']->format('Y-m-d h:m:s')) ?></td>
                    <td><?= h($post['updated_at']->format('Y-m-d h:m:s')) ?></td>
                    <td class="col-2">
                        <div class="d-grid gap-2 d-md-block">
                            <a class="btn btn-primary btn-sm" href="/posts/view/<?= $post['id'] ?>"><i
                                    class="fa fa-eye me-1"></i> View</a>
                            <a class="btn btn-warning btn-sm" href="/posts/update/<?= $post['id'] ?>"><i
                                    class="fa fa-pencil me-1"></i> Edit</a>
                            <?= $this->Form->postLink(
                                "<i class='fa fa-trash me-1'></i> Delete",
                                ['controller' => 'Posts', 'action' => 'delete', $post['id']],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $post['id']), 'class' => 'btn btn-danger btn-sm', 'escape' => false]
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