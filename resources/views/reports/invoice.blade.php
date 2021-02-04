<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Faktura</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title">
                            </td>

                            <td>
                                Faktura #: 1<br>
                                Datum fakture: Januar 1, 2015<br>
                                Datum valute: Februar 1, 2015
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                {{$company}}<br>
                                {{$user->name.' '.$user->lastname}}<br>
                                {{$address}}<br>
                                {{$zip.' '.$city}}<br>
                                {{$country}}<br>
                                {{$phone}}
                            </td>

                            <td>
                                Proxy d.o.o.<br>
                                Ime i prezime<br>
                                Adresa<br>
                                71000 Sarajevo<br>
                                Bosna i Hercegovina<br>
                                +387 XX/XXX-XXX
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Način plaćanja
                </td>

                <td colspan="2">
                    Dostava
                </td>
            </tr>

            <tr class="details">
                <td>
                    Virman
                </td>

                <td colspan="2">
                    Brza pošta
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Stavke
                </td>

                <td>
                    Količina
                </td>

                <td>
                    Cijena
                </td>
            </tr>
            @foreach($items as $item)
                <tr class="item">
                    <td>{{$item->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{number_format($item->price,2)}}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td colspan="3" style="text-align: right;">
                    UKUPNO: {{ number_format($getSubTotal,2).' KM' }}
                </td>
            </tr>
            <tr class="total">
                <td colspan="3" style="text-align: right;">
                    PDV: {{number_format($pdv->parsedRawValue,2).' KM'}}
                </td>
            </tr>
            <tr class="total">
                <td colspan="3" style="text-align: right;">
                    DOSTAVA: {{number_format($shipping->parsedRawValue,2).' KM'}}
                </td>
            </tr>
            <tr class="total">
                <td colspan="3" style="text-align: right;">
                    UKUPNO SA PDV: {{ number_format($getSubTotal+$pdv->parsedRawValue+$shipping->parsedRawValue,2).' KM' }}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
