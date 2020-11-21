<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no">
    <title>Unicorn</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.formstyler.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <script src="https://kit.fontawesome.com/b7f9cfc1d5.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@19.8.0/dist/css/suggestions.min.css" rel="stylesheet" />
    {{--7e0cf4f9-21de-40f6-963c-f26d5ac27768--}}
{{--    <script id="ISDEKscript" type="text/javascript" src="{{ asset('js/widget/widjet.js') }}"></script>--}}
    <script src="https://3dsec.sberbank.ru/demopayment/docsite/assets/js/ipay.js"></script>
    <script>
        var ipay = new IPAY({api_token: 'cpvq6bf1hcpglbkalpu829pvan'});
    </script>
</head>
