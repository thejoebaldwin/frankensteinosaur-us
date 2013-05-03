<?php
class Page
{
    // property declaration
    public $current_page = -1;
    public $start_page = -1;
    public $end_page = -1;
    public $limit_index = -1;
    public $page_count = 0;
    public $keywords = '';
    public $title = '';
    public $post_per_page = 5;
    public $pages_to_display = 10;
    
    // method declaration
    public function displayTitle() {
        echo $this->Title;
    }
}
?>