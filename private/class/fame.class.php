<?php

class Fame
{
    public $fame;
    public $fame_time;
    public $connection;
    public $user_id = 0;

    function __construct($fame)
    {
        if (isset($fame['fame'])) {
            $this->fame = $fame['fame'];
        } else {
            $this->fame = "";
        }
        if (isset($fame['user_id'])) {
            $this->user_id = $fame['user_id'];
        } else {
            $this->user_id = 0;
        }
        $this->connection = DB::get_connect();
    }

    static public function find_all_by_user_id($user_id)
    {
        $static_connection = DB::get_connect();

        $sth = $static_connection->prepare("SELECT * FROM fame WHERE user_id = :user_id ORDER BY fame_time DESC ");
        $sth->execute([
            'user_id' => $user_id
        ]);
        $result = $sth->fetchAll();
        return $result;
    }

    static public function find_max_id()
    {
        $static_connection = DB::get_connect();

        $fame = $static_connection->query("SELECT max* FROM fame ORDER BY fame_time DESC ");
        return $fame->fetchAll();
    }

    public function find_all_fame_by_round($round)
    {
        $sth = $this->connection->prepare("
            SELECT * FROM fame WHERE round = :round and user_id = :user_id  
        ");
        $sth->execute([
            'round' => $round,
            'user_id' => $this->user_id

        ]);
        $result = $sth->fetchAll();

        return ($result);
    }

    public function get_all_rounds_fame_by_user_id()
    {
        $user_id = $this->user_id;
        $sth = $this->connection->prepare("SELECT * FROM fame_round WHERE user_id = :user_id ORDER BY id DESC ");
        $sth->execute([
            'user_id' => $user_id
        ]);
        $result = $sth->fetchAll();
        return $result;
    }

    public function create_fame_round()
    {
        $fame = Fame::find_all_by_last_fame_round($this->user_id);
        $first_row = array_shift($fame);
        $last_row = array_pop($fame);
        $time_spent = strtotime($last_row['fame_time']) - strtotime($first_row['fame_time']);
        $fame_get = ($last_row['fame']) - ($first_row['fame']);
        $fame_per_hour = $fame_get / ($time_spent / 60 / 60);

        $sth = $this->connection->prepare(
            "INSERT INTO fame_round (
                user_id, round, fame_per_hour, fame_per_round, total_timespent
            ) values (
                :user_id, :round, :fame_per_hour , :fame_per_round, :total_timespent
            )"
        );
        $sth->execute([
            'user_id' => $this->user_id,
            'round' => $this->current_round(),
            'fame_per_hour' => $fame_per_hour,
            'fame_per_round' => $fame_get,
            'total_timespent' => $time_spent
        ]);

        return !isset($sth->errorInfo()[2]) ? true : $sth->errorInfo()[2];
    }

    static public function find_all_by_last_fame_round($user_id)
    {
        $static_connection = DB::get_connect();

        $sth = $static_connection->prepare("SELECT * FROM fame WHERE round = (SELECT MAX(round) from fame where user_id = :user_id) AND user_id = :user_id ");
        $sth->execute([
            'user_id' => $user_id
        ]);
        $result = $sth->fetchAll();
        return $result;
    }

    public function current_round()
    {
        $user_id = $this->user_id;
        $sth = $this->connection->prepare("SELECT max(round) as round FROM fame_round_counter WHERE user_id = :user_id ");
        $sth->execute([
            'user_id' => $user_id
        ]);
        $result = ($sth->fetchAll());
        $result = array_shift($result);
        if (empty($result[0])) {
            $result[0] = 1;
        }
        return $result[0];
    }

    public function find_all_by_last_fame_round_counter()
    {
        $round = $this->current_round();
        $sth = $this->connection->prepare("SELECT * FROM fame WHERE round = :round AND user_id = :user_id ");
        $sth->execute([
            'user_id' => $this->user_id,
            'round' => $round
        ]);
        $result = $sth->fetchAll();
        return $result;
    }

    public function create()
    {
        $current_round = $this->current_round();

        $sth = $this->connection->prepare(
            "INSERT INTO fame (
                fame, user_id, round
            ) values (
                :fame, :user_id , :round
            )"
        );
        $sth->execute([
            'fame' => $this->fame,
            'user_id' => $this->user_id,
            'round' => $current_round
        ]);
        $count_rows = $this->count_rows_of_last_round_fame();

        if ($count_rows > 1) {
            $result = $this->fame_count();
            return $result;
        } else {

        }

        // return !isset($sth->errorInfo()[2]) ?  true : $sth->errorInfo()[2];
    }

    public function count_rows_of_last_round_fame()
    {
        $user_id = $this->user_id;
        $round = $this->current_round();
        $sth = $this->connection->prepare("SELECT count(*) FROM fame WHERE user_id = :user_id and round = :round ");
        $sth->execute([
            'user_id' => $user_id,
            'round' => $round
        ]);
        $result = ($sth->fetchAll());
        $result = array_shift($result);
        return $result[0];
    }

    public function fame_count()
    {
        $user_id = $this->user_id;
        $last_fames = FAME::find_2_last_fame($user_id);
        $time_spent = strtotime($last_fames[0]['fame_time']) - strtotime($last_fames[1]['fame_time']);
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

        return !isset($sth->errorInfo()[2]) ? true : $sth->errorInfo()[2];
    }

    static public function find_2_last_fame($user_id)
    {
        $static_connection = DB::get_connect();

        $sth = $static_connection->prepare("SELECT * FROM `fame` WHERE user_id = :user_id ORDER BY id DESC LIMIT 2 ");
        $sth->execute([
            'user_id' => $user_id
        ]);
        $result = $sth->fetchAll();
        return $result;
    }

    public function create_new_round()
    {
        $current_round = $this->current_round();
        $next_round = $current_round + 1;
        $sth = $this->connection->prepare(
            "INSERT INTO fame_round_counter (
                user_id, round
            ) values (
                :user_id , :round
            )"
        );
        $sth->execute([
            'user_id' => $this->user_id,
            'round' => $next_round
        ]);

        return !isset($sth->errorInfo()[2]) ? true : $sth->errorInfo()[2];

    }

    public function delete_fame_row($id)
    {
        $record = FAME::find_fame_by_id($id);
        if ($record['user_id'] == $this->user_id) {
            $sth = $this->connection->prepare("DELETE FROM fame WHERE id = :id LIMIT 1 ");
            $sth->execute([
                'id' => $id
            ]);
            return !isset($sth->errorInfo()[2]) ? true : $sth->errorInfo()[2];
        } else {
            return false;
        }
    }

    static public function find_fame_by_id($id)
    {
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

    public static function fame_rating()
    {
        $static_connection = DB::get_connect();
        $sth = $static_connection->prepare(" 
              SELECT fame_round.id, user_id, round, fame_per_hour, fame_per_round, total_timespent, date, nickname 
              FROM fame_round JOIN users ON (fame_round.user_id = users.id) ORDER BY fame_per_round DESC LIMIT 20
        ");
        $sth->execute();

        $result = $sth->fetchAll();

        return $result;
    }

}