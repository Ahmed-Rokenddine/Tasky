<?php require APPROOT . '/views/inc/header.php'; ?>
<?php if( isset($_SESSION['message'])) { echo "<script>alert('".$_SESSION['message']."');</script>";    unset($_SESSION['message']) ; } ?>

<style>
  

</style>
</section>
<div class="row mb-3">

<!-- <?php if( isset($_SESSION['message'])) {?>
<div class=" container col-md-6 alert alert-warning alert-dismissible fade show shadow mt-5 text-center" role="alert">
  <strong><?php  echo $_SESSION['message'];      ?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['message']) ; } ?> -->
    <div class="col-md-12 text-center mt-5 title">
      
      <h1>TASKBOARD</h1>
    </div>
    
    <div class="  text-center mt-5 ">
      <input id="search-input" class="container form-control form-control-lg text-center border border-secondary shadow-lg" placeholder= '&#xF002; Search'  style="font-family: Arial, 'Font Awesome 5 Free'">
      <div class="dropdown">
       <button class=" col-4 btn  btn-dark float-right  mr-5 mt-3" type="button" data-bs-toggle="dropdown" aria-expanded="false"> ADD TASK <i class="fa fa-plus"></i>  </button>
          <ul class="dropdown-menu col-4">
              <li><button class="dropdown-item text-center" type="button"data-bs-toggle="modal" data-bs-target="#exampleModal"> SINGLE TASK <i class="bi bi-file-earmark"></i> </button></li>
              <hr width="100%" style="border-top:3px solid;opacity: 1;color:black; margin:0;">
              <li><button class="dropdown-item text-center" type="button"data-bs-toggle="modal" data-bs-target="#exampleModal2">MULTI TASK <i class="bi bi-files"></i></button></li>
              
        </ul>
      </div>
      <button type="button" class="col-4 btn btn-info float-left  ml-5 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal3">  ARCHIVE <i class="bi bi-file-zip-fill"></i> </button>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TASK ADDER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p class="text-danger">Fields marked with * are required.</p>
      <form action="<?php echo URLROOT; ?>/tasks/add" method="post">
      <div class="form-group">
        <label for="title">Title: *</label>
        <input type="text"  name="title" class="form-control form-control-lg text-center " required >
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="title">Description : * </label>
        <input type="text"  name="description" class="form-control form-control-lg text-center  " required >
        <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="title">Dead line  : *</label><br>
        <input type="datetime-local" class="form-control form-control-lg text-center" name="time" required>
      </div>
      <div class="form-group">
        <label for="title"> Statut: *</label>
        <select   name="status" class="form-control form-control-lg text-center" value="<?php echo $data['Statut']; ?>">
          <option value="todo" selected>To Do</option>
          <option value="doing">Doing</option>
          <option value="done">Done</option>
        <select>
      </div>
      <input type="text" name="tasknum" style="visibility: hidden;" value="1" readonly>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="ADD TASK">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal 3 -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex" id="exampleModalLabel">ARCHIVE &nbsp; 🗃️🗂️📂💼📦 &nbsp;|&nbsp; <div id="archive" class="fw-bold  h4 ml-2"></div></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center" style="display: grid;justify-items: center;">
      <?php foreach($data['tasks'] as $task) : ?>
                     <?php if($task->categorie == 'archived') { ?>  
                    <div style="width:94%;" class="card mt-3 shadow" name="archive">
                    <div class="card-header h5 justify-content-center coolDiv position-relative d-flex flex-wrap k btn-"  data-bs-toggle="collapse" href="#collapseExample<?php echo $task->id?>" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="bi bi-three-dots-vertical position-absolute c " style="left: 92%;"></i><?php if(strtotime($task->final_time) < strtotime(date("Y-m-d H:i:s"))){ echo "<h6>expired</h6>";}else{$rem = strtotime($task->final_time) - strtotime(date("Y-m-d H:i:s"));$day = floor($rem / 86400);$hr  = floor(($rem % 86400) / 3600);$min = floor(($rem % 3600) / 60);$sec = ($rem % 60); if( $day != 0){echo "<h6>$day</h6> days ";}  if( $hr != 0){echo" <h6>$hr</h6> hours "; }if( $min != 0){echo " <h6>$min</h6> minutes ";} if( $sec != 0){echo " <h6>$sec</h6> secondes ";} }?> </div>
                    <div class="card-body ">
                    <h5 class="card-title"><?php echo $task->title  ?></h5>
                    <div class="collapse" id="collapseExample<?php echo $task->id?>">
                    <p class="card-text"><?php echo $task->description  ?></p>
                    <!-- <a href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id;?>" type="button" class="btn btn-outline-success col mr-2" >Modify</a> -->
                    <div class="d-flex justify-content-center">
                    
                    <form  type="button" action="<?php echo URLROOT; ?>/tasks/unarchive/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi-arrow-bar-up btn btn-outline-warning   mr-1" style="font-size: 1.4rem;  " ></button></form>
                    <a href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id;?>" class="bi bi-tools btn btn-outline-success mr-1"  style="font-size: 1.4rem;" ></a><form  type="button" action="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi bi-trash3 btn btn-outline-danger mr-1" style="font-size: 1.4rem;  " ></button></form>
                    
                  </div>
                    </div>  
                    </div>
                    </div>
                    <?php } ?>
                    <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
  

