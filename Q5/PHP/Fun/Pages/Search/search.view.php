<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style><?php include("style.css"); ?></style>
    <script src="https://kit.fontawesome.com/de1ce5e4ae.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../../States/Rhode Island.svg">
    <title>Activity Search</title>
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
                        <a class="custom-link" href="../TripPlan/tripplan.php">
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
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main style="height: 100vh;">
            <table>
                <thead>
                    <th>ID</th>
                    <th>State</th>
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