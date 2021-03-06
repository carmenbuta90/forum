<?php
class Topic{
    //Init DB Variable
    private $db;
    
    /*
     * Constructor
     */
    public function __construct(){
        $this->db = new Database;
    }
    
    /*
     * Get all topics
     */
    public function getAllTopics(){
        $this->db->query("SELECT topics.*, users.username, users.avatar, categories.name FROM topics
                         INNER JOIN users 
                         ON topics.user_id = users.id 
                         INNER JOIN categories
                         ON topics.category_id = categories.id
                         ORDER BY create_date DESC
                        ");
        //asssign the results set
        $results = $this->db->resultset();
        return $results;
    }
    
     /*
     * Get By category
     */
    public function getByCategory($category_id){
        $this->db->query("SELECT topics.*, users.username, users.avatar , categories.name FROM topics
                         INNER JOIN categories
                         ON topics.category_id = categories.id 
                         INNER JOIN users
                         ON topics.user_id = users.id
                         WHERE topics.category_id = :category_id
                        ");
        $this->db->bind(':category_id',$category_id);
        
        //asssign the results set
        $results = $this->db->resultset();
        return $results;
    }
    
     /*
     * Get By user
     */
    public function getByUser($user_id){
        $this->db->query("SELECT topics.*,categories.*, users.username, users.avatar FROM topics
                        INNER JOIN categories
                        ON topics.category_id = categories.id
                        INNER JOIN users
                        ON topics.user_id = users.id
                        WHERE topics.user_id = :user_id
                        ");
        $this->db->bind(':user_id', $user_id);
        //assign result set
        $results = $this->db->resultset();
        return $results;
    }
    
    
    /*
     * Get total number of topics
     */
    
    public function getTotalTopics(){
        $this->db->query('SELECT * FROM topics');
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    
    /*
     * Get total number of categories
     */
    
    public function getTotalCategories(){
        $this->db->query('SELECT * FROM categories');
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    
    public function getCategory($category_id){
        $this->db->query("SELECT * FROM categories WHERE id = :category_id");
        $this->db->bind(':category_id', $category_id);
        //assign row
        $row = $this->db->single();
        return $row;
    }
    
    /*
     * Get total number of replies
     */
    
    public function getTotalReplies($topic_id){
        $this->db->query('SELECT * FROM replies WHERE topic_id= '.$topic_id);
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    
    /*
     * Get topic by id
     */
    
    public function getTopic($id){
        $this->db->query("SELECT topics.*, users.username, users.name, users.avatar FROM topics
                         INNER JOIN users
                         ON topics.user_id=users.id
                         WHERE topics.id = :id
");
        $this->db->bind(':id', $id);
        //assign row
        $row = $this->db->single();
   
        return $row;
    }
    
     /*
     * Get topic by id
     */
    
    public function getReplies($topic_id){
        $this->db->query("SELECT replies.*, users.* FROM replies
                         INNER JOIN users
                         ON replies.user_id = users.id
                         WHERE replies.topic_id = :topic_id
                         ORDER BY create_date ASC
");
        $this->db->bind(':topic_id', $topic_id);
        //assign row
        $results = $this->db->resultset();
   
        return $results;
    }
    
   public function create($data){
       //insert query
       $this->db->query("INSERT INTO topics(category_id, user_id, title, body, last_activity)
                        VALUES(:category_id, :user_id, :title, :body, :last_activity)");
       
       //bind values
       
      $this->db->bind(':category_id',$data['category_id']);
      $this->db->bind(':user_id',$data['user_id']);
      $this->db->bind(':title',$data['title']);
      $this->db->bind(':body',$data['body']);
      $this->db->bind(':last_activity',$data['last_activity']);
      
      //execute
      if($this->db->execute()){
          return true;
      }else{
          return false;
      }
      
   } 
   
   public function reply($data){
       //insert query
       $this->db->query("INSERT INTO replies(topic_id, user_id, body)
                        VALUES(:topic_id, :user_id, :body)");
       
       //bind values
       
      $this->db->bind(':topic_id',$data['topic_id']);
      $this->db->bind(':user_id',$data['user_id']);
      $this->db->bind(':body',$data['body']);
      
      //execute
      if($this->db->execute()){
          return true;
      }else{
          return false;
      }
       
   }
}
