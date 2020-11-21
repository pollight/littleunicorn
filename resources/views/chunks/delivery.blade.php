<script>
    function delivery(params){
        var cityFrom = document.getElementById("send_city");
        cityFrom = cityFrom.textContent || cityFrom.innerText;
        var widjetRE = new ISDEKWidjet({
            showLogs: true,
            hideMessages: false,
            defaultCity: cityFrom,
            cityFrom: '{{ config('delivery.cityFrom') }}',
            choose: true,
            link: 'forpvz',
            hidedress: false,
            bymapcoord: false,
            hidecash: false,
            hidedelt: false,
            goods: [params],
            onReady: onReady,
            onChoose: onChoose,
            onChooseProfile: onChooseProfile,
            onCalculate: calculated
        });
    }
    params = {
        // длина
        length: 12,
        // ширина
        width: 12,
        // высота
        height: 12,
    };
    delivery(params);

    function calculated(params){
        console.log('/');
        console.log(params.profiles.pickup.price);
        console.log(params.profiles.courier.price);
        console.log('/');
        ipjq('#delPricePVZ').html(params.profiles.pickup.price + " руб.");
        ipjq('#delPriceCourier').html(params.profiles.courier.price + " руб.");
    }


    function onReady() {
        console.log('ready');
    }

    function onChoose(wat) {
        console.log('chosen', wat);
        serviceMess(
            'Выбран пункт выдачи заказа ' + wat.id + "\n<br/>" +
            'цена ' + wat.price + "\n<br/>" +
            'срок ' + wat.term + " дн.\n<br/>" +
            'город ' + wat.cityName + ' (код: ' + wat.city +')'
        );
    }

    function onChooseProfile(wat) {
        console.log('chosenCourier', wat);
        serviceMess(
            'Выбрана доставка курьером в город ' + wat.city + "\n<br/>" +
            'цена ' + wat.price + "\n<br/>" +
            'срок ' + wat.term + ' дн.'
        );
    }
</script>

<script>
    window.servmTimeout = false;
    serviceMess = function (text) {
        clearTimeout(window.servmTimeout);
        ipjq('#service_message').show().html(text);
        window.servmTimeout = setTimeout(function () {
            ipjq('#service_message').fadeOut(1000);
        }, 4000);
    }
</script>
<style>
    #service_message {
        position: fixed;
        bottom: 0;
        width: 100%;
        left: 0;
        background: white;
        border-radius: 10px 10px 0 0;
        padding: 18px;
        box-shadow: 0px -6px 5px #666;
        display: none;
    }
    body {margin: 0}

</style>