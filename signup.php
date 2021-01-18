<?php 

$page_title = 'Signup Page';
$errors = ['name' => '', 'email' => '', 'password' => '',];

// if client press on submit button
if( isset($_POST['submit']) ){

  // collect data from signup form
  $name = ! empty($_POST['name']) ? trim($_POST['name']) : '';
  $email = ! empty($_POST['email']) ? trim($_POST['email']) : '';
  $password = ! empty($_POST['password']) ? trim($_POST['password']) : '';

  // validate name field
  if( ! $name || mb_strlen($name) < 2 || mb_strlen($name) > 70 ){
    $errors['name'] = 'Name is required for 2-70 chars';
  }

  // validate email field
  if( ! $email ){
    $errors['email'] = 'A valid email is required';
  }

  // validate password field
  if( ! $password || strlen($password) < 6 || strlen($password) > 20 ){
    $errors['password'] = 'Password is required for 6-20 chars';
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
            <input type="text" name="name" id="name" class="form-control">
            <span class="text-danger"><?= $errors['name']; ?></span>
          </div>
          <div class="mb-3">
            <label for="email">* Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <span class="text-danger"><?= $errors['email']; ?></span>
          </div>
          <div class="mb-3">
            <label for="password">* Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <span class="text-danger"><?= $errors['password']; ?></span>
          </div>
          <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Signup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<?php include('tpl/footer.php'); ?>