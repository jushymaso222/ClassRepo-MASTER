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

    <ul>
        <?php foreach($person as $feature => $val) :?> <!--Looping through and printing all key value pairs-->
            <li> 
                <b> <?= $feature;?> </b>
                <?= ": $val";?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>