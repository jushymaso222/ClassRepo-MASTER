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

    <h1> Buzz Buzz Buzz, Here Comes Some Fizz</h1>

    <ol>
        <?php for($i = 0; $i < 100; $i++) : ?>
            <li><?= fizzBuzz($i);?>  
        <?php endfor; ?>
    </ol>

</body>
</html>