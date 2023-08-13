<?php /** @var $values */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Books</title>
</head>
<body>
<h1>Books</h1>
<ul>
    <?php foreach ($values as $book): ?>
        <li>
            <?php if ($book['page_first']): ?>
                <a href="/book/<?= $book['id'] ?>/page/<?= $book['page_first'] ?>">
                    <?= $book['name'] ?>
                </a>
                <p><?= $book['page_count'] ?> страниц</p>
            <?php else: ?>
                <p><?= $book['name'] ?></p>
            <?php endif; ?>
            <?php foreach ($book['authors'] as $author): ?>
                <p><?= $author ?></p>
            <?php endforeach; ?>
        </li>
    <?php endforeach; ?>
</ul>
<div>
    <form name="search" method="get" action="/book/search">
        <p><b>Название</b><br>
            <label>
                <input type="text" value="<?= $arg['book'] ?>" name='book'>
            </label>
        </p>
        <p><b>Автор</b><br>
            <label>
                <input type="text" value="<?= $arg['author'] ?>" name='author'>
            </label>
        </p>
        <p>
            <input type="submit" value="Найти">
        </p>
    </form>
</div>
</body>
</html>