<?php require APPROOT . '/views/inc/header.php'; ?>
<?php if( isset($_SESSION['message'])) { echo "<script>alert('".$_SESSION['message']."');</script>";    unset($_SESSION['message']) ; } ?>
</section>
<section   class="hero d-flex align-items-center  ">
        <div class=" container  xx position-relative container-fluid justify-content-center">
          <div  class="up text-center">
          <h1 class="display-5 fw-bolder text-white "> Tasky </h1>
          <h2 class=" text-white mb-3"> The best task managing website </h2>
          <?php if(isset($_SESSION['user_id'])  ) : ?>
            <a href="<?php echo URLROOT;?>tasks/index" class="btn btn-outline-light fw-bold btn tm " type="button">MAKE A TASK</a>
              
          </li>
          <?php else : ?>
            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-outline-light fw-bold btn tm mr-3" type="button">Register</a><a href="<?php echo URLROOT; ?>/users/login" class="btn btn-outline-light fw-bold btn-lg tm ml-3" type="button">Login</a>
          <?php endif; ?>
          
        </div>
        </div>
    </section>

    
<?php require APPROOT . '/views/inc/footer.php'; ?>

