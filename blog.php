<?php 
session_start();
$page_title = 'Blog Page';

?>

<?php include('tpl/header.php'); ?>

<main class="min-h-900">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">DIGG Blog Page</h1>
                <p>We digg and Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, illo.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if( isset($_SESSION['user_id']) ): ?>
                <a class="btn btn-warning" href="add_post.php">+ Add New Post</a>
                <?php else: ?>
                <span>Want to start digg?</span><br>
                <a href="signup.php">signup now!</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include('tpl/footer.php'); ?>