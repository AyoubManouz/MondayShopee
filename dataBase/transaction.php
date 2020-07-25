<?php

class transaction
{
    public $db=null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con))return null;
        $this->db=$db;
    }

    public function addTransaction($data=null,$table = "transactions"){
        if ($this->db->con != null) {
            if ($data != null) {

                 $columns = implode(',', array_keys($data));

                $val = implode(',' , array_values($data));
                $VAL = explode(",", $val);
                $values = "'" . implode("', '", $VAL) ."'";


                // create sql query
                $query_string = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $columns, $values);

               mysqli_query($this->db->con, $query_string);


            }
        }
    }
}