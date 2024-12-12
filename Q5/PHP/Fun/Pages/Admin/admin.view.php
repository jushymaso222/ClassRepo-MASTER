<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style><?php include("style.css"); ?></style>
    <script src="https://kit.fontawesome.com/de1ce5e4ae.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../../States/Rhode Island.svg">
    <title><?= $state; ?> - Activities</title>
</head>
<body>
    <div class="wrapper container-fluid w-100">
        <header style="height: 200px;" class="d-flex justify-content-center align-items-center">
            <h1>50 States Adventure</h1>
        </header>
        <nav style="height: 5em;">
            <div class="container-fluid">
                <div class="row h-100 d-flex align-items-center">
                    <!-- Column 1: Home link -->
                    <div class="col text-center">
                        <a class="custom-link" href="../../index.php">
                            <i class="fa-solid fa-house"></i> Home
                        </a>
                    </div>

                    <!-- Column 2: Info link -->
                    <div class="col text-center">
                        <a class="custom-link" href="../TripPlan/tripplan.php">Info</a>
                    </div>

                    <!-- Column 3: Search bar -->
                    <div class="col text-center">
                        <div class="input-group justify-content-center">
                            <div class="form-outline">
                                <input type="search" id="form-search" class="form-control" placeholder="Search" style="width: 200px;" />
                            </div>
                            <button type="button" class="btn btn-primary" id="search-button">
                                <i class="fas fa-search"></i>
                            </button>
                            <?php if (isset($_SESSION["user"]) && $_SESSION["user"] != "" && $_SESSION["user"][0]["username"] == "admin") : ?>
                                <a href="../Admin/admin.php" class="sign-in">
                                    <h2 style="font-size: 19pt; margin-left: 40px;">Admin</h2>
                                </a>
                            <?php else : ?>
                                <a href="../Login/login.php" class="sign-in">
                                    <h2 style="font-size: 19pt; margin-left: 40px;">
                                        <?php echo isset($_SESSION["user"]) && $_SESSION["user"] != "" ? $_SESSION["user"][0]["username"] : "Sign-In"; ?>
                                    </h2>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main style="height: 100vh;">
            <form method="post" class="center-text">
                <button name="logout" type="submit" style="margin-top: 40px;">logout</button>
            </form>

            <h2>
                Users
            </h2>

            <table>
                <thead>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Pasword</th>
                    <th>Edit</th>
                </thead>
                <tbody>
                    <?= $usersElements; ?>
                </tbody>
            </table>

            <div id="popup" <?php if(!isset($_GET["userId"])) {echo 'class="hidden"';}?>>
                <form method="post">
                    <p id="corner">X</p>
                    <div class="d-flex justify-content-between"><p><span class="error">*</span>Username:</p><input name="username" type="text" placeholder="Username" value="<?= $username;?>"></div>
                    <div class="d-flex justify-content-between"><p><span class="error">*</span>Email:</p><input name="email" type="text" placeholder="Email" value="<?= $email;?>"></div>
                    <div class="d-flex justify-content-between"><p><span class="error">*</span>Password:</p><input name="password" type="text" placeholder="Password" value="<?= $password;?>"></div>

                    <?php if($username != "admin"): ?>
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
    <script src="search.js"></script>
    <script src="popup.js"></script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, "info.php?state=<?= $state; ?>&reset-close=true" );
        }
    </script>
</body>
</html>