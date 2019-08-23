function login(){
    // select all query
    $query = "SELECT
                `id`, `username`, `password`, `created`
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."' AND password='".$this->password."'";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();
    return $stmt;
}
