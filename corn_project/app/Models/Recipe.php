<?php
class Recipe
{
    public $id_recipe;
    public $name_recipe;
    public $description;
    public $instruction;
    public $image;
    public $preparation_time;
    public $difficulty;
    public $portion;
    public $fk_username;
    public $fk_id_category;

    public function __construct($id_recipe, $name_recipe, $description, $instruction, $image, $fk_id_category, $difficulty, $preparation_time, $portion, $fk_username)
    {
        $this->id_recipe = $id_recipe;
        $this->name_recipe = $name_recipe;
        $this->description = $description;
        $this->instruction = $instruction;
        $this->image = $image;
        $this->fk_id_category = $fk_id_category;
        $this->difficulty = $difficulty;
        $this->preparation_time = $preparation_time;
        $this->portion = $portion;
        $this->fk_username = $fk_username;
    }

}
?>