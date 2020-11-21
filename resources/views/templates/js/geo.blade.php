<script>
    // $('.confirm-button-geo').click(function (e) {
    //     event.preventDefault();
    //     var city = $('[name="city"]').val();
    //     if(city != ''){
    //         geoChange(city);
    //     }
    // });
    function hide_geo(){
        $('.geo-container-option').hide();
    }
    // $('.geo-and-toline-nav').on('click', '.geo', function() {
    //     $('.geo-container-option').toggleClass('red').slideToggle(0);
    // });
    function geoChange(city){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('ajax.geo.change') }}",
            data:{city:city},
            success: function (data) {
                location.reload();
            }
        });
    }

    // Замените на свой API-ключ
    var token = "c458066ea449eb69364ed10ae83db47fa0dc0d48";

    function iplocate(ip) {
        var serviceUrl = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/iplocate/address";
        if (ip) {
            serviceUrl += "?ip=" + ip;
        }
        var params = {
            type: "GET",
            contentType: "application/json",
            headers: {
                "Authorization": "Token " + token
            }
        };
        return $.ajax(serviceUrl, params);
    }
    // Поиск города по IP
    function detect() {
        var ip = $("#ip").val();
        iplocate(ip).done(function(response) {
            // $("#suggestions").text(JSON.stringify(response, null, 4));
            if(response.location != null){
                setGeo(response.location);
                location.reload();
            }else{
                $('#send_city').text('Не определено');
                $('.geo-container-option').show();
            }
        })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
            });
    }
</script>

@if (!session()->exists('geo'))
    <script>
        detect();
    </script>
@endif
<script>
    // Установка города в сессию
    function setGeo(suggestion){
        var city = suggestion.data.city;
        var postal_cade = suggestion.data.postal_code;
        var city_kladr_id = suggestion.data.city_kladr_id;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('ajax.geo.set') }}",
            data:{city:city,postal_cade:postal_cade,city_kladr_id:city_kladr_id},
            success: function (data) {
                console.log(data);
            }
        });
    }
    // Поиск города вручную
    $("#address").suggestions({
        // Замените на свой API-ключ
        token: "c458066ea449eb69364ed10ae83db47fa0dc0d48",
        type: "ADDRESS",
        hint: false,
        bounds: "city",
        constraints: {
            label: "",
            locations: { city_type_full: "город" }
        },
        onSelect: function(suggestion) {
            setGeo(suggestion)
        }
    });
</script>