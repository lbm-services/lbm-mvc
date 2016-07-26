<?php

namespace Lbm\Mvc\Models;

class User
{

    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * 
     * @return ResultObject
     */
    public function getAllUser()
    {
        $sql = "SELECT user.id, user.firstname, user.lastname, user.login, user.email, user.pass, role.role FROM user "
                . " LEFT JOIN role ON role.id = user.fk_role_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * 
     * @param type $login
     * @return type
     */
    public function getUserbyLogin($login)
    {
        $sql = "SELECT user.id, user.firstname, user.lastname, user.login, user.pass,user.fk_role_id, role.role FROM user "
                . " LEFT JOIN role ON role.id = user.fk_role_id"
                . " WHERE user.login =:login"
                . " LIMIT 1";

        $query = $this->db->prepare($sql);
        $parameters = [
            ':login' => $login,
        ];

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * 
     * @param type $data
     */
    public function addUser($data)
    {
        $sql = "INSERT INTO user ( firstname, lastname, login, email, pass, fk_role_id ) VALUES "
                . "( :firstname, :lastname, :login, :email, :password, :fk_role_id)";
        $query = $this->db->prepare($sql);
        $parameters = [

            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':login' => $data['login'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':fk_role_id' => $data['fk_role_id']
        ];

        $query->execute($parameters);

        $userId = $this->db->lastInsertId();
        $this->addDepot($userId);
        
    }

    public function addDepot($userId)
    {
        $sql = "INSERT INTO user_depot(fk_user_id) VALUES ( :userId )";
        $query = $this->db->prepare($sql);
        $parameters = [
            ':userId' => $userId
        ];
        $query->execute($parameters);
    }

    /**
     * Delete a user in the database
     * @param int $user_id Id of user
     */
    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM user WHERE id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);

        $query->execute($parameters);
    }

    /**
     * Get a user from database
     */
    public function getUser($user_id)
    {
        $sql = "SELECT id, firstname, lastname, login, email, pass, fk_role_id FROM user WHERE id = :user_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * Action updateUser
     * @param type $data
     */
    public function updateUser($data)
    {
        $sql = "UPDATE user SET firstname =:firstname, lastname=:lastname, email=:email, login=:login , fk_role_id=:fk_role_id WHERE id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = [
            ':user_id' => $data['id'],
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':login' => $data['login'],
            ':email' => $data['email'],
            ':fk_role_id' => $data['fk_role_id']
        ];

        $query->execute($parameters);
    }

    public function getAmountOfUser()
    {
        $sql = "SELECT COUNT(id) AS amount_of_user FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_user;
    }

}
