<?php /** @var $values */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <style>
        .block-left{width:50%;height:800px;overflow:auto;float:left;}
        .block-right{width:50%;height:800px;overflow:auto;}
    </style>
</head>
<body>
<div class="block-left">
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
</div>
<div class="block-right">
    <h2>Поиск</h2>
    <form name="search" method="get" action="/search">
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