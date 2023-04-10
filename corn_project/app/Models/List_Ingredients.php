<?php
class List_Ingredients
{
    public $LI_id_ingredient;
    public $LI_id_recipe;
    public $quantity;

    public function __construct($LI_id_ingredient, $LI_id_recipe, $quantity)
    {
        $this->LI_id_ingredient = $LI_id_ingredient;
        $this->LI_id_recipe = $LI_id_recipe;
        $this->quantity = $quantity;
    }
}
?>