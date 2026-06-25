<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $globalSetting->company_name ?? 'Om Saravanabhava Pyrotech' }} - Estimate</title>
    <script>
        // Set a shorter title for print so date & title don't overlap in browser print header
        window.addEventListener('beforeprint', function() {
            document.title = 'Estimate - {{ $productord->oeder_id }}';
        });
        window.addEventListener('afterprint', function() {
            document.title = '{{ addslashes($globalSetting->company_name ?? 'Om Saravanabhava Pyrotech') }} - Estimate';
        });
    </script>
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="196x196" />
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="96x96" />
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="32x32" />
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="16x16" />
    <link rel="icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('/img/favicon/mexi_fav_icon.png') }}"
        sizes="128x128" />
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        margin: 0;
        padding: 0;
        color: #000000;
    }

    .quotation-container {
        width: 800px;
        margin: 20px auto;
        padding: 20px;
        box-sizing: border-box;
    }

    @media print {
        @page {
            size: A4;
            margin-top: 12mm;
            margin-bottom: 12mm;
            margin-left: 15mm;
            margin-right: 15mm;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .quotation-container {
            margin: 0 auto;
            padding: 0;
            width: 100%;
        }

        .print_btn {
            display: none;
        }

        tr {
            page-break-inside: avoid;
            break-inside: avoid;
        }

        thead {
            display: table-header-group;
        }
    }

    .header-box {
        border: 1px solid #000000;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 10px;
    }

    .client-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000000;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .client-table td.client-info-col {
        width: 60%;
        padding: 10px;
        text-align: left;
        vertical-align: top;
        font-size: 13px;
        border: none;
    }

    .client-table td.estimate-info-col {
        width: 40%;
        padding: 10px;
        text-align: left;
        vertical-align: top;
        font-size: 13px;
        border: none;
        border-left: 1px solid #000000;
    }

    .items-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        margin-bottom: 10px;
        border: 1px solid #000000;
    }

    .items-table th,
    .items-table td {
        border: 1px solid #000000;
        padding: 6px 4px;
        text-align: center;
        font-size: 12px;
        color: #000000;
    }

    .items-table th {
        font-weight: bold;
        background-color: #ffffff;
    }
    
    .items-table td {
        font-weight: bold;
    }

    .items-table tr.summary-row td {
        border-top: 2px solid #000000;
        border-bottom: 2px solid #000000;
    }

    .totals-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000000;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .totals-table td.words-col {
        width: 60%;
        padding: 15px;
        text-align: left;
        vertical-align: middle;
        font-size: 13px;
        font-weight: bold;
        border: none;
    }

    .totals-table td.summary-col {
        width: 40%;
        padding: 10px;
        text-align: left;
        vertical-align: top;
        font-size: 13px;
        border: none;
        border-left: 1px solid #000000;
    }

    .print_btn {
        position: fixed;
        top: 15px;
        right: 15px;
        background: #579742;
        padding: 10px 15px;
        border: none;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        z-index: 999;
        font-weight: bold;
    }
</style>

