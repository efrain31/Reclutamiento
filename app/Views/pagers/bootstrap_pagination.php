<?php $pager->setSurroundCount(2); ?>

<nav>
    <ul class="pagination justify-content-center">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Anterior">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= esc($link['title']) ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Siguiente">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>

<style>
.pagination {
  display: flex;
  justify-content: center;
  list-style: none;
  padding: 0;
}

.page-item {
  margin: 0 3px;
}

.page-link {
  color: #007bff;
  text-decoration: none;
  font-size: 16px;
  padding: 6px 12px;
  border-radius: 6px;
  transition: background-color 0.2s;
}

.page-link:hover {
  background-color: #e9ecef;
}

.page-item.active .page-link {
  background-color: #2c2c82;
  color: white;
  font-weight: bold;
}
</style>