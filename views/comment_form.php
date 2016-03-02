<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.png">

        <title>Отзывы о сайте</title>

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
    </head>
<body>
    <div class="header">
        <div class="title_form">Оставить отзыв о сайте</div>
    </div>
    <div class="wrapper">
        
       <?php if (!empty($comments)): ?>
           
            <?php foreach($comments as $item): ?>
                <div class="comment-answ">
                    <span class="author_comm"><?= $item['author']; ?></span> | <?= $item['comment']; ?><br /><br />
                    <?= $item['time']; ?>
                </div>
            <?php endforeach; ?>
           
       <?php endif; ?> 
        
        <div class="comment-form">
        <div class="info"><?= $info; ?></div>
            <form method="POST">
                <label>Ваше имя:</label><br />
                <input type="text" name="author" class="text_input" /><br /><br />
                <label>Оставить отзыв:</label><br />
                <textarea name="comment" class="form_textarea"></textarea><br /><br />
                <label>Введите символы с картинки:</label><br />
                <input name="captcha" value="<?= captcha(); ?>" readonly="readonly" size="1" class="captcha" />
                <input name="captcha2" value="" size="1" class="captcha" /><br /><br />
                <input type="submit" name="send" value="Отправить" class="button" />
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/myscript.js"></script>
    </body>
</html>