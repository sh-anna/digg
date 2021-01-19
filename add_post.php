<?php

session_start();

if( ! isset($_SESSION['user_id'])) {
    header('location: signin.php');
}

$page_title = 'Add Post Page';
$errors = ['title' => '', 'article' => ''];
require_once 'app/helpers.php';

if( isset($_POST['submit']) ){

    $title = !empty($_POST['title']) ? trim($_POST['title']) : '';
    $article = !empty($_POST['article']) ? trim($_POST['article']) : '';
    $form_valid = true;
  
    if( ! $title || mb_strlen($title) < 2 ||  mb_strlen($title) > 255){
      $errors['title'] = 'Title is required for 2-255 chars';
      $form_valid = false;
    }
  
    if( ! $article || mb_strlen($article) < 2){
      $errors['article'] = 'Article is required for min 2 chars';
      $form_valid = false;
    }

    if( $form_valid ){

        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
        $uid = $_SESSION['user_id'];
        $sql = "INSERT INTO posts VALUES(null, $uid, '$title', '$article', NOW())";
        $result = mysqli_query($link, $sql);
    
        if( $result && mysqli_affected_rows($link) > 0 ){
            header('location: blog.php');
        }
    
    }
    
  }
  

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