<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Comments form">
        <meta name="author" content="MaximSolodovnikov">
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
        
<?php /* Output comments ------------------------->*/ ?>
       <?php if (!empty($comments)): ?>

            <?php foreach($comments as $item): ?>
                <div class="comment-answ">
                    <span class="author_comm"><?= $item['author']; ?></span> | <?= $item['comment']; ?>
                    <?php if ($item['image']){ ?>
                        <br /><img src="img/<?= $item['image']; ?>" class="uploadfile" alt="uploadfile" />
                    <?php } ?><br /><br />
                    <?= $item['time']; ?>
                </div>
            <?php endforeach; ?>
         
       <?php endif; ?>
<?php /*<------------------------- Output comments */ ?>
        
        <div class="comment-form">
        <div id="errors" class="info"><?= $error; ?></div>
            <form method="POST"  enctype="multipart/form-data">
                <label>Ваше имя:</label>
				<br>
                <input type="text" name="author" value="<?= $author; ?>" class="text_input" required>
				<br><br>
                <label>Оставить отзыв:</label>
				<br>
                <textarea name="comment" class="form_textarea"><?= $comment; ?></textarea>
				<br><br>
                <label>Введите цифры для проверки:</label>
				<br>
                <input name="captcha" value="<?= captcha(); ?>" readonly="readonly" size="2" class="captcha">
                <input name="captcha2" value="" size="2" maxlength="3" class="captcha" />
				<br><br>
                <input type="file" name="uploadfile" />
				<br><br>
                <input type="submit" name="send" value="Отправить" class="button">
            </form>
        </div>
    </div>
    <script src="js/my_valid.js"></script>
    </body>
</html>