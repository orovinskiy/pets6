<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Results Page</h1>
    <p><?= ($SESSION['animal']->talk()) ?></p>
    <p>Thank you for ordering a <?= ($SESSION['animal']->getColor()) ?> <?= ($SESSION['animal']->getName()) ?>!</p>
</body>
</html>