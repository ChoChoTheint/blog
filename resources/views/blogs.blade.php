<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($blogs as $blog): ?>
        <h1><a href="blogs/<?= $blog->filename; ?>"><?= $blog->title; ?></a></h1>
        <div>
            <p><?= $blog->intro; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>