<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Results Page</h1>
    <p><?= ($SESSION['animal']->talk()) ?></p>
    <p>Thank you for ordering <?= ($SESSION['animal']->getName()) ?> a
        <?= ($SESSION['animal']->getColor()) ?> <?= ($SESSION['animal']->getType()) ?>!</p>
    <p><a href="view">go to views</a></p>
</body>
</html>