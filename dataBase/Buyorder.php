<?php


class Buyorder
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into buyorder table
    public function insertIntoBuyorder($params = null, $table = "buyorder"){
        if($this->db->con != null){
            if ($params != null){
                // insert into cart("user_id") values (0)
                // get table columns
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // Get user_id and item_id and insert them into cart table
    public function addToBuyorder($user_id,$buyorder_status = 0, $buyorder_price = 0.0, $buyorder_date = 0){
        if (isset($user_id)){
            $params = array(
                "user_id" => $user_id,
                "buyorder_status" => $buyorder_status,
                "buyorder_date" => $buyorder_date,
                "buyorder_price" => $buyorder_price
            );

            // insert data into cart
            $result = $this->insertIntoBuyorder($params);
            if ($result){
                // reload page
                header("Location:".$_SERVER['PHP_SELF']);
            }
        }
    }

    // Calculate Sub total
    public function getSum($arr){
        if (isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    // get item_id of shoping cart list
    public function getBuyorder($user_id = 'user_id', $table = 'buyorder'){
        if ($user_id != null){
            $result = $this->db->con->query("Select * from {$table} WHERE user_id = {$user_id} AND buyorder_status = 0");

            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }

    // Edit Buyorder
    public function editBuyorderPrice($buyorder_id ,$price)
    {
        if ($this->db->con != null) {
            if ($buyorder_id != null && $price != null) {

                // create sql query
                $query_string = sprintf("UPDATE buyorder SET buyorder_price=%s WHERE buyorder_id=%s", $price, $buyorder_id);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // Edit Buyorder
    public function endBuyorder($buyorder_id ,$date=0, $statut = 1){
        if($this->db->con != null){
            if ($buyorder_id != null){

                // create sql query
                $query_string = "UPDATE buyorder SET buyorder_date=CURDATE(),buyorder_status={$statut} WHERE buyorder_id={$buyorder_id}";

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
}