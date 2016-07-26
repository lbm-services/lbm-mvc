<?php

namespace Lbm\Mvc\Models;

class Depot
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

    public function getDepotId($userId)
    {
        $sql = "SELECT id FROM user_depot WHERE fk_user_id = :userId LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':userId' => $userId);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function getAllInstruments($depotId)
    {
        $sql = "SELECT id, anzahl, name, isin, type, value, fk_Instrument_id, user_depot_id FROM v_user_depot_position"
                . " WHERE user_depot_id = :depotId";
        $query = $this->db->prepare($sql);
        $parameters = array(':depotId' => $depotId);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function addtoDepot($data)
    {
        $sql = "INSERT INTO user_depot_position ( count, fk_user_depot_id, fk_Instrument_id ) VALUES ( :amount, :user_depot_id, :instrument_id )";
        $query = $this->db->prepare($sql);
        $parameters = array(':amount' => $data['amount'], ':user_depot_id' => $data['depot_id'], ':instrument_id' => $data['instrument_id'] );

        $query->execute($parameters);
    }
    
        /**
     * Get a instrument from database
     */
    public function getInstrument($instrument_id)
    {
        $sql = "SELECT id, anzahl, name, isin, type, value, fk_Instrument_id, user_depot_id FROM v_user_depot_position "
                . "WHERE fk_Instrument_id = :instrument_id AND user_depot_id = 0 "
                . "LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':instrument_id' => $instrument_id);

        $query->execute($parameters);

        return $query->fetch();
    }


    public function deleteInstrument($instrument_id, $user_depot_id)
    {
        $sql = "DELETE FROM user_depot_position WHERE fk_instrument_id = :instrument_id  AND fk_user_depot_id = :user_depot_id" ;
        $query = $this->db->prepare($sql);
        $parameters = array(':instrument_id' => $instrument_id, ':user_depot_id' => $user_depot_id);


        $query->execute($parameters);
    }

    
    public function updateInstrument($data)
    {
        $sql = "UPDATE user_depot_position SET count = :amount  WHERE fk_instrument_id = :instrument_id AND fk_user_depot_id = :user_depot_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':amount' => $data['amount'], ':user_depot_id' => $data['depot_id'], ':instrument_id' => $data['instrument_id'] );

        $query->execute($parameters);
    }
    
    
    public function getAmountOfInstruments()
    {
        $sql = "SELECT COUNT(id) AS amount_of_instruments FROM instrument";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_instruments;
    }
}
