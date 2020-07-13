<?php

namespace AHT\Core;

use AHT\Core\ResourceModelInterface;
use AHT\Config\Database;

class ResourceModel implements ResourceModelInterface
{
    /**
     * Name of the table which is passed from subclass
     *
     * @var string
     */
    public $table;
    
    /**
     * Primary key of the table in database
     *
     * @var int
     */
    private $id;

    /**
     * Object contains values which is passed from subclass
     *
     * @var object
     */
    private $model;

    public function _init($table, $id, $model) {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }
    
    /**
     * Save values to table in database
     *
     * @param object $model 
     * @return boolean Return true if save successfull false if save false
     */
    public function save($model)
    {
        $str_key = '';
        $str_value = '';
        foreach ($model as $key => $value) {
            $str_key .= $key . ',';
            if($value != null) {
                $str_value .= "'$value'" . ',';
            } else {
                $str_value .= 'null,';
            }
            
        }

        $str_value = rtrim($str_value, ',');
        $str_key = rtrim($str_key, ',');

        $sql = "INSERT INTO $this->table($str_key) VALUES($str_value)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }

    /**
     * Delete data in database by primary key
     *
     * @param object $model
     * @return boolean Return true if delete successfull false if delete false
     */
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->id = '$id'";
        $rep = Database::getBdd()->prepare($sql);
        return $rep->execute();
    }

    /**
     * Get data form database by primary key
     *
     * @param int $id
     * @return array Return array contains data of table in database
     */
    public function get($id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    /**
     * Get all data of table in database 
     *
     * @return array Return array contains all data of current table
     */
    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function edit($id, $model)
    {
        $str_set = "";
        foreach ($model as $key => $value) {           
            if($key != 'id') {
                if ($value != null) {
                    $str_set .= $key . '=' . "'$value'" . ',';
                } else {
                    $str_set .= $key . '= null,';
                }
            }
        }
        $str_set = rtrim($str_set, ',');
        $sql = "UPDATE $this->table SET $str_set WHERE $this->id = '$id'";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }
}