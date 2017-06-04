<?php
class Announcement{
 
    // database connection and table name
    private $conn;
    private $table_name = "announcements";
 
    // object properties
    private $id;
    private $name;
    private $description;
    private $price;
    
    private $category_id;
    private $timestamp;
    private $addedBy;
 
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

    public function setDescription( $description)
    {
        $this->description= $description;
    }
    public function getDescription()
    {
          return $this->description;
    }

    public function setPrice( $price)
    {
        $this->price= $price;
    }
    public function getPrice()
    {
          return $this->price;
    }

    public function setCategoryId( $category_id )
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId()
    {
          return $this->category_id;
    }

    public function setTimestamp( $timestamp )
    {
        $this->timestamp = $timestamp;
    }
    public function getTimestamp()
    {
          return $this->timestamp;
    }

    public function setAddedBy( $addedBy )
    {
        $this->addedBy = $addedBy;
    }
    public function getAddedBy()
    {
          return $this->addedBy;
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
        $this->addedBy=$_SESSION['user_session'];
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
 
        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->timestamp);
        $stmt->bindParam(":addedBy", $this->addedBy);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

	function readAllForSpecifyMainCategory($from_record_num, $records_per_page, $mainCategoryNum){
 
    $query = "SELECT
                p.id, p.name, p.description, p.price, p.category_id, p.addedBy, p.created
            FROM
            " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                c.parentId LIKE ?
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
   $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $mainCategoryNum);
 
    $stmt->execute();
 
    return $stmt;
	}

  function readAllForSpecifySubCategory($from_record_num, $records_per_page, $mainCategoryNum, 
    $subCategoryNum){
 
   $query = "SELECT
                p.id, p.name, p.description, p.price, p.category_id, p.addedBy, p.created
            FROM
            " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                c.parentId LIKE ? AND p.category_id LIKE ?
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
 $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $mainCategoryNum);
    $stmt->bindParam(2, $subCategoryNum);
   
    $stmt->execute();
 
    return $stmt;
    }

	// used for paging products
	public function countAll(){
 
    	$query = "SELECT id FROM " . $this->table_name . "";
 
    	$stmt = $this->conn->prepare( $query );
   	 	$stmt->execute();
 
    	$num = $stmt->rowCount();
 
    	return $num;
	}

function readOne(){
 
    $query = "SELECT
                name, price, description, category_id, addedBy, created
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->name = $row['name'];
    $this->price = $row['price'];
    $this->description = $row['description'];
    $this->addedBy = $row['addedBy'];
    $this->created = $row['created'];
    $this->category_id = $row['category_id'];
}


function update(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                price = :price,
                description = :description,
                modified = :modified,
                category_id  = :category_id
            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->timestamp = date('Y-m-d H:i:s');
 
    // bind parameters
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(":modified", $this->timestamp);
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

// delete the product
function delete(){
 
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
     
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
 
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

// read products by search term
public function search($search_term, $from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created, p.addedBy
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.name LIKE ? OR p.description LIKE ?
            ORDER BY
                p.name ASC
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(4, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}
 
public function countAll_BySearch($search_term){
 
    // select query
    $query = "SELECT
                COUNT(*) as total_rows
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.name LIKE ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
 
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

}
?>
