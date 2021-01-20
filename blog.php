<?php 
session_start();
require_once 'app/helpers.php';
$page_title = 'Blog Page';
$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
$sql = "SELECT u.name,u.profile_image,p.* FROM posts p 
        JOIN users u ON u.id = p.user_id 
        ORDER BY p.date DESC";

$result = mysqli_query($link, $sql);

?>

<?php include('tpl/header.php'); ?>

<main class="min-h-900">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">DIGG Blog Page</h1>
                <p>We digg and Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, illo.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <?php if( isset($_SESSION['user_id']) ): ?>
                <a class="btn" href="add_post.php" style="background-color: #c6ffdd">+ Add New
                    Post</a>
                <?php else: ?>
                <span>Want to start digg?</span><br>
                <a href="signup.php">signup now!</a>
                <?php endif; ?>
            </div>
        </div>
        <?php if( mysqli_num_rows($result) > 0 ): ?>
        <div class="row">
            <?php while($post = mysqli_fetch_assoc($result)): ?>

            <div class="col-12 mt-3">
                <div class="card text-secondary"
                    style="background: linear-gradient(to right, #f7797d, #c6ffdd, #f7797d);">
                    <div class="card-header">
                        <img class="rounded-circle" src="images/<?= $post['profile_image']; ?>" width="50">
                        <span><?= $post['name']; ?></span>
                        <span class="float-end mt-3"><?= $post['date']; ?></span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $post['title']; ?></h5>
                        <p class="card-text"><?= $post['article']; ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>

    </div>
</main>

<?php include('tpl/footer.php'); ?>