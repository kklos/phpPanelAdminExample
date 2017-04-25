<?php
class Comment{
 
    // database connection and table name
    private $conn;
    private $table_name = "comments";
 
    // object properties
    private $id;
    private $content;
    private $addedBy;
    
    private $announcement_id;
    private $timestamp;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    public function setId( $id )
    {
        $this->id = $id;
    }
    public function getId()
    {
          return $this->id;
    }

    public function setContent( $content)
    {
        $this->content= $content;
    }
    public function getContent()
    {
          return $this->content;
    }

    public function setAddedBy( $addedBy)
    {
        $this->addedBy= $addedBy;
    }
    public function getAddedBy()
    {
          return $this->addedBy;
    }

    public function setAnnouncementId( $announcement_id )
    {
        $this->announcement_id = $announcement_id;
    }
    public function getAnnouncementId()
    {
          return $this->announcement_id;
    }

    public function setTimestamp( $timestamp )
    {
        $this->timestamp = $timestamp;
    }
    public function getTimestamp()
    {
          return $this->timestamp;
    }

    // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, price=:price, description=:description, category_id=:category_id, created=:created";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
 
        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->timestamp);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
}
?>