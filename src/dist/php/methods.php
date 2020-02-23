<?php
namespace DATABASE;
abstract class methods
{
    protected static function insert($table,$info)
    {
        global $conn;
        $fields = "";
        $values = "";
        foreach ($info as $key => $value) {
            $fields .= " $key,";
            $values .= "'$value',";
        }
        $fields = substr($fields, 0, strlen($fields) - 1);
        $values = substr($values, 0, strlen($values) - 1);
        return $conn->query("INSERT INTO `$table` (" . $fields . ") VALUES (" . $values . ")");
    }

    protected static function select($table,$key,$keyValue)
    {
        global $conn;
        return $conn->query("SELECT * FROM `$table` WHERE `$key` = '$keyValue'")->fetchObject();
    }

    protected static function selectAll($table)
    {
        global $conn;
        $result = $conn->query("SELECT * FROM `$table`");
        while ($row = $result->fetchObject()) {
            yield $row;
        }
    }

    protected static function selectFilter($table,$key, $keyValue)
    {
        global $conn;
        $result = $conn->query("SELECT * FROM `$table` where `$key` = '$keyValue'");
        while ($row = $result->fetchObject()) {
            yield $row;
        }
    }

    protected static function selectWithWhere($table,$whereClause)
    {
        global $conn;
        $result = $conn->query("SELECT * FROM `$table` where $whereClause");
        while ($row = $result->fetchObject()) {
            yield $row;
        }
    }

    protected static function update($table,$key, $keyValue, $info)
    {
        global $conn;
        $fields = "";
        foreach ($info as $field => $value) {
            $fields .= " `$field` = '$value' ,";
        }
        $fields = substr($fields, 0, strlen($fields) - 1);
        return $conn->query("UPDATE `$table` SET $fields WHERE `$key` = '$keyValue'");
    }

    protected static function del($table,$key, $keyValue)
    {
        global $conn;
        return $conn->query("DELETE FROM `$table` WHERE `$key` = '$keyValue'");
    }
}