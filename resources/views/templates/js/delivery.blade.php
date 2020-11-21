<script>
    {{--function DeliveryCostProduct(){--}}
        {{--var product_id = $('.delivery-count-to').attr('product');--}}
        {{--$.ajax({--}}
            {{--headers: {--}}
                {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--},--}}
            {{--type: "POST",--}}
            {{--url: "{{ route('ajax.delivery.product.cost') }}",--}}
            {{--data: {product_id:product_id},--}}
            {{--success: function (data) {--}}
                {{--if(data.max){--}}
                     {{--$('.delivery-count-to').text(data.max);--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}

    // Расчет стоимости доставки в корзине,если введен валидный адрес
    {{--function DeliveryCost(postal_code = null){--}}
        {{--$.ajax({--}}
            {{--headers: {--}}
                {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--},--}}
            {{--type: "POST",--}}
            {{--url: "{{ route('ajax.delivery.cost') }}",--}}
            {{--data:{postal_code:postal_code},--}}
            {{--success: function (data) {--}}
                {{--var total = 0;--}}
                {{--data.forEach(function(elem) {--}}
                    {{--total += elem.cost--}}
                {{--});--}}
                {{--if( $("span").is(".delivery-count-sum") ) {--}}
                    {{--$('.delivery-count-sum').text(total);--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}

    {{--if( $("span").is(".delivery-count-to") ) {--}}
        {{--DeliveryCostProduct();--}}
    {{--}--}}
    {{--if( $("span").is(".delivery-count-sum") ) {--}}
        {{--DeliveryCost();--}}
    {{--}--}}

</script>

{{--адрес доставки в корзине--}}
<script>
    // $("#delivery-address").suggestions({
    //     token: "c458066ea449eb69364ed10ae83db47fa0dc0d48",
    //     type: "ADDRESS",
    //     /* Вызывается, когда пользователь выбирает одну из подсказок */
    //     onSelect: function(suggestion) {
    //
    //         var error = null;
    //         if(suggestion.data.city == null){
    //             error = 0;
    //         }
    //         if(suggestion.data.street == null ){
    //             error = 1;
    //         }
    //         if(suggestion.data.house == 'undefined' ){
    //             error = 2;
    //         }
    //
    //         switch (error) {
    //             case 0:
    //                 $('#invalid-feedback').show();
    //                 $('#invalid-message').text('укажите город');
    //             case 1:
    //                 $('#invalid-feedback').show();
    //                 $('#invalid-message').text('укажите улицу');
    //             case 2:
    //                 $('#invalid-feedback').show();
    //                 $('#invalid-message').text('укажите квартиру');
    //             default:
    //                 $('#invalid-feedback').hide();
    //         }
    //         console.log( suggestion.data.postal_code );
    //     }
    // });
</script>


<script>
    // $("#delivery").suggestions({
    //     token: "c458066ea449eb69364ed10ae83db47fa0dc0d48",
    //     type: "ADDRESS",
    //     /* Вызывается, когда пользователь выбирает одну из подсказок */
    //     onSelect: function(suggestion) {
    //       if(suggestion.data.postal_code){
    //             $('.invalid-feedback').hide();
    //                $('[name="zip_code"]').val(suggestion.data.postal_code);
    //       }else{
    //           $('.invalid-feedback').show();
    //           $('[name="zip_code"]').val('');
    //       }
    //     }
    // });

    // $('#form-delivery').submit(function (event) {
    //     event.preventDefault();
    //     var zip = $('[name="zip_code"]').val();
    //     if(zip){
    //         $('#form-delivery').submit();
    //     }else{
    //         $('.invalid-feedback').show();
    //     }
    // });
</script>