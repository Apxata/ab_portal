<?php

class Fame {

    public $fame;
    public $fame_time;
    public $connection;
    public $user_id = 0;

    function __construct($fame){
        if(isset($fame)){
            $this->fame = $fame['fame'];
        }else{
            $this->fame = "";
        }
        if(isset($fame)){
            $this->user_id = $fame['user_id'];
        }else{
            $this->user_id = 0;
        }
        $this->connection = DB::get_connect();
    }

    static public function find_all_by_user_id($user_id){
        $static_connection = DB::get_connect();

        $sth = $static_connection->prepare("SELECT * FROM fame WHERE user_id = :user_id ORDER BY fame_time DESC ");
        $sth->execute([
            'user_id' => $user_id
        ]);
        $result = $sth->fetchAll();
        return $result;
    }

    static public function find_max_id(){
        $static_connection = DB::get_connect();

        $fame = $static_connection->query("SELECT max* FROM fame ORDER BY fame_time DESC ");
        return $fame->fetchAll();
    }

    static public function find_2_last_fame($user_id){
        $static_connection = DB::get_connect();

        $sth = $static_connection->prepare("SELECT * FROM `fame` WHERE user_id = :user_id ORDER BY id DESC LIMIT 2 ");
        $sth->execute([
            'user_id' => $user_id
        ]);
        $result = $sth->fetchAll();
        return $result;
    }

    static public function find_fame_by_id($id){
        $static_connection = DB::get_connect();

        $sth = $static_connection->prepare("
            SELECT * FROM fame WHERE id = :id ORDER BY fame_time DESC 
        ");
        $sth->execute([
            'id' => $id
        ]);
        $result = $sth->fetchAll();

        return array_shift($result);
    }

    public function create() {

        $sth = $this->connection->prepare(
            "INSERT INTO fame (
                fame, user_id
            ) values (
                :fame, :user_id
            )"
        );
        $sth->execute([
            'fame' => $this->fame,
            'user_id' => $this->user_id
        ]);

        $result = $this->fame_count();
        return $result;
        // return !isset($sth->errorInfo()[2]) ?  true : $sth->errorInfo()[2];
    }

    public function fame_count() {
        $user_id = $this -> user_id;
        $last_fames = FAME::find_2_last_fame($user_id);
        $time_spent = strtotime ($last_fames[0]['fame_time']) - strtotime($last_fames[1]['fame_time']);
        $fame_get = ($last_fames[0]['fame']) - ($last_fames[1]['fame']);
        $fame_per_hour = $fame_get / ($time_spent / 60 / 60);

        $sth = $this->connection->prepare(
            "UPDATE fame SET 
             timespent = :timespent,
             fame_get = :fame_get,
             fame_per_hour = :fame_per_hour
             WHERE id = :id
             LIMIT 1 "
        );
        $sth->execute([
            'timespent' => $time_spent,
            'fame_get' => $fame_get,
            'fame_per_hour' => $fame_per_hour,
            'id' => $last_fames[0]['id']
        ]);
    }

}