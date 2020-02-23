<?php
namespace DATABASE;
use DATABASE\methods;
abstract class Model extends methods {
    public function add(array $info)
    {
        return parent::insert($this::table, $info);
    }
    public function edit(array $info,$keyValue){
        return parent::update($this::table,$this::key,$keyValue,$info);
    }
    public function get($primaryKeyValue){
        return parent::select($this::table,$this::key,$primaryKeyValue);
    }
    public function delete($primaryKeyValue){
        return parent::del($this::table,$this::key,$primaryKeyValue);
    }
    public function getAll(){
        return parent::selectAll($this::table);
    }
    public function getAllConditioned(string $whereClause){
        return parent::selectWithWhere($this::table,$whereClause);
    }
    public function getAllFiltered($filterField,$filterValue){
        return parent::selectFilter($this::table,$filterField,$filterValue);
    }
}