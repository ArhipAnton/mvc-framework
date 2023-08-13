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
    <?php /** @var \App\Model\Book $book */ ?>
    <?php foreach ($values as $book): ?>
        <li><a href="/book/<?= $book->getId() ?>">
                <?= $book->getName() ?>
            </a></li>
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