function enablePreview() {
    textinput = document.getElementsByClassName('textinput')[0];
    preview = document.getElementById('comment-preview');
    preview.innerHTML = textinput.value;
    MathJax.Hub.Typeset()
}
