<?php

function captcha()
{
    $captcha = rand(100, 999);
    return $captcha;
}

function data_cleaning($data)
{
    $data = strip_tags(htmlspecialchars(trim($data)));
    return $data;
}

function add_comment($author, $comment)
{
    mysql_query("INSERT INTO `comments` (`author`, `comment`) VALUES ('$author', '$comment')");
}
