<?php
namespace model;
use DATABASE\methods;
class Icons extends methods
{
    const key = 'icon_id';
    const table = 'tblIcons';

    function AddIcons($info)
    {
        return parent::add($info, self::table);
    }

    function GetIconsById($icon_id)
    {
        return parent::get(self::table, self::key, $icon_id);
    }

    function GetAllIcons()
    {
        return parent::getAll(self::table);
    }

    function EditIcons($icon_id, $info)
    {
        return parent::edit(self::table, self::key, $icon_id, $info);
    }

    function DeleteIcons($icon_id)
    {
        return parent::delete(self::table, self::key, $icon_id);
    }

    function GetPic($icon_id)
    {
        return parent::get(self::table, self::key, $icon_id)->pic;
    }

    function GetId($url)
    {
        return parent::get(self::table, 'pic', $url)->icon_id;
    }
}