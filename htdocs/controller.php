<?php

require_once('lib/Twig/Autoloader.php');
require_once('class.database.php');
require_once('class.post.php');
include_once "markdown.php";

Twig_Autoloader::register();





  function postAction($twig, $words)
  {
    $text = file_get_contents('./post/' . $words[count($words) - 1] . '.markdown', true);
    $html =  Markdown($text);
    echo $twig->render('main/content.html.twig', array('name' => '', 'title' => 'Startpage', 'html' => $html));
  }
  
  function homeAction($twig)
  {
    $sql = "SELECT * FROM post WHERE published = 1 ORDER BY created DESC LIMIT 5;";
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
  }
  
    function tagAction($twig, $words)
    {
    $sql = "SELECT * FROM post WHERE published = 1 ORDER BY created DESC LIMIT 5;";
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
  }

  function goController()
  {
    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader, array(
              'cache' => 'cache',
        ));
    $words = explode('/', $_SERVER['REQUEST_URI']);
    $words_count = count($words);
    //echo("Words Count:" . $words_count);
    
    if ($words[count($words) - 2] == 'post') {
          postAction($twig,$words);
     }
     elseif ($words[count($words) - 2] == 'tag') {
          tagAction($twig,$words);
     }
     else {
          homeAction($twig);
     }
  }
  
  
  
  
  
  goController();



?>