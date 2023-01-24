<?php   
    class tasks extends Controller {
      public function __construct(){
        if(!userisLoggedIn()){
          redirect('users/login');
        }
  
        $this->taskModel = $this->model('task');
      }
      
      public function index(){
        

        if($_SERVER['REQUEST_METHOD'] == 'POST'){



          // initiate data
         
          
           
         
           
            
              
          $data = [
            
            
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            'num' =>$_POST['tasknum'],
            'time' => $_POST['time'], 
            'title_err' => '',
            'description_err' => ''
            
          ];
          
        
                
              
         
  
          // Validate data
          if(empty($data['title'])){
            $data['title_err'] = 'Please enter title';
          }
          if(empty($data['description'])){
            $data['description_err'] = 'Please enter description';
          }
          
          
         
  
          // Make sure no errors
          if(empty($data['title_err']) && empty($data['Price_err'])  ){
            // Validated
            if($this->taskModel->addtask($data)){
              $_SESSION['message'] = 'TASK ADDED !';
              redirect('tasks');
              
              
            } else {
              
              $_SESSION['message'] = 'Multiple Task have Been ADDED !';
              redirect('tasks');
            }
            
          } else {
            // Load view with errors
            $_SESSION['message'] = 'Sorry not enough data to add a task !';
            redirect('tasks');
          }
          
        } else {
          $data = [
            
            'title' => '',
            'description' => '',
            'status' => '',
            'time' => '', 
            'title_err' => '',
            'description_err' => ''
          ];
    
          $tasks = $this->taskModel->gettasks();
          
          $data = [
            'tasks' => $tasks
          ];
         
          $this->view('tasks/index', $data);
          
        }
        
      }
      public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  
          
          // initiate data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $task = $this->taskModel->gettaskById($id);
          
          
          
            // update data
            
              $data = [
              
              'id' => $id,
              'title' => trim($_POST['title']),
              'description' => trim($_POST['description']),
              'status' => trim($_POST['status']),
              'time' => trim($_POST['time']), 
              'title_err' => '',
              'description_err' => ''
                
              ];
            
              
          
          
          
          
          
          
         
  
          // Validate data
          if(empty($data['title'])){
            $data['title_err'] = 'Please enter title';
          }
          if(empty($data['description'])){
            $data['description_err'] = 'Please enter description';
          }
        
          
         
  
          // Make sure no errors
          if(empty($data['title_err']) && empty($data['description_err'])  ){
            // Validated
            if($this->taskModel->updatetask($data)){
              
              $_SESSION['message'] = 'Task Updated !';
              redirect('tasks');
              
            } else {
              
              $_SESSION['message'] = 'Something went wrong !';
              redirect('tasks');
            }
          } else {
            // Load view with errors
            $this->view('tasks', $data);
          }
  
        } else {
          // Get existing post from model
          $task = $this->taskModel->gettaskById($id);
          $tasks = $this->taskModel->gettasks();
          $data = [
            
            'id' => $id,
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->categorie,
            'time' => $task->final_time,
            'tasks' => $tasks
            
          ];
          
          
          
         
          
    
          $this->view('tasks/edit', $data);
          
        }
      }
      public function left($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Get existing task from model
          $task = $this->taskModel->gettaskById($id);
          $data = [
            'id' => $id,
            'status' => $task->categorie
          ];
          
          if($this->taskModel->lefttask($data)){
             
            
              redirect('tasks');
          } else {
            
            $_SESSION['message'] = 'Something went wrong !';
            redirect('tasks');
            
          }
        } else {
          redirect('tasks');
        }
         
      }
      
      public function right($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Get existing task from model
          $task = $this->taskModel->gettaskById($id);
          $data = [
            'id' => $id,
            'status' => $task->categorie
          ];
          
          if($this->taskModel->righttask($data)){
             
            
              redirect('tasks');
          } else {
            
            $_SESSION['message'] = 'Something went wrong !';
            redirect('tasks');
            
          }
        } else {
          redirect('tasks');
        }
         
      }
      public function archive($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Get existing task from model
          $task = $this->taskModel->gettaskById($id);
          $data = [
            'id' => $id,
            'status' => 'archived',
            'archive'=> $task->categorie
          ];
          
          if($this->taskModel->archive($data)){  
            $_SESSION['message'] = 'Task Successfully archived ! ';
            redirect('tasks');
          } else {
            
            $_SESSION['message'] = 'Something went wrong !';
            redirect('tasks');
            
          }
        } else {
          redirect('tasks');
        }
         
      }
      public function unarchive($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Get existing task from model
          $task = $this->taskModel->gettaskById($id);
          $data = [
            'id' => $id,
            'status' => $task->archive,
            'archive'=> ''
          ];
          
          if($this->taskModel->archive($data)){  
            $_SESSION['message'] = 'Task Successfully unarchived ! ';
            redirect('tasks');
          } else {
            
            $_SESSION['message'] = 'Something went wrong !';
            redirect('tasks');
            
          }
        } else {
          redirect('tasks');
        }
         
      }
      public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Get existing task from model
          $post = $this->taskModel->gettaskById($id);
          
  
          if($this->taskModel->deletetask($id)){
             
            $_SESSION['message'] = 'TASK REMOVED !';
              redirect('tasks');
          } else {
            
            $_SESSION['message'] = 'Something went wrong !';
            redirect('tasks');
            
          }
        } else {
          redirect('tasks');
        }
      }
     
    }