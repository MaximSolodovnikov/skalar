<?php 
mysql_connect("localhost", "salomuG", "salomuG") or die("Cannot to connect to DB");
mysql_select_db("comments_form") or die("Cannot select the DB");

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
        
        if (isset($_POST['send']) && !empty($author) && !empty($comment)) {
            
                $ins = "INSERT INTO `comments` (`author`, `comment`) VALUES ('$author', '$comment')";
                $res = mysql_query($ins);
                header("Location: .");
        }
        break;
}