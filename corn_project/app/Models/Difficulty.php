<?php
class Difficulty
{
    public $id_difficulty;
    public $name_difficulty;

    public function __construct($id_difficulty, $name_difficulty)
    {
        $this->id_difficulty = $id_difficulty;
        $this->name_difficulty = $name_difficulty;
    }
}

?>