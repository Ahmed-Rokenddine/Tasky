<?php

  class Task {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    public function gettasks(){
        $this->db->query('SELECT * FROM taches WHERE userid = :iid ORDER BY final_time DESC');
        $this->db->bind(':iid', $_SESSION['user_id']);
        
  
        $results = $this->db->resultSet();
  
        return $results;
      }
      public function addtask($data){
        if($data['num']=='1'){
          $this->db->query('INSERT INTO taches (userid  ,title,  description , categorie , final_time ) VALUES(:iid , :title, :description , :status, :time )');
          // Bind values
          $this->db->bind(':iid', $_SESSION['user_id']);
          $this->db->bind(':title', $data['title']);
          $this->db->bind(':description', $data['description']);
          $this->db->bind(':status', $data['status']);
          $this->db->bind(':time', $data['time']);
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }

        }
        else{
        for ($i = 0; $i < $data['num']; $i++) {
  
          
         $this->db->query('INSERT INTO taches (userid  ,title,  description , categorie , final_time ) VALUES(:iid , :title, :description , :status, :time )');
        // Bind values
        $this->db->bind(':iid', $_SESSION['user_id']);
        $this->db->bind(':title', $data['title'][$i]);
        $this->db->bind(':description', $data['description'][$i]);
        $this->db->bind(':status', $data['status'][$i]);
        $this->db->bind(':time', $data['time'][$i]);
        // Execute
          if($data['title'][$i] != ''){$this->db->execute();}
          }
        }
        
       
      }
      public function updatetask($data){
      
        $this->db->query('UPDATE taches SET title = :title, description = :description,  categorie = :categorie , final_time = :time  WHERE id = :id');
        // Bind values    
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':categorie', $data['status']);
        $this->db->bind(':time', $data['time']);
      
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
      public function gettaskById($id){
        $this->db->query('SELECT * FROM taches WHERE id = :id');
        $this->db->bind(':id', $id);
  
        $row = $this->db->single();
  
        return $row;
      }
      public function lefttask($data){
        $this->db->query('UPDATE taches SET categorie = :categorie  WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        if($data['status'] == 'done'){$this->db->bind(':categorie', 'doing');}
        elseif($data['status'] == 'doing'){$this->db->bind(':categorie', 'todo');}
  
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
      
      public function righttask($data){
        $this->db->query('UPDATE taches SET categorie = :categorie  WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        if($data['status'] == 'doing'){$this->db->bind(':categorie', 'done');}
        elseif($data['status'] == 'todo'){$this->db->bind(':categorie', 'doing');}
  
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
      public function archive($data){
        $this->db->query('UPDATE taches SET categorie = :categorie ,  archive = :archive  WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':categorie', $data['status']);
        $this->db->bind(':archive', $data['archive']);
  
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
      
      public function deletetask($id){
        $this->db->query('DELETE FROM  taches WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
   
    
}