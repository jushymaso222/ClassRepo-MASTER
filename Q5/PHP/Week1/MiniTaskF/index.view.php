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

    <h1> Are You Old Enough? </h1>

    <form method="post"> <!--This form will post data to the server when the submit button is clicked-->
        <input type="text" name="age" placeholder="Enter an age"/>
        <input type="submit">
    </form>

    <h2 style="color: red;">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") { //Only will run if the submit button is clicked due to the method in the form
            echo checkAge((int)$_POST['age'])  ? 'You are old enough to enter!' : 'Must be 21 or older to enter!'; //(int) converts the string input to an integer to use i nthe backend
        } 
        ?>
    </h2>

</body>
</html>