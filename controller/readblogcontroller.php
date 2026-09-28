<?php
require_once "../model/readblog.php";
require_once "../model/likeblog.php";
$obj = new read();
$blogs = $obj->readblog();
$likeobj = new like();
$likecounts = $likeobj->countlikes();

$uniqueBlogs = [];



foreach ($blogs as $blog) {

    $key = $blog['user_id'] . '|' . $blog['content'];

    if (!isset($uniqueBlogs[$key])) {
        $uniqueBlogs[$key] = $blog;
    }
}
foreach ($uniqueBlogs as &$blog) {

    $blog['total_likes'] = 0;

    foreach ($likecounts as $like) {

        if ($like['blog_id'] == $blog['id']) {
            $blog['total_likes'] = $like['total_count'];
            break;
        }
    }
}

unset($blog);

$titles = $obj->getTitles();
// echo $titles;
$blog1 = null;

if (isset($_POST["selectblog"])) {

    $title = $_POST['title'];

    $blog1 = $obj->getblog($title);
}


// $res = $obj->getauthorname();




?>
