<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>colors</title>
</head>
<body>
    <form action="#" method="post">
        <?php if (isset($errors['color'])): ?>
            <p><?= ($errors['color']) ?></p>
        <?php endif; ?>
        <select class="form-control" name="color" id="color">
            <option>Select a color:</option>
            <?php foreach (($colors?:[]) as $colorOption): ?>
                <option value="<?= ($colorOption) ?>"
                <?php if ($passedColor == $colorOption): ?>
                    selected
                <?php endif; ?>
                ><?= ($colorOption) ?></option>

            <?php endforeach; ?>
        </select>
        <br>

        <label for="name">Name: <?= ($errors['name'])."
" ?>
            <input id="name" type="text" class="form-control" name="name" value="<?= ($name) ?>">
        </label>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>