<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form1</title>
</head>
<body>
    <form action="#" method="post">
        <label for="animalName">Animal: </label>
        <input type="text" name="animalName" id="animalName"><br>
        <?php if (isset($errors['animal'])): ?>
            <label><?= ($errors['animal']) ?></label>
        <?php endif; ?>
        <button type="submit">Next</button>
    </form>
</body>
</html>