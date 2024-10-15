<?php
$pageCount = ceil($total / $limit);
$page = $page ?? 1;
?>

<div>
    <?php if ($pageCount > 1): ?>

        <nav aria-label="..." class="d-flex justify-content-end">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $pageCount; $i++): ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>