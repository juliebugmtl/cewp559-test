<?php

class BaseModel
{
    
    protected $db_connection;
    
    function __construct($connection = null){
        if(!empty($connection)){
            $this->db_connection = $connection;
        }
    }
    
    
    public function getAll(){
        // Your code here
    }

    public function getOne($id){
        $query = "SELECT * FROM {$this->TableName} WHERE ID = $id";

        $result = $this->db_connection->query($query);
        
        if (!$result) {
            printf("Error: %s\n", $this->db_connection->error);
            return;
        }
        
        $item = $result->fetch_object(this->ClassName);
        $this->_data = $item;
    }
}