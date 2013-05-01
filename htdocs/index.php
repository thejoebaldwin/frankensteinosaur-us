<?php

require_once('lib/Twig/Autoloader.php');
require_once('class.database.php');
require_once('class.post.php');
include_once "markdown.php";

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('views');

$twig = new Twig_Environment($loader, array(
  'cache' => 'cache',
));


  $sql = "SELECT * FROM post;";
  $db = new Database();
  $result  = $db->Query($sql);
   
  $count = 0;
  
    $posts = array();



  
    foreach($result as $row)
    {
        $post = new Post();
        $post->title = $row['title'];
        $post->path = $row['path'];
        $text = file_get_contents('./post/' .  $post->path . '.markdown', true);

        $html =  Markdown($text);
          $post->contents = $html;
          
          array_push($posts, $post);
   
        $count++;
    }

 
    
echo $twig->render('main/index.html.twig', array('name' => '', 'title' => 'Startpage', 'posts'=>$posts));

?>