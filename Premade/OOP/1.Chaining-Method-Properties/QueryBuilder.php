<?php 

// /***************
//// Fluent Interface: A fluent interface is a design pattern that allows method chaining to create a more readable and expressive code style. Fluent interfaces are common in frameworks like Laravel or Doctripe in PHP.

class QueryBuilder{
    protected $query;

    public function select($fields){
        $this->query .= "SELECT $fields ";
        return $this;
    }
    public function from($table){
        $this->query .= "FROM $table ";
        return $this;
    }
    public function where($condition){
        $this->query .= "WHERE $condition";
        return $this;
    }
    public function getQuery(){
        return $this->query . ";";
    }
}

$query = (new QueryBuilder())->select("*")->from("users")->where("id = 1")->getQuery();
echo $query;  // SELECT * FROM users WHERE id = 1;

// ***************/



