// $(function() {
//     // Проверяем запись в куках о посещении
//     // Если запись есть - ничего не происходит
//     if (!$.cookie('hideModal')) {
//         // если cookie не установлено появится окно
//         // с задержкой 5 секунд
//         var delay_popup = 1000;
//         setTimeout("document.querySelector('.bottom__cookie-block').style.display='inline-block'", delay_popup);
//     }
//     $.cookie('hideModal', true, {
//         // Время хранения cookie в днях
//         expires: 30,
//         path: '/'
//     });
// });

// Закрытие полосы cookie


$('.ok').click(function(){
    $('.bottom__cookie-block').fadeOut();
});

// $('.basic-button.fiolet.pay-order').click(function(e){
//     e.preventDefault();
//     $('#order').submit();
// });

$("#delivery-address").suggestions({
    // Замените на свой API-ключ
    token: "c458066ea449eb69364ed10ae83db47fa0dc0d48",
    type: "ADDRESS",
    // Вызывается, когда пользователь выбирает одну из подсказок
    onSelect: function(suggestion) {
    }
});

// function printErrorMsg (msg) {
//     $.each( msg, function( key, value ) {
//      var temp = ' <div class="hide invalid-feedback" style="margin-bottom: 20px; color: #dc3545;" id="invalid-feedback">' +
//       '<i style="margin-right: 5px;" class="fas fa-exclamation-circle"></i><span id="invalid-message" class="city-message">'+value+'</span>' +
//       '</div>';
//         $('[name="'+key+'"]').addClass('error');
//         $('.'+key+'-validator').addClass('show');
//         console.log(value);
//         console.log(key);
//     });
// }
// function addOrder(){
//     var form = $('#order').serialize();
//
//     $.ajax({
//         type: 'GET',
//         url: '/order/add',
//         data: form,
//         success: function (data) {
//            console.log(data)
//         },
//         error: function () {
//             $('#senderror').show();
//             $('#sendmessage').hide();
//         }
//     });
// }
// function showSuccessfulPurchase(data){
//     var form = $('#order').serialize();
//     addOrder()
//     console.log(data);
// }

// function validate(){
//     var form = $('#order').serialize()
//     $.ajax({
//         type: "GET",
//         data:form,
//         url: "/order",
//         dataType: 'json',
//         statusCode: {
//             404: function(){ // выполнить функцию если код ответа HTTP 404
//                 alert( "страница не найдена" );
//             },
//             422: function(data){ // выполнить функцию если код ответа HTTP 403
//                 var errors = data.responseJSON;
//                 printErrorMsg(errors.errors)
//             }
//         },
//         success: function (data) {
//             $("body,html").animate({
//                 scrollTop:0
//             }, 800);
//             var total = $('.item-total-basket.pay').text();
//             total = total.replace(' ', '');
//             ipayCheckout({
//                     amount:total,
//                     currency:'RUB',
//                     description: 'Test'},
//                 function(order) { showSuccessfulPurchase(order) },
//                 function(order) { showFailurefulPurchase(order) });
//             $('.modal-payment').scrollTop(scrollTop);
//         }
//     });
// }
// $('#payeded').click(function(){
//     // validate();
//     addOrder()
// });

