<?php


class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public function insertIntoCart($params = null, $table = "cart"){
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
    public function addToCart($buyorderid, $itemid, $cartamount = 1, $cartprice = 0){
        if (isset($buyorderid) && isset($itemid)){
            $params = array(
                "buyorder_id" => $buyorderid,
                "item_id" => $itemid,
                "cart_amount" => $cartamount,
                "cart_price" => $cartprice
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // reload page
                header("Location:".$_SERVER['PHP_SELF']);
            }
        }
    }

    // Edit cart
    public function editCart($cart_id ,$amount, $price){
        if($this->db->con != null){
            if ($cart_id != null && $amount != null && $price != null){

                // create sql query
                $query_string = sprintf("UPDATE cart SET cart_amount=%s,cart_price=%s WHERE cart_id=%s", $amount, $price, $cart_id);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // Delete cart item using cart item id
    public function deleteCart($item_id = null, $buyorder_id = null, $table = 'cart'){
        if ($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id} AND buyorder_id={$buyorder_id}");
            if ($result){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    
    // get item_id of shoping cart list
    public function getCartId($cartArray = null, $item_id = 'item_id'){
        if ($cartArray != null){
            return array_map(function ($value) use($item_id){
                return $value[$item_id];
            }, $cartArray);
        }
    }

    // get cart from buyorder id
    public function getCartByBuyorderId($buyorder_id, $table = 'cart'){
        if (isset($buyorder_id)) {
            $result = $this->db->con->query("Select * from {$table} WHERE buyorder_id={$buyorder_id}");

            $resultArray = array();

            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

    // get cart from cart id
    public function getCartById($cart_id, $table = 'cart'){
        if (isset($cart_id)) {
            $result = $this->db->con->query("Select * from {$table} WHERE cart_id={$cart_id}");

            $resultArray = array();

            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
}