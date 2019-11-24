<?php

class Model 
{
    var $conn;

    public function __construct($socket, $name, $passwd, $database) 
    {
        $this->conn = mysqli_connect($socket, $name, $passwd, $database);
    }

    public function insert($request) 
    {
        $guest_name = addslashes($request['name']);
        $guest_age = $request['age'];
        $guest_gender = $request['gender'];
        $guest_email = addslashes($request['email']);

        $insert_query = "INSERT INTO guest_table (Guest_name, Age, Gender, Email)
                        VALUES ('$guest_name', $guest_age, '$guest_gender', '$guest_email')";
        // echo $insert_query."<br>";

        $insert = mysqli_query($this->conn, $insert_query);
        if (!$insert) {
            echo "Insert Error: " . mysqli_error($this->conn);
        }
    }

    public function delete($request) 
    {
        foreach ($request as $id) {
            $num = intval($id);
            $delete_query = "DELETE FROM guest_table
                            WHERE Guest_id = $num";
            // echo $delete_query . "<br>";
            $delete = mysqli_query($this->conn, $delete_query);
            if (!$delete) {
                echo "Delete Error: " . mysqli_error($this->conn) . "<br>";
            } 
        }
    }

    public function list_result() 
    {
        $sql_query = "SELECT * FROM guest_table;";
        $results = mysqli_query($this->conn, $sql_query);
        if (!$results) {
            echo "Query Error: " . mysqli_error($this->conn);
        }
        return $results;
    }

    public function __deconstruct() 
    {
        mysqli_close($this->conn);
    }
}

?>