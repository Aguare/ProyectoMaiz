<?php
class Ingredient
{
    public $id_ingredient;
    public $name_ingredient;

    public function __construct($id_ingredient, $name_ingredient)
    {
        $this->id_ingredient = $id_ingredient;
        $this->name_ingredient = $name_ingredient;
    }
}
?>