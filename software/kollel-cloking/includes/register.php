<?php include 'head.php';
?>
    <h2>Register</h2>
   <form method="post" action="validation/register-validation.php">
  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
      </div>
        <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div class="mb-3">
    <label for="password1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password1">
  </div>
    <div class="mb-3">
    <label for="password2" class="form-label">Retype Password</label>
    <input type="password" class="form-control" id="password2">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php include 'footer.php';
?>