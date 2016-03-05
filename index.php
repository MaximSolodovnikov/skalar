<?php require_once 'fns.php';

    db();

    /*output of comments*/
    $comments = get_comments();
    
    print_r($comments);
    /*echo $comments[0]['id'];*/
    
    /*accept the values from the form*/
    $author = data_cleaning($_POST['author']);
    $comment = data_cleaning($_POST['comment']);
    $comment_id = $_POST['comment_id']; /* Почему-то вносится в таблицу на 1 меньше */
    $captcha = data_cleaning($_POST['captcha']);
    $captcha2 = data_cleaning($_POST['captcha2']);    

        if (isset($_POST['send']) && !empty($author) && !empty($comment) && !empty($captcha2)) {

        if ($captcha == $captcha2) {

            $text['author'] = "'" . $author . "'";
            $text['comment'] = "'" . $comment . "'";
            $text = implode(',', $text);
            
            $max_image_size = 102400; /*100 * 1024 = 100Kb*/
            if(is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
                if ($_FILES['uploadfile']['size'] < $max_image_size) {
                    if (($_FILES['uploadfile']['type'] == "image/gif") ||
                        ($_FILES['uploadfile']['type'] == "image/jpeg") || 
                        ($_FILES['uploadfile']['type'] == "image/png")) {
                        
                        
                        $uploaddir = './img/';
                        $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
                        
                        if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
                        {
                            $uploadfilename = $_FILES['uploadfile']['name'];
                            
                            add_image($uploadfilename, $comment_id);
                        }
                        
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
