<?php require_once 'fns.php';

        db();

        $comments = get_comments();
        
        $captcha = $_POST['captcha'];
        $captcha2 = $_POST['captcha2'];    
        
        if (isset($_POST['send']) && !empty($_POST['author']) && !empty($_POST['comment']) && !empty($_POST['captcha2'])) {

            
            
           if ($captcha == $captcha2) {
                
                $comment['author'] = data_cleaning("'".$_POST['author']."'");
                $comment['comment'] = data_cleaning("'".$_POST['comment']."'");
                $comment = implode(',', $comment);
                add_comment($comment); 
            }
            else {
                $info = "Символы не совпадают";
            }
            header("Location: .");
        }

        
        
    require_once "views/comment_form.php";