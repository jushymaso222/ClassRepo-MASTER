<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "style.css";?></style>
    <title>Patient Intake</title>
</head>
<body>
    <header>
        <h1>Agartha Medicinal Group</h1>
    </header>

    <div class="form-wrapper">
        <h2>New Patient Form</h2>
        <form name="intake" method="post">
            <div class="form-input">
                <label for="pFirstName">First Name:</label>
                <input type="text" name="pFirstName" value="<?= $firstName?>">
                <span class="error"><?= $errors['fName'];?></span>
            </div>

            <div class="form-input">
                <label for="pLastName">Last Name:</label>
                <input type="text" name="pLastName" value="<?= $lastName?>">
                <span class="error"><?= $errors['lName'];?></span>
            </div>

            <div class="form-input">
                <label for="pMarital">Marital Status:</label>
                <select name="pMarital">
                    <option value="default" <?php if($maritalStatus=="default") echo "selected='selected'"?>>Please Select One</option>
                    <option value=0 <?php if($maritalStatus==false) echo "selected='selected'"?>>Single</option>
                    <option value=1 <?php if($maritalStatus===true) echo "selected='selected'"?>>Married</option>
                </select>
                <span class="error"><?= $errors['Marital'];?></span>
            </div>

            <div class="form-input">
                <label for="pDOB">Date of Birth:</label>
                <input type="date" name="pDOB" value="<?= date("Y-m-d",$dateOfBirth)?>">
                <span class="error"><?= $errors['DOB'];?></span>
            </div>

            <div class="form-input">
                <label for="pHeightFt">Height:</label>
                <input type="number" name="pHeightFt" placeholder="'" min="1" max="8" value="<?= $heightFt?>"> <input type="number" name="pHeightIn" placeholder='"' min="0" max="11" value="<?= $heightIn?>">
                <span class="error"><?= $errors['Height'];?></span>
            </div>

            <div class="form-input">
                <label for="pWeight">Weight:</label>
                <input type="number" name="pWeight" value="<?= $weight?>">
                <span class="error"><?= $errors['Weight'];?></span>
            </div>

            <input type="submit" text="Submit">
        </form>
    </div>

    <footer>
        <p>Agartha Medical Group 2025 &copy;</p>
    </footer>
</body>
</html>