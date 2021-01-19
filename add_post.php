<?php

session_start();

if( ! isset($_SESSION['user_id'])) {
    header('location: signin.php');
}

require_once 'app/helpers.php';

$page_title = 'Add Post Page';
$errors = ['title' => '', 'article' => ''];



?>


<?php include('tpl/header.php'); ?>

<main class="min-h-900">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Write your post here</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                    <div class="mb-3">
                        <label for="title">* Title</label>
                        <input value="<?=old('title');?>" type=" text" name="title" id="title" class="form-control">
                        <span class="text-danger"><?= $errors['title'];?></span>
                    </div>
                    <div class="mb-3">
                        <label for="article">* Article</label>
                        <textarea name="article" id="article" cols="30" rows="10"
                            class="form-control"><?=old('article'); ?></textarea>
                        <span class="text-danger"><?= $errors['article'];?></span>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Save Post</button>
                    <a class="ml-2 btn btn-secondary" href="blog.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('tpl/footer.php'); ?>