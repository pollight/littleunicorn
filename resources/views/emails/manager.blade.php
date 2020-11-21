
<table style="border-collapse:collapse;border-spacing:0;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;height:100%;line-height:19px;margin:0;padding:0;text-align:left;vertical-align:top;width:100%;">
    <tbody>
    <tr style="padding:0;text-align:left;vertical-align:top;">
        <td align="center" valign="top" style="border-collapse:collapse;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;line-height:19px;margin:0;padding:0;text-align:center;vertical-align:top;">
            <center style="width:100%;">
                <table style="background-color:#837cfc;border-collapse:collapse;border-spacing:0;color:#fff;padding:0;text-align:inherit;vertical-align:top;width:100%;">
                    <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top;">
                        <td style="border-collapse:collapse;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;line-height:19px;margin:0;padding:0;text-align:left;vertical-align:top;">
                            <div style="display:block;margin:0 auto;max-width:580px;padding:12px 16px;">
                                <img height="37"  alt="Логотип " title="Логотип "
                                     style="clear:both;display:block;float:none;height:37px;margin:0 auto;max-height:37px;text-decoration:none;"
                                     src="{{ asset('img/logo.svg') }}">
                            </div>

                        </td>
                    </tr>
                    </tbody>
                </table>
                <table style="background-color:#F0F0F0;border-collapse:collapse;border-spacing:0;padding:0;text-align:inherit;vertical-align:top;width:100%;">
                    <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top;">
                        <td style="border-collapse:collapse;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;line-height:19px;margin:0;padding:16px 0;text-align:left;vertical-align:top;">
                            <div style="display:block;margin:0 auto;max-width:580px;padding:12px 16px;">
                                <table width="100%" style="border-collapse:collapse;border-spacing:0;margin:12px 0;padding:0;text-align:left;vertical-align:top;">
                                    <tbody>
                                    <tr style="padding:0;text-align:left;vertical-align:top;">
                                        <td style="border-collapse:collapse;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;line-height:19px;margin:0;padding:0;text-align:left;vertical-align:top;">
                                            <p>Заказ № <b>{{ $order->id }}</b></p>
                                            <p>Транзакция № <b>{{ $order->transaction_id }}</b></p>
                                            <p>Статус <b>{{ $order->getStatus() }}</b></p>
                                            <p>Сумма заказа: <b>{{ $order->count }}</b></p>
                                            <p>Доставка: <b>{{ $order->delivery_count }}</b></p>
                                            <p>Итог: <b>{{ $order->amount }}</b></p>
                                            <hr>
                                            <p>Адрес: {{  $order->city  }}</p>
                                            <p>Квартира: {{  $order->flat  }}</p>
                                            <p>Этаж: {{  $order->floor  }}</p>
                                            <p>Подъезд: {{  $order->door  }}</p>
                                            <p>Домофон: {{  $order->domofon  }}</p>
                                            <p>Комментарий: {{  $order->comment_delivery  }}</p>
                                            <hr>
                                            <p>Имя: {{  $order->user->name  }}</p>
                                            <p>Фамилия: {{  $order->user->lastname  }}</p>
                                            <p>Email: {{  $order->user->email  }}</p>
                                            <p>Телефон: {{  $order->user->phone  }}</p>
                                            <p>Запасной телефон: {{  $order->user->sub_phone  }}</p>

{{--                                            <table border="1px">--}}
{{--                                                <tr>--}}
{{--                                                    <td>№</td>--}}
{{--                                                    <td>код</td>--}}
{{--                                                    <td>наименование</td>--}}
{{--                                                    <td>стоимость</td>--}}
{{--                                                    <td>кол-во</td>--}}
{{--                                                    <td>сумма</td>--}}
{{--                                                </tr>--}}
{{--                                                @php $i = 1; @endphp--}}
{{--                                                @foreach (Cart::content() as $cart )--}}
{{--                                                    @php $product = App\Product::find($cart->id);@endphp--}}
{{--                                                    <tr>--}}
{{--                                                        <td>@php echo  $i++ @endphp</td>--}}
{{--                                                        <td>{{ $product->code }}</td>--}}
{{--                                                        <td>{{ $product->name }}</td>--}}
{{--                                                        <td>{{ $cart->price }}</td>--}}
{{--                                                        <td>{{ $cart->qty }}</td>--}}
{{--                                                        <td>{{ $cart->qty * $cart->price }} </td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
{{--                                            </table>--}}
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
    </tbody>
</table>
