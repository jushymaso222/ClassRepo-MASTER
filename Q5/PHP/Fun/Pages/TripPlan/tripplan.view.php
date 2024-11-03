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

            <a class="custom-link" href="#">
                Info
            </a>

            <span class="verticlerule">|</span>

            <a class="custom-link" href="#">
                Sign-In <i class="fa-solid fa-person-walking-arrow-right"></i>
            </a>
        </nav>

        <main style="height: 100vh;">
            <h2>Trip Order:</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <ol>
                            <li>Rhode Island</li>
                            <li>Connecticut</li>
                            <li>Massachusetts</li>
                            <li>New Hampshire</li>
                            <li>Maine</li>
                            <li>Vermont</li>
                            <li>New York</li>
                            <li>New Jersey</li>
                            <li>Pennsylvania</li>
                            <li>Delaware</li>
                        </ol>
                    </div>
                    <div class="col-sm">
                        <ol start="11">
                            <li>Maryland [D.C.]</li>
                            <li>West Virginia</li>
                            <li>Virginia</li>
                            <li>North Carolina</li>
                            <li>South Carolina</li>
                            <li>Georgia</li>
                            <li>Florida</li>
                            <li>Alabama</li>
                            <li>Tennessee</li>
                            <li>Mississippi</li>
                        </ol>
                    </div>
                    <div class="col-sm">
                        <ol start="21">
                            <li>Louisiana</li>
                            <li>Arkansas</li>
                            <li>Missouri</li>
                            <li>Kansas</li>
                            <li>Oklahoma</li>
                            <li>Texas</li>
                            <li>New Mexico</li>
                            <li>Colorado</li>
                            <li>Utah</li>
                            <li>Arizona</li>
                        </ol>
                    </div>
                    <div class="col-sm">
                        <ol start="31">
                            <li>California</li>
                            <li>Nevada</li>
                            <li>Oregon</li>
                            <li>Alaska</li>
                            <li>Washington</li>
                            <li>Idaho</li>
                            <li>Montana</li>
                            <li>Wyoming</li>
                            <li>Nebraska</li>
                            <li>South Dakota</li>
                        </ol>
                    </div>
                    <div class="col-sm">
                        <ol start="41">
                            <li>North Dakota</li>
                            <li>Minnesota</li>
                            <li>Iowa</li>
                            <li>Wisconsin</li>
                            <li>Illinois</li>
                            <li>Kentucky</li>
                            <li>Indiana</li>
                            <li>Michigan</li>
                            <li>Ohio</li>
                            <li>Hawaii*</li>
                        </ol>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm center-text">
                        <p style="margin-left: 10%; font-size: 20pt; vertical-align: middle;">Starting off in Rhode Island, this image plans out a route between all 50 states (aside from Hawaii). On the home page, activities can be added to each individual state. Other locations that are excluded from this map are Puerto Rico, U.S. Virgin Islands, Guam, Northern Mariana Islands, and American Samoa. As of right now, there is no plan for these islands but can easily be added if interested.</p>
                    </div>
                    <div class="col-sm">
                        <img src="../../States/tripplan.png" alt="Trip Plan Image" style="width: 90%;">
                    </div>
                </div>
            </div>
            <hr>
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
</body>
</html>