<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TASK ADDER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="<?php echo URLROOT; ?>/tasks/add" method="post">
      
      <select class="form-select mt-3 mb-5 text-center" name="tasknum" id ="taskss" aria-label="Default select example" onchange="addRows()">
        
        <option selected value="2">two</option>
        <option value="3">Three</option>
        <option value="4">Four</option>
        <option value="5">Five</option>
        <option value="6">Six</option>
        <option value="7">Seven</option>
        <option value="8">Eight</option>
        <option value="9">Nine</option>
        <option value="10">Ten</option>
        
        
       </select>
       <p class="text-danger">Fields marked with * are required.</p>
       <div class="table-responsive">
    
 
      <table class="table" id="table22">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title *</th>
      <th scope="col">Description *</th>
      <th scope="col">Dead line *</th>
      <th scope="col">Statut</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><input type="text"  name="title[]" class="form-control form-control-lg text-center " required></td>
      <td><input type="text" pattern="^[a-zA-Z0-9\s]+$" name="description[]" class="form-control form-control-lg " required></td>
      <td><input type="datetime-local" class="form-control form-control-lg text-center" name="time[]" required></td>
      <td><select   name="status[]" class="form-control form-control-lg text-center" value="<?php echo $data['Statut']; ?>">
          <option value="todo" selected>To Do</option>
          <option value="doing">Doing</option>
          <option value="done">Done</option>
      <select></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><input type="text"  pattern="^[a-zA-Z0-9\s]+$" name="title[]" class="form-control form-control-lg text-center " required></td>
      <td><input type="text"  pattern="^[a-zA-Z0-9\s]+$" name="description[]" class="form-control form-control-lg " required></td>
      <td><input type="datetime-local" class="form-control form-control-lg text-center" name="time[]" required></td>
      <td><select   name="status[]" class="form-control form-control-lg text-center" value="<?php echo $data['Statut']; ?>">
          <option value="todo" selected>To Do</option>
          <option value="doing">Doing</option>
          <option value="done">Done</option>
      <select></td>
    </tr>
    
  </tbody>
</table>
</div>
      
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="ADD TASK">
        </form>
      </div>
    </div>
  </div>
</div>

