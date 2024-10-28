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
        <h2><?= $action; ?> Patient Form</h2>
        <form name="intake" method="post">
            <div class="form-input">
                <label for="pFirstName">First Name:</label>
                <input type="text" name="pFirstName" value="<?= $firstName?>">
            </div>
            <span class="error"><?= $errors['fName'];?></span>

            <div class="form-input">
                <label for="pLastName">Last Name:</label>
                <input type="text" name="pLastName" value="<?= $lastName?>">
            </div>
            <span class="error"><?= $errors['lName'];?></span>

            <div class="form-input">
                <label for="pMarital">Marital Status:</label>
                <select name="pMarital">
                    <option value="default" <?php if($maritalStatus=="default") echo "selected='selected'"?>>Please Select One</option>
                    <option value=0 <?php if($maritalStatus==false) echo "selected='selected'"?>>Single</option>
                    <option value=1 <?php if($maritalStatus===true) echo "selected='selected'"?>>Married</option>
                </select>
            </div>
            <span class="error"><?= $errors['Marital'];?></span>

            <div class="form-input">
                <label for="pDOB">Date of Birth:</label>
                <input type="date" name="pDOB" value="<?= date("Y-m-d",$dateOfBirth)?>">
            </div>
            <span class="error"><?= $errors['DOB'];?></span>

            <?php if($action == "Add"): ?>
            <input type="submit" name="addPatient" value="Submit" class="submit">
            <?php endif; ?>

            <?php if($action == "Edit"): ?>
            <input type="submit" name="updatePatient" value="Update" class="submit updateButton">
            <?php endif; ?>

            <?php if($action == "Edit"): ?>
            <input type="submit" name="deletePatient" value="Delete" class="submit deleteButton">
            <?php endif; ?>
        </form>
        <a class="addNewButton" href="index.php?redirect=index"><- Back</a>
    </div>
    

    <footer>
        <p>Agartha Medical Group 2025 &copy;</p>
    </footer>
</body>
</html>