<?php
namespace model;
use DATABASE\methods;
use DATABASE\relations;
use model\auth\Admins;

class Cities extends methods {
    use relations;
    const table = 'tblCities';
    const key = 'city_id';
    function CitiesWithState(){
        $classes = [
            "state_id" => new States(),
            "lastFKey" => new Cities(),
            "aid" => new Admins(),
        ];
        return $this->sharesWithMany($classes);
    }

    public function cityAndState(){
        return $this->isChildOf(new States());
    }
}