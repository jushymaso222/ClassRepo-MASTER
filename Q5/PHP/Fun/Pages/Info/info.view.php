<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style><?php include("style.css"); ?></style>
    <script src="https://kit.fontawesome.com/de1ce5e4ae.js" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>
<body>
    <div class="wrapper container-fluid w-100">
        <header style="height: 200px;" class="d-flex justify-content-center align-items-center">
            <h1>50 States Adventure</h1>
        </header>
        <nav class="navbar navbar-light w-100">
            <a class="custom-link" href="../../index.php">
                <i class="fa-solid fa-house"></i> Home
            </a>

            <span class="verticlerule">|</span>

            <a class="custom-link" href="../TripPlan/tripplan.php">
                Info
            </a>

            <span class="verticlerule">|</span>

            <a class="custom-link" href="#">
                Sign-In <i class="fa-solid fa-person-walking-arrow-right"></i>
            </a>
        </nav>

        <main style="height: 100vh;">
            <h2>
                <?= $state; ?>
            </h2>

            <table>
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Price</th>
                    <th>Route</th>
                    <th>Priority</th>
                    <th>Notes</th>
                    <th>Admin</th>
                </thead>
                <tbody>
                    <?= $activityListElements; ?>
                </tbody>
            </table>

            <div class="addDiv">
                <a href="info.php?state=<?= $state; ?>&reset=true" class="openPopup-link"><p id="openPopup">+Add an Activity</p></a>
            </div>
            
            <div id="popup" <?php if($infoList == "" && $errors == ['name' => "", 'link' => ""]) {echo 'class="hidden"';}?>>
                <form method="post">
                    <p id="corner">X</p>
                    <div class="d-flex justify-content-between"><p><span class="error">*</span>Name:</p><input name="actname" type="text" placeholder="Activity Name" value="<?= $name;?>"></div>
                    <span class="error"><?= $errors['name'];?></span>
                    <div><textarea name="desc" placeholder="Activity Description" rows="4" cols="50"><?= $desc;?></textarea></div>
                    <div class="d-flex justify-content-between"><p><span class="error">*</span>Link:</p> <input name="link" type="text" placeholder="Activity Link" value="<?= $link;?>"></div>
                    <span class="error"><?= $errors['link'];?></span>
                    <div class="d-flex justify-content-between"><p>Price:</p> <input name="price" inputmode="decimal" type="number" min="0" step=".01" placeholder="$10.00" value="<?= $price;?>"></div>
                    <div class="d-flex justify-content-between"><p>Route:</p> <input name="route" type="text" placeholder="Activity Route" value="<?= $route;?>"></div>
                    <div class="d-flex justify-content-between">
                        <p>Priority:</p>
                        <select name="priority">
                            <option value="None" <?php if($priority == "None") {echo "selected";}?>>None</option>
                            <option value="Low" <?php if($priority == "Low") {echo "selected";}?>>Low</option>
                            <option value="Medium" <?php if($priority == "Medium") {echo "selected";}?>>Medium</option>
                            <option value="High" <?php if($priority == "High") {echo "selected";}?>>High</option>
                        </select>
                    </div>
                    <div><textarea name="notes" placeholder="Notes" rows="4" cols="50"><?= $notes;?></textarea></div>
                    <?php if($infoList == "" || $infoList == []): ?>
                        <div><input type="submit" name="submit" value="Submit" class="button"></div>
                    <?php else: ?>
                        <div style="display: flex;">
                            <div><input type="submit" name="update" value="Update" class="button"></div>
                            <div><input type="submit" name="delete" value="Delete" class="button"></div>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </main>

        <footer style="height: 4em;" class="d-flex justify-content-between align-items-center">
            <p style="padding-left: 30px;">&copy;2025 Joshua Mason</p>
            <p style="padding-right: 30px;">All Rights Reserved.</p>
        </footer>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="stateHover.js"></script>
    <script src="popup.js"></script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, "info.php?state=<?= $state; ?>&reset-close=true" );
        }
    </script>
</body>
</html>