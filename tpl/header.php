<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Digg | <?= $page_title ?? '';?></title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand text-darck" href="./">DIGG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-darck" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-darck" href="blog.php">Blog</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <?php if( ! isset($_SESSION['user_id']) ): ?>
                        <li class="nav-item">
                            <a class="nav-link text-darck" href="signin.php">Signin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-darck" href="signup.php">Signup</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link text-darck" href="profile.php"><?= $_SESSION['user_name']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-darck" href="logout.php">Logout</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>