<body>
    <button class="print_btn" onclick="window.print()">Print</button>
    <div class="quotation-container">
        <!-- Devotional Title outside main container -->
        <div style="text-align: center; margin-bottom: 5px;">
            <h2 style="font-size: 16px; font-weight: bold; text-transform: uppercase; margin: 0; letter-spacing: 2px; color: #000000;">Estimate</h2>
        </div>

        <!-- Header Box -->
        <header class="header-box">
            <table style="width: 100%; border-collapse: collapse; border: none; margin: 0;">
                <tr>
                    <!-- Left: Logo -->
                    <td style="width: 20%; text-align: left; vertical-align: middle; border: none; padding: 0;">
                        @if($globalSetting && $globalSetting->logo)
                            <img src="{{ asset($globalSetting->logo) }}" alt="{{ $globalSetting->company_name ?? 'Logo' }}" style="max-height: 110px; max-width: 110px; border-radius: 50%; object-fit: contain;">
                        @else
                            <img src="{{ asset('assets/images/logo/ram_logo1.png') }}" alt="Logo" style="max-height: 110px; max-width: 110px; border-radius: 50%; object-fit: contain;">
                        @endif
                    </td>
                    
                    <!-- Center: Slogans, Name, Address, Contact -->
                    <td style="width: 60%; text-align: center; vertical-align: middle; border: none; padding: 0 10px; line-height: 1.4;">
                        <!-- Tamil slogans -->
                        <div style="font-size: 10px; margin-bottom: 1px; font-weight: bold; font-family: 'Arial Unicode MS', sans-serif;">உ</div>
                        <div style="font-size: 11px; margin-bottom: 4px; font-weight: bold; font-family: 'Arial Unicode MS', sans-serif;">ஓம் முருகன் துணை</div>
                        
                        <!-- Company Name -->
                        <h1 style="font-size: 20px; font-weight: bold; color: #000000; margin: 0 0 4px 0; text-transform: uppercase; letter-spacing: 0.5px;">
                            {{ $globalSetting->company_name ?? 'OM SARAVANABHAVA PYROTECH' }}
                        </h1>
                        
                        <!-- Address -->
                        <div style="font-size: 11px; color: #000000; font-weight: bold; margin-bottom: 6px; line-height: 1.3;">
                            {!! nl2br(e($globalSetting->address ?? 'D.No : 12/417/3, Rathinapuri Nagar, Meenampatti, Sivakasi-626189.')) !!}
                        </div>
                        
                        <!-- Contact / WhatsApp -->
                        <div style="display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: bold;">
                            @if($globalSetting && $globalSetting->phone_number)
                                <span style="display: inline-flex; align-items: center; justify-content: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#25D366" viewBox="0 0 16 16" style="vertical-align: middle; margin-right: 5px;">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.907h.003c4.368 0 7.926-3.559 7.93-7.93a7.897 7.897 0 0 0-2.326-5.645zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.69-4.98c-.202-.1-.1.195-.148-.024-.319-.16-1.89-1.097-2.002-1.14-.113-.043-.195-.065-.278.065-.082.13-.319.4-.392.483-.073.083-.146.092-.348.01A5.135 5.135 0 0 1 5.25 7.08a5.26 5.26 0 0 1-1.078-1.34c-.201-.347-.021-.534.152-.706.156-.155.348-.405.422-.508.073-.103.11-.173.165-.286.055-.113.028-.21-.013-.298-.042-.088-.372-.897-.509-1.229-.134-.325-.268-.28-.369-.285-.101-.005-.217-.005-.333-.005s-.305.044-.464.218C3.045 4.1 2.5 4.634 2.5 5.71c0 1.08.786 2.12 1.078 2.51.293.39 1.542 2.355 3.736 3.3c.523.225.93.36 1.25.463.525.167 1.003.143 1.38.087.42-.062 1.3-.532 1.484-1.047.185-.515.185-.956.13-1.047-.056-.09-.203-.142-.405-.243z"/>
                                    </svg>
                                    {{ $globalSetting->whatsapp_number ?? $globalSetting->phone_number }}
                                </span>
                            @endif
                        </div>
                    </td>
                    
                    <!-- Right: Murugan image -->
                    <td style="width: 20%; text-align: right; vertical-align: middle; border: none; padding: 0;">
                        <img src="{{ asset('assets/images/logo/lord_murugan.png') }}" alt="Lord Murugan" style="max-height: 110px; max-width: 90px; object-fit: contain;">
                    </td>
                </tr>
            </table>
        </header>

        <!-- Client Table -->
        <table class="client-table">
            <tr>
                <td class="client-info-col">
                    <table style="width: 100%; border-collapse: collapse; border: none; margin: 0;">
                        <tr>
                            <td style="width: 70px; font-weight: bold; padding: 2px 0; border: none; text-align: left;">Name</td>
                            <td style="width: 15px; padding: 2px 0; border: none; text-align: center;">:</td>
                            <td style="font-weight: bold; padding: 2px 0; border: none; text-align: left;">{{ $productord->name }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; padding: 2px 0; border: none; text-align: left; vertical-align: top;">Address</td>
                            <td style="padding: 2px 0; border: none; text-align: center; vertical-align: top;">:</td>
                            <td style="font-weight: bold; padding: 2px 0; border: none; text-align: left; vertical-align: top;">
                                {{ $productord->address }}<br>
                                {{ $productord->area_name ?? '' }}{{ $productord->area_name ? ', ' : '' }}{{ $productord->city_name ?? $productord->city }}{{ $productord->state_name ? ', ' : '' }}{{ $productord->state_name ?? $productord->state }}{{ $productord->pincode ? ' - ' . $productord->pincode : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; padding: 2px 0; border: none; text-align: left;">Contact</td>
                            <td style="padding: 2px 0; border: none; text-align: center;">:</td>
                            <td style="font-weight: bold; padding: 2px 0; border: none; text-align: left;">{{ $customer->phone_number }}</td>
                        </tr>
                    </table>
                </td>
                <td class="estimate-info-col">
                    <table style="width: 100%; border-collapse: collapse; border: none; margin: 0;">
                        <tr>
                            <td style="width: 90px; font-weight: bold; padding: 2px 0; border: none; text-align: left;">Estimate No</td>
                            <td style="width: 15px; padding: 2px 0; border: none; text-align: center;">:</td>
                            <td style="font-weight: bold; padding: 2px 0; border: none; text-align: left;">{{ $productord->oeder_id }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; padding: 2px 0; border: none; text-align: left;">Date</td>
                            <td style="padding: 2px 0; border: none; text-align: center;">:</td>
                            <td style="font-weight: bold; padding: 2px 0; border: none; text-align: left;">{{ date('d-m-Y', strtotime($productord->created_at)) }}</td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>

        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 5%;">Slno</th>
                    <th style="width: 10%;">Code</th>
                    <th style="width: 37%; text-align: left; padding-left: 10px;">Cracker name</th>
                    <th style="width: 8%;">Quantity</th>
                    <th style="width: 10%;">Rate</th>
                    <th style="width: 10%;">Acutal</th>
                    <th style="width: 8%;">Disc%</th>
                    <th style="width: 10%;">Discount</th>
                    <th style="width: 12%;">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalQty = 0;
                    $totalActual = 0;
                    $totalDiscount = 0;
                    $totalRegular = 0;
                @endphp
                @foreach ($slot as $prod)
                    @php
                        $mrp = $prod->product_mrp_price > 0 ? $prod->product_mrp_price : $prod->product_regular_price;
                        $regular = $prod->product_regular_price;
                        $lineActual = $mrp * $prod->qty;
                        $lineRegular = $regular * $prod->qty;
                        $lineDiscount = $lineActual - $lineRegular;
                        $discPercent = ($mrp > 0 && $mrp > $regular) ? round((1 - ($regular / $mrp)) * 100) : 0;
                        
                        $totalQty += $prod->qty;
                        $totalActual += $lineActual;
                        $totalDiscount += $lineDiscount;
                        $totalRegular += $lineRegular;
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ sprintf('%03d', $prod->product_id) }}</td>
                        <td style="text-align: left; padding-left: 10px;">{{ $prod->product_name }}</td>
                        <td>{{ $prod->qty }}</td>
                        <td>{{ number_format($mrp, 2) }}</td>
                        <td>{{ number_format($lineActual, 2) }}</td>
                        <td>{{ $discPercent > 0 ? $discPercent . '%' : '-' }}</td>
                        <td>{{ number_format($lineDiscount, 2) }}</td>
                        <td>{{ number_format($lineRegular, 2) }}</td>
                    </tr>
                @endforeach
                
                <!-- Summary Row inside table -->
                <tr class="summary-row">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold;">{{ $totalQty }}</td>
                    <td></td>
                    <td style="font-weight: bold; text-align: right; padding-right: 5px;">{{ number_format($totalActual, 2) }}</td>
                    <td></td>
                    <td style="font-weight: bold; text-align: right; padding-right: 5px;">{{ number_format($totalDiscount, 2) }}</td>
                    <td style="font-weight: bold; text-align: right; padding-right: 5px;">{{ number_format($totalRegular, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Totals & Rupees Table -->
        <table class="totals-table">
            <tr>
                <td class="words-col">
                    Rupees : <span id="words" style="text-transform: capitalize;"></span>Only
                </td>
                <td class="summary-col">
                    <table style="width: 100%; border-collapse: collapse; border: none; margin: 0;">
                        <tr>
                            <td style="text-align: left; font-weight: bold; padding: 3px 0; border: none;">Discount Items</td>
                            <td style="text-align: right; font-weight: bold; padding: 3px 0; border: none;">{{ number_format($totalActual, 2) }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: left; font-weight: bold; padding: 3px 0; border: none;">Discount</td>
                            <td style="text-align: right; font-weight: bold; padding: 3px 0; border: none;">{{ number_format($totalDiscount, 2) }}</td>
                        </tr>
                        @if(isset($productord->shipping) && $productord->shipping > 0)
                        <tr>
                            <td style="text-align: left; font-weight: bold; padding: 3px 0; border: none;">Shipping</td>
                            <td style="text-align: right; font-weight: bold; padding: 3px 0; border: none;">{{ number_format($productord->shipping, 2) }}</td>
                        </tr>
                        @endif
                        @if(isset($productord->discount) && $productord->discount > 0)
                        <tr>
                            <td style="text-align: left; font-weight: bold; padding: 3px 0; border: none;">Extra Discount</td>
                            <td style="text-align: right; font-weight: bold; padding: 3px 0; border: none;">{{ number_format($productord->discount, 2) }}</td>
                        </tr>
                        @endif
                        @php
                            $calculatedGrandTotal = $totalRegular + ($productord->shipping ?? 0) - ($productord->discount ?? 0);
                        @endphp
                        <tr style="border-top: 1px solid #000000;">
                            <td style="text-align: left; font-weight: bold; padding: 6px 0 0 0; font-size: 14px; border: none;">Total amount</td>
                            <td style="text-align: right; font-weight: bold; padding: 6px 0 0 0; font-size: 14px; border: none;">{{ number_format($calculatedGrandTotal, 2) }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Thank you slogan -->
        <div style="text-align: center; margin-top: 25px; font-size: 14px; font-weight: bold; color: #000000;">
            Thank you for business with us!
        </div>
    </div>

    <script>
        var a = ['', 'One ', 'Two ', 'Three ', 'Four ', 'Five ', 'Six ', 'Seven ', 'Eight ', 'Nine ', 'Ten ', 'Eleven ',
            'Twelve ', 'Thirteen ', 'Fourteen ', 'Fifteen ', 'Sixteen ', 'Seventeen ', 'Eighteen ', 'Nineteen '
        ];
        var b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

        function inWords(num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return;
            var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + ' ' :
                '';
            return str;
        }

        var a1 = "{{ number_format($calculatedGrandTotal, 2, '.', '') }}";

        console.log(a1)
        var len = a1.toString().length
        len = len - 3
        var res = a1.substring(0, len);

        document.getElementById('words').innerHTML = inWords(res);
    </script>
</body>

</html>