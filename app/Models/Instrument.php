<?php

namespace Lbm\Mvc\Models;


class Instrument
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
     * Get all instruments from database
     */
    public function getAllInstruments()
    {
        $sql = "SELECT id, isin,name,type,value FROM instrument Order BY name";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Add a instrument to database
     */
    public function addInstrument($data)
    {
        $sql = "INSERT INTO instrument ( isin,name,type,value ) VALUES ( :isin, :name, :type, :value )";
        $query = $this->db->prepare($sql);
        $parameters = [
            ':isin' => $data['isin'],
            ':name' => $data['name'],
            ':type' => $data['type'],
            ':value' => $data['value'],
        ];
        $query->execute($parameters);
    }

    /**
     * Delete a instrument in the database
     */
    public function deleteInstrument($instrument_id)
    {
        $sql = "DELETE FROM instrument WHERE id = :instrument_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':instrument_id' => $instrument_id);

        $query->execute($parameters);
    }

    /**
     * Get a instrument from database
     */
    public function getInstrument($instrument_id)
    {
        $sql = "SELECT id, name, isin, type, value FROM instrument WHERE id = :instrument_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':instrument_id' => $instrument_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * Update a instrument in database
     */
    public function updateInstrument($data)
    {
        $sql = "UPDATE instrument SET name=:name, isin=:isin, type=:type, value=:value WHERE id = :instrument_id";
        $query = $this->db->prepare($sql);
        $parameters = [
            ':isin' => $data['isin'],
            ':name' => $data['name'],
            ':type' => $data['type'],
            ':value' => $data['value'],
            ':instrument_id' => $data['instrument_id']
        ];


        $query->execute($parameters);
    }

    public function getAmountOfInstruments()
    {
        $sql = "SELECT COUNT(id) AS amount_of_instruments FROM instrument";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetch()->amount_of_instruments;
    }

}