<section class="row row-cols-1 mt-5 row-cols-md-3 g-4   bg-light rounded  ml-2 mr-2 mb-3" style="gap:0%;" >
          
          <div class="col-md-4 " >
                <div class="form-group text-center" style="display: grid;justify-items: center;" id="cardto">
                <div class="d-flex"><label class=" fw-bold " >TO DO &nbsp; 📖 &nbsp;|&nbsp;</label>  <div id="todo" class="fw-bold  h5 ml-2"></div></div>
                    <hr   width="80%" style="border-top:5px solid;opacity: 1;color:red; margin:0;">
                    <?php foreach($data['tasks'] as $task) : ?>
                     <?php if($task->categorie == 'todo') { ?>  
                    <div style="width:94%;" class="card mt-3 shadow" name="todo">
                    <div class="card-header h5 justify-content-center coolDiv position-relative d-flex flex-wrap k btn-"  data-bs-toggle="collapse" href="#collapseExample<?php echo $task->id?>" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="bi bi-three-dots-vertical position-absolute c " style="left: 92%;"></i><?php if(strtotime($task->final_time) < strtotime(date("Y-m-d H:i:s"))){ echo "<h6>Date expired</h6>";}else{$rem = strtotime($task->final_time) - strtotime(date("Y-m-d H:i:s"));$day = floor($rem / 86400);$hr  = floor(($rem % 86400) / 3600);$min = floor(($rem % 3600) / 60);$sec = ($rem % 60); if( $day != 0){echo "<h6>$day</h6> days ";}  if( $hr != 0){echo" <h6>$hr</h6> hours "; }if( $min != 0){echo " <h6>$min</h6> minutes ";} if( $sec != 0){echo " <h6>$sec</h6> secondes ";} }?> </div>
                    <div class="card-body position-relative">
                    <form  type="button" class="pinger" action="<?php echo URLROOT; ?>/tasks/right/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi-caret-right-fill btn position-absolute c mr-1" style="font-size: 1.4rem; top:10%;left:83% ; " ></button></form>
                    <h5 class="card-title"><?php echo $task->title  ?></h5>
                    <div class="collapse" id="collapseExample<?php echo $task->id?>">
                    <p class="card-text"><?php echo $task->description  ?></p>
                    <!-- <a href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id;?>" type="button" class="btn btn-outline-success col mr-2" >Modify</a> -->
                    <div class="d-flex justify-content-center">
                    <form  type="button" action="<?php echo URLROOT; ?>/tasks/archive/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi-archive-fill btn btn-outline-warning   mr-1" style="font-size: 1.4rem;  " ></button></form>
                    <a href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id;?>" class="bi bi-tools btn btn-outline-success mr-1"  style="font-size: 1.4rem;" ></a><form  type="button" action="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi bi-trash3 btn btn-outline-danger mr-1" style="font-size: 1.4rem;  " ></button></form>
                    
                  </div>
                    </div>  
                    </div>
                    </div>
                    <?php } ?>
                    <?php endforeach; ?>
                    
                </div>
            </div>
            
            <div class="col-md-4 ">
                <div class="form-group text-center grid" style="display: grid;justify-items: center;">
                    <div class="d-flex"><label class=" fw-bold " >DOING &nbsp; ⌛ &nbsp;|&nbsp;</label>  <div id="doing" class="fw-bold  h5 ml-2"></div></div>
                    <hr   width="80%" style="border-top:5px solid;opacity: 1;color:orange; margin:0;">
                    <?php foreach($data['tasks'] as $task) : ?>
                     <?php if($task->categorie == 'doing') { ?>  
                      <div style="width:94%;" class="card mt-3 shadow" name="doing">
                      <div class="card-header h5 justify-content-center coolDiv position-relative d-flex flex-wrap k btn-"  data-bs-toggle="collapse" href="#collapseExample<?php echo $task->id?>" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="bi bi-three-dots-vertical position-absolute c " style="left: 92%;"></i><?php if(strtotime($task->final_time) < strtotime(date("Y-m-d H:i:s"))){ echo "<h6>Date expired</h6>";}else{$rem = strtotime($task->final_time) - strtotime(date("Y-m-d H:i:s"));$day = floor($rem / 86400);$hr  = floor(($rem % 86400) / 3600);$min = floor(($rem % 3600) / 60);$sec = ($rem % 60); if( $day != 0){echo "<h6>$day</h6> days ";}  if( $hr != 0){echo" <h6>$hr</h6> hours "; }if( $min != 0){echo " <h6>$min</h6> minutes ";} if( $sec != 0){echo " <h6>$sec</h6> secondes ";} }?> </div>
                      <div class="card-body position-relative">
                    <form  type="button" class="pinger" action="<?php echo URLROOT; ?>/tasks/left/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi-caret-left-fill btn  mr-1 position-absolute c" style="font-size: 1.4rem;top:10%;right:83% ; " ></button></form>
                    <form  type="button" class="pinger" action="<?php echo URLROOT; ?>/tasks/right/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi-caret-right-fill btn position-absolute c mr-1" style="font-size: 1.4rem; top:10%;left:83% ; " ></button></form>
                    <h5 class="card-title"><?php echo $task->title  ?></h5>
                    <div class="collapse" id="collapseExample<?php echo $task->id?>">
                    <p class="card-text"><?php echo $task->description  ?></p>
                    <div class="d-flex justify-content-center">
                    <form  type="button" action="<?php echo URLROOT; ?>/tasks/archive/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi-archive-fill btn btn-outline-warning   mr-1" style="font-size: 1.4rem;  " ></button></form>
                    <a href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id;?>" class="bi bi-tools btn btn-outline-success mr-1"  style="font-size: 1.4rem;" ></a><form  type="button" action="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi bi-trash3 btn btn-outline-danger mr-1" style="font-size: 1.4rem;  " ></button></form>
                    
                  </div>
                    </div>  
                  </div>
                    </div>
                    <?php } ?>
                    <?php endforeach; ?>
                    
          
                    
                </div>
            </div>
            <div class="col-md-4 ">
              <div class="form-group text-center" style="display: grid;justify-items: center;">
              <div class="d-flex"><label class=" fw-bold " >DONE &nbsp; 🎉 &nbsp; |&nbsp;</label>  <div id="done" class="fw-bold  h5 ml-2"></div></div>
                <hr   width="80%" style="border-top:5px solid;opacity: 1;color:green; margin:0;">
                <?php foreach($data['tasks'] as $task) : ?>
                     <?php if($task->categorie == 'done') { ?>  
                      <div style="width:94%;" class="card mt-3 shadow" name="done">
                      <div class="card-header h5 justify-content-center coolDiv position-relative d-flex flex-wrap k btn-"  data-bs-toggle="collapse" href="#collapseExample<?php echo $task->id?>" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="bi bi-three-dots-vertical position-absolute c " style="left: 92%;"></i><?php if(strtotime($task->final_time) < strtotime(date("Y-m-d H:i:s"))){ echo "<h6>Date expired</h6>";}else{$rem = strtotime($task->final_time) - strtotime(date("Y-m-d H:i:s"));$day = floor($rem / 86400);$hr  = floor(($rem % 86400) / 3600);$min = floor(($rem % 3600) / 60);$sec = ($rem % 60); if( $day != 0){echo "<h6>$day</h6> days ";}  if( $hr != 0){echo" <h6>$hr</h6> hours "; }if( $min != 0){echo " <h6>$min</h6> minutes ";} if( $sec != 0){echo " <h6>$sec</h6> secondes ";} }?> </div>
                    <div class="card-body position-relative">
                    <form  type="button" class="pinger" action="<?php echo URLROOT; ?>/tasks/left/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi-caret-left-fill btn  mr-1 position-absolute c" style="font-size: 1.4rem;top:10%;right:83%  " ></button></form>
                    <h5 class="card-title"><?php echo $task->title  ?></h5>
                    <div class="collapse" id="collapseExample<?php echo $task->id?>">
                    <p class="card-text"><?php echo $task->description  ?></p>
                    <div class="d-flex justify-content-center">
                    <form  type="button" action="<?php echo URLROOT; ?>/tasks/archive/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi-archive-fill btn btn-outline-warning   mr-1" style="font-size: 1.4rem;  " ></button></form>
                    <a href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id;?>" class="bi bi-tools btn btn-outline-success mr-1"  style="font-size: 1.4rem;" ></a><form  type="button" action="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->id; ?>" method="post"><button type="submit" class="bi bi bi-trash3 btn btn-outline-danger mr-1" style="font-size: 1.4rem;  " ></button></form>
                    
                  </div>
                    </div>  
                  </div>
                    </div>
                    <?php } ?>
                    <?php endforeach; ?>
          
              </div>
             </div>
          
            
               
             
            
 
         
      
