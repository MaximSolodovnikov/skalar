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
  })

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
    errors.push("author is empty");
  } else if(authorName.length > authorNameLimit) {
      errors.push("author max length is " + authorNameLimit);
  }

  if(!comment) {
    errors.push("comment is empty");
  } else if(comment.length > commentLimit) {
      errors.push("comment max length is " + commentLimit);
  }

  if(!captcha) {
    errors.push("captcha is empty");
  } else if(!(/[0-9]{3}$/.test(captcha))){
    errors.push("captcha should contain 3 digits");
  }

  if(errors.length) {
    showErrors(errors);
  }

  return errors.length === 0;
}

form.onsubmit = validateForm;
