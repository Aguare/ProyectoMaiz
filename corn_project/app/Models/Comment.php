<?php
class Comment
{
    public $id_comment;
    public $C_username;
    public $C_id_recipe;
    public $comment;
    public $date;

    public function __construct($id_comment, $C_username, $C_id_recipe, $comment, $date)
    {
        $this->id_comment = $id_comment;
        $this->C_username = $C_username;
        $this->C_id_recipe = $C_id_recipe;
        $this->comment = $comment;
        $this->date = $date;
    }
}
?>