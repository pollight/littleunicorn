<script>
    //Перейти в корзину
    function redirect_basket(event){
        event.preventDefault();
        location.replace("{{ route('pages.basket') }}")
    }
    //Показать кол-во товаров в корзине
    function showCountItem(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('ajax.basket.count') }}",
            success: function (data) {
                $('.item-count-basket').text(data);
                if( Number(data) > 0 ){
                    if( !$(".basket-button-wrp").hasClass("active") ){
                        $(".basket-button-wrp").addClass("active")
                    }
                }else{
                    $(".basket-button-wrp").removeClass("active")
                }
            }
        });
    }
    //Показать общую сумму с доставкой
    function showTotalItemDelivery(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "{{ route('ajax.count.delivery') }}",
            success: function (data) {
                $('.item-total-basket-delivery').text(data);
            }
        });
    }
    //Показать общую сумму
    function showTotalItem(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "{{ route('ajax.basket.total') }}",
            success: function (data) {
                $('.item-total-basket').text(data);
            }
        });
    }
    //Показать всего товаров
    function showSumItem(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "{{ route('ajax.basket.sum') }}",
            success: function (data) {
                $('.item-sum-basket').text(data);
            }
        });
    }
    //Показать товары в корзине в шапке
    function showAddedItem(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('ajax.basket.added_item') }}",
            success: function (data) {
                $('.added-items-list').html(data);
                if($('.input_styled').length > 0){
                    $('.input_styled').styler();
                }
            }
        });
    }

    function basket_update(value,id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('ajax.basket.update') }}",
            data:{qty:value,id:id},
            beforeSend: function (data) {
                // preloader.gif
                $('.loader-quantity').show();
            },
            success: function (data) {
                $('.loader-quantity').hide();
                showSumItem();
                showAddedItem();
                showCountItem();
                showTotalItem();
                showTotalItemDelivery();
                if($('.input_styled').length > 0){
                    $('.input_styled').styler();
                }
            }
        });
    }

    function basket_remove(id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('ajax.basket.remove') }}",
            data:{id:id},
            success: function (data) {
               $('#'+id).remove();
                showSumItem();
                showAddedItem();
                showCountItem();
                showTotalItem();
                showTotalItemDelivery();
                if($('.input_styled').length > 0){
                    $('.input_styled').styler();
                }
            }
        });
    }

    //Добавить товар в корзину
    function in_basket(){
        $('.in-basket').click(function(){
            var product_id = $(this).attr('product');
            var size = $(this).attr('size');
            console.log(size);
            $.ajax({
                type: "GET",
                url: "{{ route('ajax.basket.add') }}",
                data:{product_id:product_id,'size':size},
                success: function (data) {
                    $('.add-to-basket-block').html(data);
                    showSumItem();
                    showCountItem();
                    showTotalItem();
                    showAddedItem();
                }
            });
        });
    }
    $(document).ready(function(){
        in_basket();
    });
</script>