<!doctype html>
<html lang="EN">
    <head>
        <meta charset="utf-8" />
        <title>Learning Path</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/learningpath.css">
    </head>
    <body>
        <div class="container">
        <?php foreach ($videos as $video): ?>
          <iframe width="560" height="315" src=<?= $video ?> frameborder="0" allowfullscreen></iframe>
        <?php endforeach;?>
        </div>
</body>
</html>