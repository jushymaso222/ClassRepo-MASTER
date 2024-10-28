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

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Marital Status</th>
                <th>Date of Birth</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?= $patientList; ?>
        </tbody>
    </table>

    <div class="addNew">
        <a class="addNewButton" href="index.php?redirect=intake&action=Add">+ Add a Record</a>
    </div>
    
</body>
</html>