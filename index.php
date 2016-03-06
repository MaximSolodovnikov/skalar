<?php require_once 'fns.php';

    db();

    /*accept the values from the form*/
    $author = data_cleaning($_POST['author']);
    $comment = data_cleaning($_POST['comment']);
    $captcha = data_cleaning($_POST['captcha']);
    $captcha2 = data_cleaning($_POST['captcha2']);    
    
    if (isset($_POST['send']) && !empty($author) && !empty($comment) && !empty($captcha2)) {

        if ($captcha == $captcha2) {

            $max_image_size = 102400; //100 * 1024 = 100Kb
            
            if(is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
                if ($_FILES['uploadfile']['size'] < $max_image_size) {
                    if (($_FILES['uploadfile']['type'] == "image/gif") ||
                        ($_FILES['uploadfile']['type'] == "image/jpeg") || 
                        ($_FILES['uploadfile']['type'] == "image/png")) {
                    }
                    else {
                        $error = 'Не верный формат файла';
                    }
                }
                else {
                    $error = 'Превышен размер файла';
                }    
            }
            if (!$error) {
                
                $comment_id = add_comment($author, $comment);
                $uploaddir = './img/';
                $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);

                if (@copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
                    $uploadfilename = $_FILES['uploadfile']['name'];

                    add_image($uploadfilename, $comment_id);
                }
            }
            else {
                add_comment($author, $comment);
                header("Location: .");
            }     
        }
        else {
            $error = "Введенные цифры не совпадают";
        }
    }
    if (isset($_POST['send']) && (empty($author) || empty($comment) || empty($captcha2))) {
        
        $error = "Заполните все поля";
    }

    /*output of comments*/
    $comments = get_comments();
    
require_once "views/comment_form.php";
