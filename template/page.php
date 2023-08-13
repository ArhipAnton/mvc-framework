<?php /** @var $values */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Books</title>
</head>
<body>
<h1>Books</h1>
<p><?= $values[0]->getText() ?></p>
<ul>
    <?php foreach ($values[1] as $page): ?>
        <li>
            <a href="/book/<?= $page->getId() ?>">
            <?= $page->getId() ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<div>
</div>
</body>
</html>