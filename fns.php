<?php

function db()
{
    $host = 'localhost';
    $user = 'salomuG';
    $pswd = 'salomuG';
    $db = 'comments_form';
    
    $connect = mysql_connect($host, $user, $pswd);
    if(!$connect || !mysql_select_db($db, $connect) ) {
        return die("ERROR blya");
    }
    else {
        return $connect;
    }
}

function data_cleaning($data)
{
    $data = strip_tags(htmlspecialchars(trim($data)));
    return $data;
}

function captcha()
{
    $captcha = rand(100, 999);
    return $captcha;
}

function add_comment($data)
{
    mysql_query("INSERT INTO `comments` (`author`, `comment`) VALUES ($data)");
}

function get_comments()
{
    $sel = "SELECT * FROM `comments` LEFT JOIN `images` ON comments.id = images.comment_id ";
    $res = mysql_query($sel);
    while($row = mysql_fetch_array($res)) {
            $comments[] = $row;
        }
    return $comments;
}

function add_image($file_name, $comment_id)
{
    mysql_query("INSERT INTO `images` (`image`, `comment_id`) VALUES ('$file_name', '$comment_id')");
}