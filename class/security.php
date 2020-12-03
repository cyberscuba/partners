<?php

require_once "../config/bd_config.php";


class Muestra extends mysql
{
    public function __construct()
    {
        parent::__construct();
    }


    public function get_users7($username, $passo)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE username = '$username' AND user_psw = '$passo'");

        $conaut= $result->num_rows;

        return $conaut;
    }

    public function get_users7blok($username, $passo)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE username = '$username'  AND user_psw = '$passo' AND blkock = '1'");

        $conaut= $result->num_rows;

        return $conaut;
    }


    public function get_users7a($usuario)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE  username = '$usuario'");

        $conaut= $result->num_rows;

        return $conaut;
    }



    public function get_usersa($usuario)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE  username = '$usuario'");
        $users10 = $result;
        return $users10;
    }


    public function get_usersag($passo)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE ID = '1' AND user_psw = '$passo'");
        $users10 = $result;
        return $users10;
    }

    public function contamos($email)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE   user_login = '$email'");

        $conaut= $result->num_rows;

        return $conaut;
    }

    public function actua_cont($email, $keys)
    {
        $result = $this->_db->query("UPDATE security_users SET user_psw='$keys' , blkock = '0' WHERE user_login='$email'");
    }

    public function get_username($email){

        $result = $this->_db->query("SELECT username FROM security_users WHERE user_login = '$email' ");
        $username = $result->fetch_row();
        return $username['0'];


    }
}
