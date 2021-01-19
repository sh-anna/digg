<?php
require_once('app/helpers.php');

$page_title = 'Home Page';
$errors = ['name' => '', 'email' => '', 'password' => '',];

//if client press on submit button
if ( isset($_POST['submit'])) {
    // collect data from signup form
    $name = ! empty($_POST['name']) ? trim($_POST['name']) : '';
    $email = ! empty($_POST['email']) ? trim($_POST['email']) : '';
    $password = ! empty($_POST['password']) ? trim($_POST['password']) : '';
    $form_valid = true;
    // connect to mysql server
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);

    // validate name field (bdika kavar be zad sharat)
    if( ! $name || mb_strlen($name)  < 2 || mb_strlen($name) > 70){
        $errors['name'] = 'Name is required for 2-70 chars';
        $form_valid = false;
    }
    //validate email field
    if(! $email ) {
        $errors['name'] = 'A valid email is required';
        $form_valid = false;
    } elseif( email_exist($link, $email)){
        $errors['email'] = 'Email is taken';
        $form_valid = false;
    }
    //validate password field
    if( ! $password || strlen($password) < 6 || strlen($password) > 20){
        $errors['password'] = 'Password is required for 6-20 chars';
        $form_valid = false;
    }
    // if validate pass success
    if( $form_valid ){
        
        // query for insert new user
        $sql = "INSERT INTO users VALUES(null, '$name', '$email', '$password', 'default-profile.png')";
        // execute query
        $result = mysqli_query($link, $sql);
        // if mysqli_query return true (no sql error) && is inserted
        if( $result && mysqli_affected_rows($link) > 0 ){
            // redirect to blog page after registration
            header('location: blog.php');
        
        }
    }
}
?>

<?php include('tpl/header.php'); ?>

<main class="min-h-900">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Join Us and start digg for free!</h1>
                <p>Fill your details below and signup.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                    <div class="mb-3">
                        <label for="name">* Name</label>
                        <input value="<?= old('name'); ?>" type="text" name="name" id="name" class="form-control">
                        <span class="text-danger"><?= $errors['name']; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="email">* Email</label>
                        <input value="<?= old('email'); ?>" type="email" name="email" id="email" class="form-control">
                        <span class="text-danger"><?= $errors['email']; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="password">* Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <span class="text-danger"><?= $errors['password']; ?></span>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-info">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('tpl/footer.php'); ?>