<?php

namespace DATABASE;

use Error;
use helpers\numToWord;

trait relations
{
    /**
     * @param $childClass
     * @param bool $foreignKeyValue
     * @param bool $foreignKey
     * @return array
     */
    protected function hasChildrenIn($childClass, $foreignKeyValue = false, $foreignKey = false)
    {
        global $conn;
        $childTableName = $childClass::table;
        $parentTableName = $this::table;
        $parentKeyName = $this::key;
        $theKeyThatTheyWillJoinWith = $foreignKey ? $foreignKey : $childClass::key;
        $query = "SELECT * FROM `$childTableName` as child left join `$parentTableName` as parent on child.$theKeyThatTheyWillJoinWith = parent.$parentKeyName";
        if ($foreignKeyValue) {
            $query .= " where child.$foreignKey = '$foreignKeyValue'";
        }
        $res = $conn->query($query);
        $output = array();
        while ($row = $res->fetchObject()) {
            array_push($output, $row);
        }
        return $output;
    }

    /**
     * @param $parentClass
     * @param bool $foreignKey
     * @param bool $foreignKeyValue
     * @return array
     */
    protected function isChildOf($parentClass, $foreignKeyValue = false, $foreignKey = false)
    {
        global $conn;
        $childTableName = $this::table;
        $parentTableName = $parentClass::table;
        $parentKeyName = $parentClass::key;
        $theKeyThatTheyWillJoinWith = $foreignKey ? $foreignKey : $parentClass::key;
        $query = "SELECT * FROM `$childTableName` as child left join `$parentTableName` as parent on child.$theKeyThatTheyWillJoinWith = parent.$parentKeyName";
        if ($foreignKeyValue) {
            $query .= " where child.$foreignKey = '$foreignKeyValue'";
        }
        $res = $conn->query($query);
        while ($row = $res->fetchObject()) {
            yield $row;
        }
    }

    /**
     * @param $siblingClass
     * @param $commonKeyForCurrentClass
     * @param $commonKeyForOther
     * @param bool $joinKeyValue
     * @return array
     */
    protected function sharesWith($siblingClass, $commonKeyForCurrentClass, $commonKeyForOther, $joinKeyValue = false)
    {
        global $conn;
        $firstTable = $this::table ? $this::table : '';
        if ($firstTable == '') {
            throw new Error('the current class doesn\'t have the table constant');
        }
        $secTable = $siblingClass::table ? $siblingClass::table : '';
        if ($secTable == '') {
            throw new Error('the sibling class doesn\'t have the table constant');
        }
        $query = "SELECT * FROM `$firstTable` as one left join `$secTable` as sec on one.$joinKeyForCurrentClass = sec.$joinKeyForOther";
        if ($joinKeyValue) {
            $query .= " where one.$joinKeyForCurrentClass = '$joinKeyValue'";
        }
        $res = $conn->query($query);
        $output = array();
        while ($row = $res->fetchObject()) {
            array_push($output, $row);
        }
        return $output;
    }

    /**
     * @param $firstSiblingClass
     * @param $commonKeyForCurrentClass
     * @param $secondSiblingClass
     * @param $commonKeyForSecond
     * @param $commonKeyForThird
     * @param bool $joinKeyValue
     * @return array
     */
    protected function sharesWithTwoClasses($firstSiblingClass, $commonKeyForCurrentClass, $secondSiblingClass, $commonKeyForSecond, $commonKeyForThird, $joinKeyValue = false)
    {
        global $conn;
        $firstTable = $this::table ? $this::table : '';
        if ($firstTable == '') {
            throw new Error('the current class doesn\'t have the table constant');
        }
        $secTable = $firstSiblingClass::table ? $firstSiblingClass::table : '';
        if ($secTable == '') {
            throw new Error('the first sibling class doesn\'t have the table constant');
        }
        $thirdTable = $secondSiblingClass::table ? $secondSiblingClass::table : '';
        if ($thirdTable == '') {
            throw new Error('the second sibling class doesn\'t have the table constant');
        }
        $query = "SELECT * FROM `$firstTable` as one left join `$secTable` as sec on one.$commonKeyForCurrentClass = sec.$commonKeyForSecond left join $thirdTable as third on sec.$commonKeyForSecond = third.$commonKeyForThird";
        if ($joinKeyValue) {
            $query .= " where one.$commonKeyForCurrentClass = '$joinKeyValue'";
        }
        $res = $conn->query($query);
        $output = array();
        while ($row = $res->fetchObject()) {
            array_push($output, $row);
        }
        return $output;
    }

    /**
     * @param array $arrayOfClasses
     * @return array
     */
    protected function sharesWithMany(array $arrayOfClasses)
    {
        global $conn;
        include __SOURCE__ . 'helpers' . DIRECTORY_SEPARATOR . 'numToWord.php';
        $query = 'SELECT * FROM ';
        $i = 0;
        $lastFKey = '';
        $query = '';
        foreach ($arrayOfClasses as $foreignKey => $instance) {
            $i++;
            $table = $instance::table;
            if ($i == 1) {
                $query .= "select * from $table as one left join ";
            } else {
                if (is_odd($i)) {
                    $query .= "$table as " . numToWord::convert($i) . " on " . numToWord::convert($i - 1) . ".$lastFKey  = " . numToWord::convert($i) . "." . ($foreignKey != 'lastFKey' ? $foreignKey : $lastFKey) . " ";
                } else {
                    $query .= "left join $table as " . numToWord::convert($i) . " on " . numToWord::convert($i - 1) . ".$lastFKey  = " . numToWord::convert($i) . "." . ($foreignKey != 'lastFKey' ? $foreignKey : $lastFKey) . " ";
                }
            }
            $lastFKey = $foreignKey != 'lastFKey' ? $foreignKey : $lastFKey;
        }
        $res = $conn->query($query);
        $output = array();
        while ($row = $res->fetchObject()) {
            array_push($output, $row);
        }
        return $output;
    }
}