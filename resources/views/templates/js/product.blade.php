<script>
    function clickOutElem() {
        $(document).click(function(event) {
            if ($(event.target).closest(".option-geo").length) return;
            $('.option-geo ul').remove();
        });
    }
    function add_post(){
        var page = $('#page').attr('page');
        var category = $('#page').attr('category');
        $.ajax({
            type: "GET",
            url: "{{ route('ajax.product') }}",
            data:{page:page,category:category},
            success: function (data) {
                $('#product').append(data);
                $('#page').attr('page',Number(page)+Number(1));
                in_basket()
                $('.in-basket').click(function(event) {
                    event.preventDefault();
                    $('.add-to-basket-block').addClass('active');
                    setTimeout(function(){
                        $('.add-to-basket-block').removeClass('active');
                    }, 3000);
                });
            }
        });
    }
    function clouse_modal(){
        $(".add-to-basket-block").removeClass("active")
    }
    $(document).ready(function(){
        if($("div").is("#product")) {
            add_post();
        }
        clickOutElem();
    });
    $('#page').click(function(){
        add_post();
    });
</script>


{{--<script>--}}
{{--    $('[name="search"]').on('input keyup',function(e){--}}
{{--        e.preventDefault();--}}
{{--        var search = $('[name="search"]').val();--}}
{{--        $.ajax({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            },--}}
{{--            type: "get",--}}
{{--            url: "{{ route('search') }}",--}}
{{--            data:{search:search},--}}
{{--            success: function (data) {--}}
{{--                //Делаем появление подсказок в поиске--}}
{{--                $( ".search-input" ).click(function() {--}}
{{--                    $(this).siblings('.search-result-list').show();--}}
{{--                });--}}

{{--                $(document).mouseup(function (e){ // событие клика по веб-документу--}}
{{--                    var div = $(".search-result-list"); // тут указываем ID элемента--}}
{{--                    if (!div.is(e.target) // если клик был не по нашему блоку--}}
{{--                        && div.has(e.target).length === 0) { // и не по его дочерним элементам--}}
{{--                        div.hide(); // скрываем его--}}
{{--                    }--}}
{{--                });--}}
{{--                $('.search-result-list').html(data);--}}
{{--                $('.search-result-list').show()--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}