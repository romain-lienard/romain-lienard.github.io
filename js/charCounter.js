var text;
var textLength;
var maxLength=1500;

function charCount() {
  text = document.getElementById("message").value;
  textLength = text.length;
  document.getElementById("charLeft").innerHTML=maxLength - textLength
}

document.getElementById("message").oninput = function() {charCount()};
