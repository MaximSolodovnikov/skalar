<?php require_once 'fns.php';

    db();

    /*output of comments*/
    $comments = get_comments();

    /*accept the values from the form*/
    $author = data_cleaning($_POST['author']);
    $comment = data_cleaning($_POST['comment']);
    $captcha = data_cleaning($_POST['captcha']);
    $captcha2 = data_cleaning($_POST['captcha2']);    

        if (isset($_POST['send']) && !empty($author) && !empty($comment) && !empty($captcha2)) {

        if ($captcha == $captcha2) {

            $text['author'] = "'" . $author . "'";
            $text['comment'] = "'" . $comment . "'";
            $text = implode(',', $text);
            
            if ($_FILES['uploadfile']['size'] != 0 ) {
                if ($_FILES['uploadfile']['size'] <= 1000000) {
                    if ($FILES['uploadfile']['type'] == 'image/gif'  || 
                        $FILES['uploadfile']['type'] == 'image/jpeg' ||
                        $FILES['uploadfile']['type'] == 'image/png' ) {
                        
                        add_file();
                        add_comment($text);
                        header("Location: ."); 
                    }
                    else {
                        $info = 'Не верный формат файла';
                    }
                }
                else {
                    $info = 'Превышен размер файла';
                }    
            }
            else {
                add_comment($text);
                header("Location: .");     
            }     
        }
        else {
            $info = "Введенные цифры не совпадают";
        }
    }
    if (isset($_POST['send']) && (empty($author) || empty($comment) || empty($captcha2))) {
        
        $info = "Заполните все поля";
    }

require_once "views/comment_form.php";
