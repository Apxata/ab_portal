<?php

class Access
{
    public $access_lvl_required = 10;
    public $connection;
    public $user_id;

    public function __construct($user_id = 0, $access_lvl_required = 10)
    {
        $this->access_lvl_required = (int)$access_lvl_required;
        $this->user_id = (int)$user_id;
        $this->connection = DB::get_connect();
    }

    public function check_access_lvl()
    {
        $user_acc_lvl = $this->get_access_lvl_by_user_id();
        if ($user_acc_lvl >= $this->access_lvl_required) {
            return true;
        } else {
            return false;
        }
    }

    public function get_access_lvl_by_user_id()
    {
        $sth = $this->connection->prepare("SELECT acc_lvl FROM users WHERE id = :user_id");
        $sth->execute([
            'user_id' => $this->user_id
        ]);
        $result = $sth->fetchAll();
        $result = array_shift($result);

        return $result[0];
    }
}