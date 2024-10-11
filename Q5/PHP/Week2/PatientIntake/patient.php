<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'style.css'?></style>
    <title>Confirmed</title>
</head>
<body>
    <header>
        <h1>Agartha Medicinal Group</h1>
    </header>

    <div class="info-wrapper">
        <h2>Form Submitted!</h2>
        Age: <?= $pAge?> <br/>
        BMI: <?= round($pBMIN,1)?> <br/>
        BMI Classification: <span style="color: <?= $textColor?>;"><?= $pBMIC?></span>
    </div>

    <footer>
        <p>Agartha Medical Group 2025 &copy;</p>
    </footer>
</body>
</html>