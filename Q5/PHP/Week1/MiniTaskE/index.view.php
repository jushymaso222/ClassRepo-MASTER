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

    <h1> Task For The Day</h1>

    <ul>
        <li>
            <strong>Title</strong>: <?= $task['title']; ?>
        </li>
        <li>
            <strong>Due</strong>: <?= $task['due']; ?>
        </li>
        <li>
            <strong>Assigned To</strong>: <?= $task['assigned_to']; ?>
        </li>
        <li>
            <strong>Completed</strong>: 
            <?php if ($task['completed']) : ?> <!--using shorthand to make it more readable-->
                <span class="icon">&#9989;</span>
            <?php else : ?>
                <span class="icon">Incomplete</span>
            <?php endif ?>
        </li>
    </ul>

</body>
</html>