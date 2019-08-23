// signup user
function signup(){
    if($this->isAlreadyExist()){
        return false;
    }
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                username=:username, password=:password, created=:created";
    // prepare query
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->created=htmlspecialchars(strip_tags($this->created));
    // bind values
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":created", $this->created);
    // execute query
    if($stmt->execute()){
        $this->id = $this->conn->lastInsertId();
        return true;
    }
    return false;
    
}
