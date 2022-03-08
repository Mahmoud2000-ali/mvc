<?php

namespace mvc\core;

use mvc\core\Model;

trait TraitModel
{

    // create all function
    // this function use ==> Model::all() 
    // the return is all data from model
    static function all()
    {
        return Model::db()->rows("SELECT * FROM " . Self::render() . " ORDER BY id DESC");
    }

    static public function create(array $data)
    {
        return Model::db()->insert(Self::render(), $data);
    }

    static public function updated(array $data, $id)
    {
        return Model::db()->update(Self::render(), $data, ['id' => $id]);
    } //-- end of function

    static public function find($id)
    {
        return Model::db()->getById(Self::render(), $id);
    } //-- end find method

    static public function destroy($id)
    {
        return Model::db()->deleteById(Self::render(), $id);
    }
}// end class TraitModel