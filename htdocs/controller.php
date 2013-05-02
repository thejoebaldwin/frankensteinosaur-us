<?php

require_once('lib/Twig/Autoloader.php');
require_once('class.database.php');
require_once('class.post.php');
include_once "markdown.php";

Twig_Autoloader::register();

  function postAction($twig, $words)
  {
    $path = $words[count($words) - 1];
    $text = file_get_contents('./post/' . $path . '.markdown', true);
    $html =  Markdown($text);
    
    
    $sql = "SELECT * FROM post WHERE path = '" . $path . "';";
    $db = new Database();
    $result  = $db->Query($sql);
    $post = new Post();
    foreach($result as $row)
    {
        $post->title = $row['title'];
        $post->path = $row['path'];
        $post->tags = $row['tags'];
        $text = file_get_contents('./post/' .  $post->path . '.markdown', true);
        $html =  Markdown($text);
        $post->contents = $html;
    }
    echo $twig->render('main/content.html.twig', array('name' => '', 'title' => 'Startpage', 'html' => $html, 'post' => $post, 'tags' => getTags()));
  }
  
  function getTags()
  {
    $tags = array("3d","blog meta","vector graphics","design","vb.net");
    return $tags;
  }
  
  function homeAction($twig, $index)
  {
    $post_per_page = 5;
    $start_index = $post_per_page * intval($index);
    $end_index = $start_index + $post_per_page;
    $sql = "SELECT * FROM post WHERE published = 1 ORDER BY created DESC LIMIT " . $start_index . "," . $end_index . ";";
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
    echo $twig->render('main/index.html.twig', array('name' => '', 'title' => 'Startpage', 'posts'=>$posts, 'tags' => getTags()));
  }
  
  function tagAction($twig, $words, $index)
  {
    $post_per_page = 5;
    $start_index = $post_per_page * intval($index);
    $end_index = $start_index + $post_per_page;
    $tag = '';
    if(intval($index) > 0)
    {
        $tag = $words[count($words) - 2];
    }
    else
    {
        $tag = $words[count($words) - 1];
    }
    $tag = str_replace('%20', ' ', $tag);
    $sql = "SELECT * FROM post WHERE published = 1 AND tags like '%" . $tag . "%' ORDER BY created DESC LIMIT " . $start_index . "," . $end_index . ";";
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
    echo $twig->render('main/index.html.twig', array('name' => '', 'title' => 'Startpage', 'posts'=>$posts, 'tags' => getTags()));
  }

  function goController()
  {
    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader, array(
              'cache' => 'cache',
        ));
    $words = explode('/', $_SERVER['REQUEST_URI']);
    $words_count = count($words);
    $words_last = $words[count($words) - 1];
    //if last "word" is numeric, then we're paging
    if (is_numeric($words_last) == 1) {
        //echo("words last:" . intval($words_last) . "<br/>");
        if ($words[count($words) - 3] == 'tag') {
          tagAction($twig,$words, $words_last);
        }
        else {
          homeAction($twig, $words_last);
        }
    }
    //else assume a page index of 0
    else
    {
        if ($words[count($words) - 2] == 'post') {
          postAction($twig,$words);
        }
        elseif ($words[count($words) - 2] == 'tag') {
          tagAction($twig,$words, 0);
        }
        else {
          homeAction($twig, 0);
        }
    }
  }
  
  
  
  
  
  goController();



?>