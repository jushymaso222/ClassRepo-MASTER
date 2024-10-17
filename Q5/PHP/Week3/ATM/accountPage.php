<?php
    if (isset ($_POST['withdraw'])) 
    {
        //something
    } 
    else if (isset ($_POST['deposit'])) 
    {
        //something
    }     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $accountType; ?> Account</title>
</head>
<body>
    <header>
        <h1><?= $accountType . ' Account';?></h1>
        <p><?= $number?></p>
    </header>
    
</body>
</html>