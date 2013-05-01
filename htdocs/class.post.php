<?php
class Post
{
    // property declaration
    public $created = '';

    public $id = '';

    public $title = '';

    public $tags = '';
    
    public $keywords = '';
    
    public $contents = '';
    
    // method declaration
    public function displayTitle() {
        echo $this->Title;
    }
}
?>