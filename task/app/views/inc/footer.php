
    
   </section>
   </div>
      <section id="Section10" class="bg-black text-white shadow " style="margin-top:-12px">
      <div class="container">
        <footer class="py-5">
          <div class="row">
          
      
            <div class="col-6 col-md-6 mb-3 text-center ">
              <h5>TASKY</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="<?php echo URLROOT;?>" class="nav-link p-0 c">Home</a></li>
                <?php if(isset($_SESSION['user_id'])) : ?>
                  <li class="nav-item mb-2"><a href="<?php echo URLROOT;?>tasks/index" class="nav-link p-0 c">TASKMANAGER</a></li>
                  <li class="nav-item mb-2"><a href="<?php echo URLROOT; ?>/users/logout" class="nav-link p-0 c">Logout</a></li>
                <?php else : ?> 
                  <li class="nav-item mb-2"><a href="<?php echo URLROOT; ?>/users/register" class="nav-link p-0 c">Register</a></li>
                  <li class="nav-item mb-2"><a href="<?php echo URLROOT; ?>/users/login" class="nav-link p-0 c">Login</a></li>     
                <?php endif; ?>
                <li class="nav-item mb-2"><a href="<?php echo URLROOT;?>pages/about" class="nav-link p-0 c">About</a></li>
              </ul>
            </div>
      
            <div class="col-6 mb-3">
              <form>
                <h5>Subscribe to our newsletter</h5>
                <p>Monthly digest of what's new and exciting from us.</p>
                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                  <label for="newsletter1" class="visually-hidden">Email address</label>
                  <input id="newsletter1" type="text" class="form-control" placeholder="Email address" required>
                  <button class="btn grad" type="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
      
          <div class="text-center border-top">
            <p>&copy; 2022 Pestana, Inc. All rights reserved.</p>
            <p>Designed by <a class="grad" style="-webkit-background-clip: text;-webkit-text-fill-color: transparent;" href="https://www.linkedin.com/in/ahmed-rokenddine-736669254/">Ahmed-Rokenddine</a></p>
            
          </div>
        </footer>
      </div>
    </section>
    
      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  
<script src="<?php echo URLROOT; ?>public/js/main.js"></script>
            
        </body>
      </html>
 
