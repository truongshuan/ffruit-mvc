<?php


namespace App\App\Models;


use App\App\Models\BaseModel;
use App\App\Core\Session;
use mysqli;


class Order extends BaseModel
{

    private $table_orders = 'orders';
    private $table_detail = 'orders_detail';
    function __construct()
    {
        parent::__construct();
    }
    public function getAll(): bool|array
    {
        $fields = [
            'orders.id',
            'orders.phone' ,
            'orders.email',
            'orders.address',
            'orders.note' ,
            'orders.created_at',
            'orders.status' ,
            'orders.payment_method' ,
            'orders.customer_id' ,
        ];
        $fieldsRelation = [
            'users.id as user_id',
            'users.fullname as fullname'
        ];
        $conditions = [];
        $conditionsRelation = [];
        return $this->selectWithRelation('orders', $fields, $conditions, 'users', $fieldsRelation, $conditionsRelation, 'orders.customer_id', 'id', 0, 'ORDER BY orders.id ASC');
    }
    public function getById($id){
        $fields = [
            'orders.id',
            'orders.phone' ,
            'orders.email',
            'orders.address',
            'orders.note' ,
            'orders.created_at',
            'orders.status' ,
            'orders.payment_method' ,
            'orders.customer_id' ,
        ];
        $conditions = [
            'id' => $id
        ];
        return $this->selectOne($this->table_orders,$fields,$conditions);
    }
    public function updateOrder($id, $status){
        $data = [
            'status' => $status
        ];
        $conditions = [
            'id' => $id
        ];
        return $this->updateData($this->table_orders,$data,$conditions);
    }
    public function insertOrder($phone, $email, $address,$note,$payment_method,$customer_id){
       $data  = [
           'phone' => $phone,
           'email' =>$email,
           'address' => $address,
           'note' => $note,
           'status' => 0,
           'payment_method' => $payment_method,
           'customer_id' => $customer_id
       ];
       $this->createData($this->table_orders, $data);
        $order_id = $this->pdo->lastInsertId();
        foreach ($_SESSION['cart'] as $item):
            $data_detail = [
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'path_image' => $item['path_image'],
                'amount' => $item['quality'],
                'total' => Session::totalCart($_SESSION['cart']),
            ];
            $this->createData($this->table_detail,$data_detail);
            endforeach;
    }
    public function getListOrder($id): bool|array{
        $fields = [
            'orders.id',
            'orders.phone' ,
            'orders.email',
            'orders.address',
            'orders.note' ,
            'orders.created_at',
            'orders.status' ,
            'orders.payment_method' ,
            'orders.customer_id' ,
        ];
        $conditions = [
            'customer_id' => $id
        ];
        return $this->readData($this->table_orders,$fields,$conditions);
    }
//    public function getListOrder($id): bool|array
//    {
//        $fields = [
//            'orders.id',
//            'orders.phone' ,
//            'orders.email',
//            'orders.address',
//            'orders.note' ,
//            'orders.created_at',
//            'orders.status' ,
//            'orders.payment_method' ,
//            'orders.customer_id' ,
//        ];
//        $fieldsRelation = [
//            'orders_detail.order_id',
//            'orders_detail.product_id',
//            'orders_detail.name',
//            'orders_detail.price',
//            'orders_detail.path_image',
//            'orders_detail.amount',
//            'orders_detail.total',
//        ];
//        $conditions = [];
//        $conditionsRelation = [];
//        return $this->selectWithRelation($this->table_orders, $fields, $conditions, $this->table_detail, $fieldsRelation, $conditionsRelation, 'orders.id', 'order_id', 5000, "WHERE orders.customer_id=$id");
//    }
}
