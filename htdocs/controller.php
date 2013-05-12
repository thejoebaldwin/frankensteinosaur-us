<?php
  require_once('lib/Twig/Autoloader.php');
  require_once('class.database.php');
  require_once('class.post.php');
  require_once('class.page.php');
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
        $post->tags =  explode( ',' , $row['tags']);
        $text = file_get_contents('./post/' .  $post->path . '.markdown', true);
        $html =  Markdown($text);
        $post->contents = $html;
    }
    echo $twig->render('main/content.html.twig', array('html' => $html,
                                                       'post' => $post,
                                                       'page' => $page,
                                                       'action' => 'post',
                                                       'tags' => getTags()));
  }
  
  function getTags()
  {
    $tags = array("3d","blog meta","design","education","c#","c++","vb.net","ios","sharepoint","htg","github","return2-sender","sterts","tech","unity","coding","raspberry pi");
    return $tags;
  }
  
  function getPage($db,$tag,$index)
  {
    $page = new Page();
    $page->current_page = $index;
    $page->start_page = 1;
    if ($page->current_page > floor($page->pages_to_display / 2))
    {
         $page->start_page = $page->current_page - floor($page->pages_to_display / 2);
         
    }
    $page->page_count = floor(getPostCount($db, $tag) / $page->post_per_page) + 1;
    $page->end_page =   $page->start_page + $page->pages_to_display;
    if ($page->end_page >  $page->page_count - 1)
    {
        $page->end_page =  $page->page_count - 1;
        $page->start_page = $page->page_count - $page->pages_to_display;
       
    }
      if ($page->start_page  < 1)
         {
            $page->start_page = 1;
         }
         if ($page->end_page < 1)
         {
            $page->end_page =  1;
         }
         
         if ( $page->current_page < 1)
         {
            $page->current_page = 1;
         }
    return $page;
  }
  
  function getPostCount($db, $tag)
  {
      if ($tag == '') {
        $sql = "SELECT count(*) as count FROM post WHERE published = 1;";
      }
      else {
        $sql = "SELECT count(*) as count FROM post WHERE published = 1 AND tags like '%" . $tag . "%';";
      }
      $result  = $db->Query($sql);
      foreach($result as $row)
      {
        $count = $row['count'];
      }
      //echo($count);
      return $count;
  }
  
  function homeAction($twig, $index)
  {
    $post_per_page = 5;
    $index = intval($index);
    
    $page = new Page();
    $page->current_page = $index;
    
    $start_index = $post_per_page * ($index - 1);
    
    $end_index = $start_index + $post_per_page;
    
    $db = new Database();
    $page = getPage($db,'',$index);
    $sql = "SELECT * FROM post WHERE published = 1 ORDER BY created DESC LIMIT " . $start_index . "," . $end_index . ";";
    
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
        $post->tags =  explode( ',' , $row['tags']);
        array_push($posts, $post);
        $count++;
    }
    $next_index = $index + 1;
    $previous_index = $index - 1;
    echo $twig->render('main/index.html.twig', array('posts' => $posts,
                                                     'next_index' => $next_index,
                                                     'action' => '/',
                                                     'previous_index' => $previous_index,
                                                     'page' => $page,
                                                     'tags' => getTags()));
  }
 
 
  function testAction($twig, $index)
  {
    echo $twig->render('test.html.twig', array('test'=>'test'));
  }
 
 
  function jsonAction($twig, $words)
  {
    
    $tag = '';
    
 
    if (count($words) > 3)
    {
        $tag = $words[count($words) - 2];
    }
    else
    {
        $tag = $words[count($words) - 1];
    }
    
    
    $tag = str_replace('%20', ' ', $tag);
    
    $db = new Database();
    
    
    $sql = "SELECT * FROM post WHERE published = 1 AND tags like '%" . $tag . "%' ORDER BY created DESC";
     
   
    $result  = $db->Query($sql);
    $count = 0;
    $posts = array();
    foreach($result as $row)
    {
        $post = new Post();
        $post->title = $row['title'];
        $post->path = $row['path'];
        $text = file_get_contents('./post/' .  $post->path . '.markdown', true);
        $html = urlencode(Markdown($text));
        //$html = Markdown($text);
        $post->contents = $html;
        array_push($posts, $post);
        $count++;
    }
    
    echo $twig->render('posts.json.twig', array('posts'=> $posts));
  }
  
  function tagAction($twig, $words, $index)
  {
    $post_per_page = 5;
    $index = intval($index);
    $page = new Page();
    $page->current_page = $index;
    $start_index = $post_per_page * ($index - 1);
    
    $end_index = $start_index + $post_per_page;
    $tag = '';
    //if($index > 1)
    //{
    if (count($words) > 3)
    {
        $tag = $words[count($words) - 2];
    }
    else
    {
        $tag = $words[count($words) - 1];
    }
    //}
    //else
    //{
        //$tag = $words[count($words) - 1];
    //}
    $tag = str_replace('%20', ' ', $tag);
    
    $db = new Database();
    $page = getPage($db,$tag,$index);
    
    $sql = "SELECT * FROM post WHERE published = 1 AND tags like '%" . $tag . "%' ORDER BY created DESC LIMIT " . $start_index . "," . $end_index . ";";
  
   
    $result  = $db->Query($sql);
    $count = 0;
    $posts = array();
    foreach($result as $row)
    {
        $post = new Post();
        $post->title = $row['title'];
        $post->path = $row['path'];
        $post->tags =  explode( ',' , $row['tags']);
        $text = file_get_contents('./post/' .  $post->path . '.markdown', true);
        $html =  Markdown($text);
        $post->contents = $html;
        array_push($posts, $post);
        $count++;
    }
    $next_index = $index + 1;
    $previous_index = $index - 1;
    echo $twig->render('main/index.html.twig', array('posts'=> $posts,
                                                     'next_index' => $next_index,
                                                     'action' => 'tag/' . $tag,
                                                     'previous_index' => $previous_index,
                                                     'tags' => getTags()));
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
          tagAction($twig,$words, 1);
        }
        elseif ($words[count($words) - 2] == 'json') {
            jsonAction($twig,$words);
        }
        elseif ($words[count($words) - 1] == 'test') {
            testAction($twig,$words);
        }
        else {
          homeAction($twig, 1);
        }
    }
  }
  goController();

?>