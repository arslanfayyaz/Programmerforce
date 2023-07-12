<?php

class Database{
    private $db_host="localhost";
    private $db_user="root";
    private $db_pass="";
    private $db_name="testing";

    private $conn=false;
    private $result=array();
    private $mysqli="";


public function  __construct(){
    if(!$this->conn){
        $this->mysqli=new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        $this->conn=true;
        if($this->mysqli->connect_error){
            array_push($this->result,$this->mysqli->connect_error);
            return false;
        }

    }

}

public function insert($table,$params=array()){
    if($this->tableExists($table)){
        $table_colums=implode(',',array_keys($params));
        //implode function concat array keys from array by seperated comma;
        $table_values=implode("','",$params);
        print_r($table_values);
        $sql="INSERT INTO $table ($table_colums) VALUES ('$table_values')";
        if($this->mysqli->query($sql)){
            array_push($this->result,$this->mysqli->insert_id);
            return true;
        }
        else{
            array_push($this->result,$this->mysqli->error);
            return false;
        }

    }else{
            return false;
    }


}
public function  update($table,$params=array(),$where=null){
    if($this->tableExists($table)){
        $args=array();
        foreach($params as $key => $value){
            $args[]="$key ='$value'";
        }
        $str=implode(',',$args);//implode changes array into key value pair 
        //  print_r($str);
       $sql="UPDATE $table SET ". $str;
       if($where!=null){
         $sql.="WHERE $where";
       }
       if($this->mysqli->query($sql)){
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
public function  delete($table,$where=null){
    if($this->tableExists($table)){
       $sql="DELETE FROM $table";
       if($where!=null){
        $sql.=" WHERE $where";
       }

       if($this->mysqli->query($sql)){
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

public function getResult(){

  $value=$this->result;
  $this->result=array();
  return $value;


}
public function select($table,$rows="*",$join=null,$where=null,$order=null,$limit=null){
    if($this->tableExists($table)){
        //$rows ka matlb h kay user kitnay columns show krwana chahta h 
         $sql="SELECT $rows FROM $table";
         if($join!=null){
            $sql.="JOIN $join";
         }
         if($where!=null){
            $sql.="WHERE $where";
         }
         if($order!=null){
            $sql.="ORDER BY $order";
         }
         if($limit!=null){
            $sql.="LIMIT 0,$limit";
         }
         echo $sql;
         $query=$this->mysqli->query($sql);
         if($query){
             $this->result=$query->fetch_all(MYSQLI_ASSOC);
             return true;
     
         }else{
             array_push($this->result,$this->mysqli->error);
             return false;
            }
    }else{
        return false;
    }
}
public function sql($sql){
    $query=$this->mysqli->query($sql);
    if($query){
        $this->result=$query->fetch_all(MYSQLI_ASSOC);
        //FETCH_all ak parameter leta h key ki form main hamay kis type main data chahyay
        //idar hm nay assosiative array ki form main data liya h aur usay result array main 
        // pass kr diay h
        return true;

    }else{
        array_push($this->result,$this->mysqli->error);
        return false;
}
    
}
private function tableExists($table)
{
    $sql="SHOW TABLES FROM $this->db_name LIKE '$table'";
    $tableInDb=$this->mysqli->query($sql);
    if($tableInDb){
        if($tableInDb->num_rows==1){
            return true;
        }
        else{
            array_push($this->result,$table."table doest not exist in our database");
            return false;
        }
    }

}
public function  __destruct(){
    if($this->conn){
          if($this->mysqli->close()){
            $this->conn=false;
            return true;
          }


    }else{
        return false;
    }
}

}

?>