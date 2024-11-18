<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style><?php include("style.css"); ?></style>
    <script src="https://kit.fontawesome.com/de1ce5e4ae.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../../States/Rhode Island.svg">
    <title>Trip Info</title>
</head>
<body>
    <div class="wrapper container-fluid w-100">
        <header style="height: 200px;" class="d-flex justify-content-center align-items-center">
            <h1>50 States Adventure</h1>
        </header>
        <nav style="height: 5em;">
            <div class="container-fluid">
                <div class="row">
                    <!-- Column 1: Home link -->
                    <div class="col text-center">
                        <a class="custom-link" href="../../index.php">
                            <i class="fa-solid fa-house"></i> Home
                        </a>
                    </div>

                    <!-- Column 2: Info link -->
                    <div class="col text-center">
                        <a class="custom-link" href="#">
                            Info
                        </a>
                    </div>

                    <!-- Column 3: Search bar -->
                    <div class="col text-center">
                        <div class="input-group justify-content-center">
                            <div class="form-outline">
                                <input type="search" id="form-search" class="form-control" placeholder="Search" style="width: 400px;"/>
                            </div>
                            <button type="button" class="btn btn-primary" id="search-button">
                                <i class="fas fa-search"></i>
                            </button>
                            <a href="../Login/login.php"  class="sign-in"><h3 style="font-size: 19pt; align-items: center; margin-left: 40px;">Sign-In</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main style="height: 100vh;">
            <div class="form-box" <?php if(isset($_GET["action"]) && $_GET["action"] == "create"): ?>style="height: 15em;" <?php endif; ?>>
                <form method="post">
                    <?php if(isset($_GET["action"]) && $_GET["action"] == "forgot"): ?>
                        <div class="form-input">
                            <input type="text" placeholder="Email" name="email">
                        </div>
                        <button name="forgot" type="submit" class="submit-button">Recover Account</button>
                    <?php else: ?>
                        <div class="form-input">
                            <input type="text" placeholder="Username" name="username">
                        </div>
                        <?php if(isset($_GET["action"]) && $_GET["action"] == "create"): ?>
                        <div class="form-input">
                            <input type="text" placeholder="Email" name="email">
                        </div>
                        <?php endif; ?>
                        <div class="form-input">
                            <input type="password" placeholder="Password" name="password">
                        </div>
                        <?php if(isset($_GET["action"]) && $_GET["action"] == "create"): ?>
                            <button name="create" type="submit" class="submit-button">Create Account</button>
                        <?php else: ?>
                            <button name="signin" type="submit" class="submit-button">Sign-in</button>
                        <?php endif; ?>
                    <?php endif; ?>
                </form>
                <div class="form-links">
                    <?php if(isset($_GET["action"]) && $_GET["action"] == "create"): ?>
                        <a href="login.php?action=signin">Sign-In</a>
                    <?php else: ?>
                        <a href="login.php?action=create">Create Account</a>
                    <?php endif; ?>
                    <a href="login.php?action=forgot">Forgot Password</a>
                </div>
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
</body>
</html>