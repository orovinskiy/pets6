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
                <option><?= ($colorOption) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>