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
    db();
    mysql_query("INSERT INTO `comments` (`author`, `comment`) VALUES ($data)");
}

function get_comments()
{
    db();
    $sel = "SELECT * FROM `comments` ORDER BY id DESC";
    $res = mysql_query($sel);
    while($row = mysql_fetch_array($res)) {
            $comments[] = $row;
        }
    return $comments;
}