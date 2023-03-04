// console.log(jQuery);
// alert(window.axios);
// setTimeout(function () {
//     console.log(window.jQuery);
// },100);

function uncomma(number) {
    number = number.toString();
    return number.split(',').join('');
}

function commafy( num ) {
    var str = num.toString().split('.');
    if (str[0].length >= 5) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    if (str[1] && str[1].length >= 5) {
        str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    }
    return str.join('.');
}

window.addEventListener('load',function () {
    window.jQuery(function ($) {
        $(".currency").focus(function () {
          $(this).val(commafy($(this).val()));
        });
        $(".currency").blur(function () {
            $(this).val(uncomma($(this).val()));
        });

        $(".currency").keyup(function () {
            $(this).val(commafy(uncomma($(this).val())));
        });
    });
});
