<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="jokes.css">
        <title>List of jokes</title>
    </head>
    <body>
        <?php if (isset($error)): ?>
            <p>
                <?=$error?>
            </p>
        <?php else: ?>
            <?php foreach ($jokes as $joke): ?>
                <blockquote>
                    <p>
                        <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>
                        <form action="deletejoke.php" method="post">
                            <input type="hidden" name="id" value="<?=$joke['id']?>">
                            <input type="submit" value="Delete">
                        </form>
                    </p>
                </blockquote>
            <?php endforeach; ?>
        <?php endif; ?>
    </body>
</html>