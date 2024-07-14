<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Order confirmation </title>
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0;" />
    <style type="text/css">
        .top_rw {
            background-color: #f4f4f4;
        }

        .td_w {}

        button {
            padding: 5px 10px;
            font-size: 14px;
        }

        .invoice-box {
            max-width: 890px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 14px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-bottom: solid 1px #ccc;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: middle;
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
            font-size: 12px;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
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

        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr class="top_rw">
                        <td colspan="2">
                            <h2 style="margin-bottom: 0px;"> Tax invoice/Bill of Supply/Cash memo </h2>
                            <span style="">{{ $purchase->id }}  Date:{{ $purchase->due_date}} </span>
                        </td>
                        <td style="width:30%; margin-right: 10px;">
                            
                        </td>
                    </tr>
                    <tr class="top">
                        <td colspan="3">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <b> Sold By: {{ $purchase->vendor_name }} </b> <br>
                                            {{ $purchase->vendor_address }} <br>
                                            {{ $purchase->vendor_phone }}<br>
                                            {{ $purchase->vendor_email }}<br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="information">
                        <td colspan="3">
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <b> Shipping Address: w3learnpoint </b> <br>
                                            Kokar, Ranchi <br>
                                            +0651-908-090-009<br>
                                            info@w3learnpoint.com<br>
                                            www.w3learnpoint.com
                                        </td>
                                        <td> <b> Billing Address: w3learnpoint </b><br>
                                            Acme Corp.<br>
                                            John Doe<br>
                                            john@example.com
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                            <table cellspacing="0px" cellpadding="2px">
                                <tbody>
                                    <tr class="heading">
                                        <td style="width:25%;">
                                            ITEM
                                        </td>
                                        <td style="width:10%; text-align:center;">
                                            QTY.
                                        </td>
                                        <td style="width:10%; text-align:right;">
                                            PRICE (INR)
                                        </td>
                                        <td style="width:15%; text-align:right;">
                                            Total AMOUNT (INR)
                                        </td>
                                       
                                    </tr>
                                    @foreach ($purchaseitems as $item)
                                    <tr class="item">
                                        <td style="width:25%;">
                                           {{ $item->category->name }}<br> {{ $item->info }}   
                                        </td>
                                        <td style="width:10%; text-align:center;">
                                           {{ $item->cost }}
                                        </td>
                                        <td style="width:10%; text-align:right;">
                                            {{ $item->qty }}
                                        </td>
                                        <td style="width:15%; text-align:right;">
                                            {{ $item->sub_total }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="total">
                        <td colspan="3" align="right">Amount : {{  $purchase->sub_totals }} </td>
                    </tr>
                    <tr class="total">
                        <td colspan="3" align="right"> Tax : {{ $purchase->tax  }} </td>
                    </tr>
                    <tr class="total">
                        <td colspan="3" align="right">Total Amount : {{ $purchase->sub_totals}} </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table cellspacing="0px" cellpadding="2px">
                                <tbody>
                                    <tr>
                                        <td width="50%">
                                        </td>
                                        <td>
                                            <b> Authorized Signature </b>
                                            <br>
                                            <br>
                                            ...................................
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
