<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        h1 {
            background: #e3e3e3;
            padding: 2em;
            text-align: center;
        }
    </style>

    <title>Test</title>
</head>
<body>

    <header>
        <h1> 
            <?= $header ?> <!--Getting the header from php-->
        </h1>
    </header>

    <ul>
        <?php foreach ($animals as $animal) : ?> <!--Pulling from the list and populating a list-->

            <li><?= $animal; ?></li>

        <?php endforeach; ?>
    </ul>

</body>
</html>