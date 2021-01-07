require('./bootstrap');

require('alpinejs');

var $ = require('jQuery');

$(".closealertbutton").click(function (e) {
    // $('.alertbox')[0].hide()
    // e.preventDefault();
    pid = $(this).parent().hide(500)
    console.log(pid)
    // $(".alertbox", this).hide()
})