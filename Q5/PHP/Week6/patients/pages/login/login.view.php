<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "style.css";?></style>
    <title>Agartha Medicinal Group</title>
</head>
<body>
    <header>
        <h1>Agartha Medicinal Group</h1>
    </header>

    <div class="login-div">
        <form method="post" class="login-form">
            <div class="form-input">
                <label for="username">Username:</label>
                <input type="text" name="username">
            </div>
            <div class="form-input">
                <label for="password">Password:</label>
                <input type="password" name="password">
            </div>
            <input type="submit" id="submit" value="Login">
            <div style="margin-top: 20px;">
                <a href="index.php?redirect=index" class="custom-link">Back</d>
            </div>
        </form>
    </div>
    
</body>
</html>