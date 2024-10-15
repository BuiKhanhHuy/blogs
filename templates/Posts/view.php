<div class="container-fluid px-4">
    <h1 class="mt-4">POST DETAIL</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><span class="text-danger"># <?= h($post['id']) ?></span></li>
    </ol>
    <div class="mb-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= h($post['title']) ?></h4>
            </div>
            <div class="card-body">
                <div class="pb-2">
                    <h6 class="card-title">Category: <?= $post['category_name'] ?></h6>
                    <h6 class="card-title">Author: <?= $post['author_name'] ?></h6>
                </div>
                <p class="card-text"><?= h($post['content']) ?></p>
            </div>
            <div class="card-footer text-body-secondary">
                <span id="from-now"></span>
            </div>
        </div>
    </div>
    <div>
        <a href="/posts/" class="btn btn-sm btn-primary">Posts list</a>
        <a href="/posts/update/<?= $post['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <?= $this->Form->postLink(
            "<i class='fa fa-trash me-1'></i> Delete",
            ['controller' => 'Posts', 'action' => 'delete', $post['id']],
            ['confirm' => __('Are you sure you want to delete # {0}?', $post['id']), 'class' => 'btn btn-danger btn-sm', 'escape' => false]
        ) ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let createdAt = "<?php echo $post['created_at']; ?>";
        $('#from-now').text(moment(createdAt).fromNow());
    });
</script>