<?php /** @var $values */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <style>
        ul.hr li {
            display: inline;
            padding: 3px;
        }
    </style>
</head>
<body>
<h1>Books</h1>
<a href="/book/list">Список книг</a>
<p><?= $values[2]->getText() ?></p>
<ul class="hr">
    <?php foreach ($values[3] as $page): ?>
        <li>
            <?php if ($page->getId() == $values[1]): ?>
                <span><?= $page->getNum() ?></span>
            <?php else: ?>
                <a href="/book/<?= $values[0] ?>/page/<?= $page->getId() ?>">
                    <?= $page->getNum() ?>
                </a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
<div>
</div>
</body>
</html>