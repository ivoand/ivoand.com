'use strict';

window.onbeforeunload = function() {
    window.scrollTo(0, 0);
}

var poga = document.getElementById('poga');
var contacts = document.getElementById('contacts');


poga.addEventListener('click', function() {
    contacts.scrollIntoView({ behavior: "smooth" })
})

var upButton = document.querySelector('.up-poga');
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.documentElement.scrollTop > 500) {
        upButton.style.display = "block";
    } else {
        upButton.style.display = "none";
    }
}
upButton.addEventListener('click', function() {
    document.querySelector('body').scrollIntoView({ behavior: "smooth" });
})
function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }