<?php

class UserTable
{
    
    protected $table = 'users';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM {$this->table}");
        return $sth->fetchAll();
    }

    public function name(): array
    {
        $sth = $this->db->query("SELECT user_namee FROM {$this->table}");
        return $sth->fetchAll();
    }

    public function user_exist(user $user)
    {
        $sth = $this->db->prepare("SELECT EXISTS(SELECT * FROM {$this->table} WHERE user_namee = ? AND user_mdp = ?) ");
        $name=$user->getName();
        $password=$user->getPassword();
        $result = $sth->execute(array($name,$password));
        $res = $sth->fetch();
        return $res[0];
    }

    public function create_user(user $user): void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->table} (user_namee, user_mdp) VALUES (:user_namee, :user_mdp)");
        $name=$user->getName();
        $password=$user->getPassword();
        $sth->bindParam(':user_namee', $name);
        $sth->bindParam(':user_mdp', $password);
        $result = $sth->execute();

        if (!$result) {
            throw new Exception("Error during creation of the table {$this->table}");
        }
    }

}
