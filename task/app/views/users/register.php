<?php if( isset($_SESSION['message'])) { echo "<script>alert('".$_SESSION['message']."');</script>";    unset($_SESSION['message']) ; } ?>
<?php require APPROOT . '/views/inc/header.php'; ?>
</section>
</div>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5 shadow">
        <h2 class="title">Register</h2>
        <img src="<?php echo URLROOT;?>/public/img/title.png" class="rounded-circle  align-self-center mb-4" width="30%" alt="...">
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
          <div class="form-group">
            <i class=" bi bi-person-vcard-fill position-absolute mt-1 " style ="left:6%;font-size: 1.6rem;"></i>
            <input type="text" name="name" class="form-control form-control-lg text-center <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>" placeholder=" First Name & Last Name">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          <div class="form-group">
            <i class="bi bi-envelope-fill position-absolute mt-1 " style ="left:6%;font-size: 1.6rem;"></i>
            <input type="email" name="email" pattern="(\w\.?)+@[\w\.-]+\.\w{2,4}" class="form-control form-control-lg text-center <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" placeholder=" Email">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
          <i class="bi bi-shield-lock-fill position-absolute mt-1 " style ="left:6%;font-size: 1.6rem;"></i>
            <input type="password" name="password" pattern="[a-zA-Z0-9]+" minlength="6"  class="form-control form-control-lg text-center <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" placeholder=" Password">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group">
          <i class="bi bi-shield-lock position-absolute mt-1 " style ="left:6%;font-size: 1.6rem;"></i>
            <input type="password" name="confirm_password" pattern="[a-zA-Z0-9]+" minlength="6"  class="form-control form-control-lg  text-center <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>" placeholder=" Confirm Password">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>

          
            <div class="col mt-4">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col mt-3">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          
        </form>
      </div>
    </div>
  </div>
  <div class="mt-4">
  <?php require APPROOT . '/views/inc/footer.php'; ?>
  </div>