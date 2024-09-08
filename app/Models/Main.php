<?php

namespace App\Models;

use Flight;

class Main
{
    protected static function getAll($table)
    {
        $db = Flight::db();
        $stmt = $db->prepare('SELECT * FROM '.$table);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    protected static function getFind($table, $id)
    {
        $db = Flight::db();
        $stmt = $db->prepare('SELECT * FROM '.$table.' where id = :id');
        $stmt->execute([':id' => $id]);

        return $stmt->fetchAll();
    }

    protected static function getWhere($table, $parameter1, $parameter2)
    {
        $db = Flight::db();
        $stmt = $db->prepare('SELECT * FROM '.$table." where `$parameter1` = :val");
        $stmt->execute([':val' => $parameter2]);

        return $stmt->fetchAll();
    }
}