</section>
</div>
<div class="row mb-3">
    <div class="col-md-12 text-center mt-5 title">
      
      <h1>TASKBOARD</h1>
    </div>
    
  </div>
  
</div>

<div class="container mt-5">
<div class="modal fade" id="myModal" role="dialog" >
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="card">
      <div class="card-header ">
        <h5 class="card-title title" >TASK MODIFIER</h5>
        
      </div>
      <div class="card-body ">
      <p class="text-danger">Fields marked with * are required.</p>
<form action="<?php echo URLROOT; ?>/tasks/edit/<?php echo $data['id']; ?>" method="post">
      <div class="form-group">
        <label for="title">Title: *</label>
        <input type="text"  name="title" class="form-control form-control-lg text-center " value="<?php echo $data['title']; ?>">
        
      </div>
      <div class="form-group">
      <label for="Price">Description: *</label>
        <input type="text"   name="description" class="form-control form-control-lg text-center" value="<?php echo $data['description']; ?>">
        
      </div>
      <div class="form-group">
        <label for="title">Dead line  : *</label><br>
        <input type="datetime-local" class="form-control form-control-lg text-center" name="time" value="<?php echo $data['time']; ?>">
         </div>
      
      <div class="form-group">
        <label for="title"> Statut: *</label>
        <select   name="status" class="form-control form-control-lg text-center" value="<?php echo $data['status']; ?>">
          <option value="todo" <?php if($data['status'] == 'todo'){echo 'selected';} ?>>To Do</option>
          <option value="doing" <?php if($data['status'] == 'doing'){echo 'selected';} ?>>Doing</option>
          <option value="done" <?php if($data['status'] == 'done'){echo 'selected';} ?>>Done</option>
        <select>
      </div>
      
            
        

    
      </div>
      <div >
        
        </div>
        <div class="d-flex col-md-12 p-0 "><a href="<?php echo URLROOT; ?>/tasks" class=" col-6 btn btn-danger align-items-center justify-content- mt-2 " > Cancel</a>
        <input type="submit" class="col-6 btn btn-success align-items-center justify-content- mt-2" value="Modify TASK">
</form>

</div>

    </div>
    </div>
    </div>
    </div>
    </div>
    
  <div style="margin-top:13rem;">
  <?php require APPROOT . '/views/inc/footer.php'; ?>
 </div>
 <script>$(window).load(function(){    $('#myModal').modal('show');});
 </script>

 

  
  
  
  
