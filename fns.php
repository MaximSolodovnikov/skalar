<?php

require_once 'db_conf.php';

function db()
{
    $connect = mysql_connect(HOST, USER, PSWD);
    if(!$connect || !mysql_select_db(DB, $connect) ) {
        return die("ERROR");
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

function add_comment($author, $comment)
{
    mysql_query("INSERT INTO `comments` (`author`, `comment`) VALUES ('$author', '$comment')");
    return mysql_insert_id();
}

function get_comments()
{
    $sel = "SELECT * FROM `comments` LEFT JOIN `images` ON comments.id = images.comment_id ORDER BY comments.id DESC";
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