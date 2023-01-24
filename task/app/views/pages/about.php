<?php require APPROOT . '/views/inc/header.php'; ?>
</section>
<section class=" row justify-content-center  ">
<video autoplay muted loop style="width: 80%;" class=" col-9 mt-4 mb-3  border border-dark shadow rounded center p-0"  >
        <source src="<?php echo URLROOT;?>/public/img/task.mp4" class="vid " type="video/mp4">
</video>
<input type=date min="<?php  echo(date("Y-m-d",time())); ?>">
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>