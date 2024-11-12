const input = document.querySelectorAll('.input');

function inputFocus() {
    this.parentNode.classList.add('focus');
}

function inputBlur() {
    if(this.value == '' || this.value === null){
        this.parentNode.classList.remove('focus');
    }
}

input.forEach((e) => {
    e.addEventListener('focus', inputFocus);
    e.addEventListener('blur', inputBlur);
})
