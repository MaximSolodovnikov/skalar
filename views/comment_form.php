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
        
        
        <?php foreach($comments as $item): ?>
            <div class="comment-answ">
                <span class="author_comm"><?= $item['author']; ?></span> | <?= $item['comment']; ?><br /><br />
                <?= $item['time']; ?>
            </div>
        <?php endforeach; ?>
        
        <div class="comment-form">
        <div class="info"><?= $info; ?></div>
        <!--<span class="title_form">Оставить отзыв о сайте</span>-->
            <form method="POST" action="?act=add_comment">
                <label>Ваше имя:</label><br />
                <input type="text" name="author" class="text_input" /><br /><br />
                <label>Оставить отзыв:</label><br />
                <textarea name="comment" class="form_textarea"></textarea><br /><br />
                <input type="submit" name="send" value="Отправить" class="button" />
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/myscript.js"></script>
    </body>
</html>