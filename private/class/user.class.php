<?php 

class User  {

    public $errors = [];

    public $id;
    public $email;
    protected $hashed_password;
    public $password;
    public $confirm_password;
    public $reg_date;
    public $first_name;
    public $last_name;
    public $deleted;
    protected $password_required = true;
    public $connection;

    public function __construct($args=[]) {

        if (isset($args['email'])) {
            $this->email = $args['email'];
        } else {
            $this->email = ''; 
        }
        if (isset($args['password'])) {
            $this->password = $args['password'];
        } else {
            $this->password = ''; 
        }
        if (isset($args['confirm_password'])) {
            $this->confirm_password = $args['confirm_password'];
        } else {
            $this->confirm_password = ''; 
        }
        if (isset($args['reg_date'])) {
            $this->reg_date = $args['reg_date'];
        } else {
            $this->reg_date = ''; 
        }
        if (isset($args['first_name'])) {
            $this->first_name = $args['first_name'];
        } else {
            $this->first_name = ''; 
        }
        if (isset($args['last_name'])) {
            $this->last_name = $args['last_name'];
        } else {
            $this->last_name = ''; 
        }
        if (isset($args['deleted'])) {
            $this->deleted = $args['deleted'];
        } else {
            $this->deleted = 0; 
        }
        $this->connection = DB::get_connect();
    }

    protected function validate() {
        $this->errors = [];
        if(!isset($this->id)){
            $this->id = 0;
        }
        if(is_blank($this->email)) {
            $this->errors[] = "Почта не может быть пустой";
        }elseif (!has_length($this->email, array('max' => 255))) {
            $this->errors[] = "Почта не может быть длинее 255 символов";
        }elseif (!has_valid_email_format($this->email)) {
            $this->errors[] = "Почта неверного формата";
        } elseif (!has_unique_email($this->email, $this->id)) {
            $this->errors[] = "Почта уже используется";
        }     
             
        
        if($this->password_required){

            if(is_blank($this->password)) {
                $this->errors[] = "пароль не может быть пустым";
            } elseif (!has_length($this->password, array('min' => 8))) {
                $this->errors[] = "Пароль может быть минимум 8 символов";
            } elseif (!preg_match('/[A-ZА-Я]/', $this->password)) {
                $this->errors[] = "Пароль должен содержать минимум 1 заглавный символ";
            } elseif (!preg_match('/[a-zа-я]/', $this->password)) {
                $this->errors[] = "Пароль должен содержать минимум 1 прописной символ";
            } elseif (!preg_match('/[0-9]/', $this->password)) {
                $this->errors[] = "Пароль должен содержать минимум 1 цифру";
            //   } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
            //     $this->errors[] = "Пароль должен содержать минимум 1 спец символ";
            } elseif (!preg_match('/^[A-Z0-9]+$/i', $this->password)) {
                $this->errors[] = "Пароль может содержать только латинские буквы и цфры";
            }

            if(is_blank($this->confirm_password)) {
                $this->errors[] = "Введите свой пароль повторно";
            }elseif($this->password !== $this->confirm_password) {
                $this->errors[] = "Пароли не совпадают";
            }
        }
        return $this->errors;
    }

    static public function find_user_by_email($email){
        $static_connection = DB::get_connect();
        
        $sth = $static_connection->prepare(
            "SELECT * FROM users WHERE email = :email "
        );
        $sth->execute(['email' => $email]);
        $article = $sth->fetchAll();
        return array_shift($article);
    }

    // static public function find_email_by_user_id($user_id){
    //     $static_connection = DB::get_connect();
        
    //     $sth = $static_connection->prepare(
    //         "SELECT email FROM users WHERE email = :email "
    //     );
    //     $sth->execute(['email' => $email]);
    //     $article = $sth->fetchAll();
    //     return array_shift($article);
    // }

    static public function find_user_by_email_not_deleted($email){
        $static_connection = DB::get_connect();
        
        $sth = $static_connection->prepare(
            "SELECT * FROM users WHERE email = :email and deleted = 0"
        );
        $sth->execute(['email' => $email]);
        $article = $sth->fetchAll();
        return array_shift($article);
    }

    static public function find_user_by_id($id){
        $static_connection = DB::get_connect();
        
        $sth = $static_connection->prepare(
            "SELECT * FROM users WHERE id = :id "
        );
        $sth->execute(['id' => $id]);
        $article = $sth->fetchAll();
        return array_shift($article);
    }

    protected function set_hashed_password() {
        $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function verify_pas($password){
        return password_verify($password, $this->$hashed_password);
    }

    public static function find_all_users() {
            $static_connection = DB::get_connect();
    
            $users = $static_connection->query("SELECT * FROM users ORDER BY email ASC ");
            return $users->fetchAll();
    }

    public function update($id){
        $this->id = (int) $id;
        if($this->password != '' ) {
            //меняем пароль и делаем всю проверку
          
            $this->set_hashed_password();
            $this->validate();
            if(!empty($this->errors)) {return false;}

            $sth = $this->connection->prepare(
                "UPDATE users SET  
                email = :email, 
                hashed_password = :hashed_password, 
                deleted = :deleted 
                WHERE id = :id
                LIMIT 1 "
            );

            $result = $sth->execute([
                'email' => $this->email,
                'hashed_password' => $this->hashed_password,
                'deleted' => $this->deleted,
                'id' => $this->id
            ]);
            
            $this->id = $this->connection->lastInsertId();

        }else{
            // пропустить хеширование и проверку пароля
            $this->password_required = false;

            $this->validate();
            if(!empty($this->errors)) {return false;}

            $sth = $this->connection->prepare(
                "UPDATE users SET  
                email = :email,  
                deleted = :deleted 
                WHERE id = :id
                LIMIT 1 "
            );

            $result = $sth->execute([
                'email' => $this->email,
                'deleted' => $this->deleted,
                'id' => $this->id
            ]);
            
            $this->id = $this->connection->lastInsertId();
        }
        return !isset($sth->errorInfo()[2]) ?  true : $sth->errorInfo()[2];
    }

    public function create()  { 
        // Валидация на ввод верных данных
        $this->validate();
        if(!empty($this->errors)) {return false;}

        $this->set_hashed_password();
       
        $sth = $this->connection->prepare(
            "INSERT INTO users (
                email,
                hashed_password,
                first_name,
                last_name,
                deleted
            ) values (
                :email,
                :hashed_password,
                :first_name,
                :last_name,
                :deleted
            )"
        );

        $result = $sth->execute([
            'email' => $this->email,
            'hashed_password' => $this->hashed_password,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'deleted' => $this->deleted
        ]);
        
        $this->id = $this->connection->lastInsertId();
        return !isset($sth->errorInfo()[2]) ?  true : $sth->errorInfo()[2];
    }

    public function merge_attributes($args=[]){
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
        
}

?>