var form = document.forms[0];
var authorInput = form.elements.author;
var commentInput = form.elements.comment;
var captchaInput = form.elements.captcha2;
var errorMessageBlock = document.getElementById('errors');

function showErrors(errors) {
    var errorsContainer = document.createDocumentFragment();
    errors.forEach(function(error) {
        var errorWrapper = document.createElement('div');
        errorWrapper.innerHTML = error;
        errorsContainer.appendChild(errorWrapper);
    });

    errorMessageBlock.appendChild(errorsContainer);
}

function clearErrors() {
    errorMessageBlock.innerHTML = "";
}

function validateForm() {
    clearErrors();

    var errors = [];
    var authorName = authorInput.value.trim();
    var comment = commentInput.value.trim();
    var captcha = captchaInput.value.trim();

    var authorNameLimit = 50;
    var commentLimit = 500;

    if(!authorName) {
        errors.push("Вы не ввели Ваше имя");
    } else if(authorName.length > authorNameLimit) {
        errors.push("Максимальная длина поля Ваше имя: " + authorNameLimit + " символов");
    }

    if(!comment) {
        errors.push("Вы не оставили Отзыв");
    } else if(comment.length > commentLimit) {
        errors.push("Максимальная длина поля Отзыв: " + commentLimit + " символов");
    }

    if(!captcha) {
        errors.push("Вы не ввели Цифры для проверки");
    } else if(!(/[0-9]{3}$/.test(captcha))){
        errors.push("Поле Цифры для проверки: должно содержать только цифры");
    }

    if(errors.length) {
        showErrors(errors);
    }
    
    return errors.length === 0;
}

form.onsubmit = validateForm;
