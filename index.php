<?php 
mysql_connect("localhost", "salomuG", "salomuG") or die("Cannot to connect to DB");
mysql_select_db("comments_form") or die("Cannot select the DB");
require_once 'fns.php';
$act = $_GET['act']?$_GET['act']:'main';

switch($act) {
    case "main":
        
        $comments = array();
        $sql = "SELECT * FROM `comments` ORDER BY id DESC";
        $res = mysql_query($sql);

        while($row = mysql_fetch_array($res)) {
                $comments[] = $row;
        }
        require_once "views/comment_form.php";
        break;

    case "add_comment":
        
        $author = strip_tags(htmlspecialchars(trim($_POST['author'])));
        $comment = strip_tags(htmlspecialchars(trim($_POST['comment'])));
        
        /*$captcha2 = strip_tags(htmlspecialchars(trim($_POST['captcha2'])));*/
        
        if (isset($_POST['send']) && !empty($author) && !empty($comment)/* && !empty($_POST['$captcha2'])*/) {
            
            /*if ($captcha == $captcha2) {
                /*$ins = "INSERT INTO `comments` (`author`, `comment`) VALUES ('$author', '$comment')";
                $res = mysql_query($ins);*/
                /*$insert = add_comment();
                header("Location: .");
            }
            else {
                $info = 'Символы с картинки не совпадают';
            } 
        }
        if (isset($_POST['send']) && (empty($author) || empty($comment) || empty($_POST['$captcha2']))) {
            $info = 'Заполните все поля формы';
        }*/
            
            add_comment($author, $comment);
            header("Location: .");
        }

         
        break;
}