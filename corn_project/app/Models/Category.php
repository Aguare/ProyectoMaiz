<?php
class Category
{
    public $id_category;
    public $name_category;

    public function __construct($id_category, $name_category)
    {
        $this->id_category = $id_category;
        $this->name_category = $name_category;
    }

    public function __toString()
    {
        return "id_category: " . $this->id_category . " name_category: " . $this->name_category;
    }
}
?>