<?php

class Database{
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'text_keep';

    private $mysqli = "";
    private $result = array();


    private $con = false;
    public function __construct(){
        if(!$this->con){{
            $this->mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
            $this->con = true;
            if ($this->mysqli->connect_error) {
               array_push($this->result,$this->mysqli->connect_error); 
               return false;
            }else{
                return true;
            }
        };
    };
    }

    public function insert($table,$param=array()){
        if($this->tableExits($table)){
            $table_columns = implode(',',array_keys($param));
            $data = implode("','",$param);
            $sql = "INSERT INTO $table ($table_columns) VALUES ('$data')";
            echo $sql;
            if($this->mysqli->query($sql)){
                array_push($this->result,$this->mysqli->insert_id);
                return true;
            }else{
                array_push($this->result,$this->mysqli->error);
                return false;
            }
        }else{
            echo "failed to find table";
            return false;
        }
    }
    public function getResult(){
        $val=$this->result;
        $this->result= array();
        return $val;
    }
    private function tableExits($table){
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb= $this->mysqli->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true;
            }else{
                array_push($this->result,$table."does not exist");
                return false;
            }
        }
    }
    
    public function display($table,$join=null,$where=null){
        if($this->tableExits($table)){
            $sql = "SELECT * FROM $table";
            if($join !=null){
                $sql.= " JOIN $join";
            }
            if($where !=null){
                $sql.= "WHERE $where";
            }
            $query = $this->mysqli->query($sql);
            if($query){
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return $this->result;
            }else{
                array_push($this->result,$this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }
    }
    public function display1($table,$where=null){
        if($this->tableExits($table)){
            $sql = "SELECT * FROM $table ";
            if($where !=null){
                $sql.= "WHERE $where";
            }
            $query = $this->mysqli->query($sql);
            if($query){
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return $this->result;
            }else{
                array_push($this->result,$this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }
    }

    public function delete($table,$where=null) {
        if($this->tableExits($table)){
            $sql = "DELETE FROM $table ";
            if($where !=null){
                $sql.= "WHERE $where";
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->result,$this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result,$this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }
    }
    public function update($table,$param=array(),$where=null) {
        if($this->tableExits($table)){
            $args = array();
            foreach ($param as $key => $value) {
                $args[] = "$key = '$value'";
            }
            $sql = "UPDATE $table SET " . implode(",",$args);
            if($where !=null){
                $sql.= "WHERE $where";
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->result,$this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result,$this->mysqli->error);
            }
        }else{
            return false;
        }
    }

    public function sql($sql){
        $query = $this->mysqli->query($sql);
        if ($query) {
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push($this->result,$this->mysqli->error);
            return false;
        }
    }

    public function __destruct()
    {
        if ($this->con) {
            if($this->mysqli->close()){
                $this->con = false;
                return true;
            }
        }else{
            return false;
        };
    }
};

?>