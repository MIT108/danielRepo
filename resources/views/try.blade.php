<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            margin-top: 20px;
            color: #2e323c;
            position: relative;
            height: 100%;
        }

        .invoice-container {
            padding: 1rem;
        }

        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #2e323c;
        }

        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }

        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #9fa8b9;
            margin: 0;
        }

        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
        }
        .invoice-container .invoice-details2 {
            background: #f5f6fa;
        }
        .invoice-container .invoice-details .invoice-num {
            text-align: right;
            font-size: 0.8rem;
        }

        .invoice-num-left {
            text-align: left;
            font-size: 0.8rem;
        }

        .invoice-num-center {
            text-align: center;
            font-size: 0.8rem;
        }

        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }

        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #ffffff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }

        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #9fa8b9;
        }

        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }

        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #f5f6fa;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }

        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }


        .custom-table {
            border: 1px solid #e0e3ec;
            width: 100%;
        }

        .custom-table thead {
            background: #007ae1;
        }

        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }

        .custom-table>tbody tr:hover {
            background: #fafafa;
        }

        .custom-table>tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }

        .custom-table>tbody td {
            border: 1px solid #e6e9f0;
        }


        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .text-success {
            color: #00bb42 !important;
        }

        .text-muted {
            color: #9fa8b9 !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
        }
        table {border: none;}
    </style>
</head>

<body>
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-header">
                                <!-- Row start -->
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <a href="index.html" class="invoice-logo">
                                            {{ env('MAIL_SENDER_NAME') }}
                                        </a>
                                    </div>
                                </div>
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-6">
                                        <table class="table custom-table m-0" style="border: none !important;">
                                            <tbody>
                                                <tr style="border: none !important;">
                                                    <td style="border: none !important;">
                                                        <div class="invoice-details">
                                                            <div class="invoice-num-left">
                                                                    <img  width="100px" height="100px" src="{{ $fields['image'] }}"
                                                                        alt="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border: none !important;">
                                                        <div class="invoice-details">
                                                            <div class="invoice-num-center">
                                                                <h2 style=" border-radius: 5px;
                                                                background-color: rgb(207, 232, 220);
                                                                border: 2px solid rgb(79, 185, 227)">Cidra Medical booklet</h2>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border: none !important;">

                                                        <div class="invoice-details">
                                                            <div class="invoice-num">
                                                                <div>{{ $fields['name'] }}</div>
                                                                <div>{{ $fields['email'] }}</div>
                                                                <div>{{ $fields['contact'] }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- Row end -->
                            </div>
                            <div class="invoice-body">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0" style="border: none !important;">
                                                <tbody style="border: none !important;">
                                                    <tr style="border: none !important;">
                                                        <td style="border: none !important;">
                                                            <article style="grid-area: content;
                                                            border: 1px solid black;
                                                            padding: 10px;">
                                                                <h1>{{ $fields['heading'] }}</h1>
                                                                <p>{{ $fields['body'] }}</p>

                                                            </article>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gutters">
                                    <div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-6">
                                        <table class="table custom-table m-0" style="border: none !important;">
                                            <tbody style="border: none !important;">
                                                <tr style="border: none !important;">
                                                    <td style="border: none !important;">
                                                        <div class="invoice-details">
                                                            <div class="invoice-num-center">
                                                                <h2 style=" border-radius: 5px;
                                                                background-color: rgb(207, 232, 220);
                                                                border: 2px solid rgb(79, 185, 227)">Contact: Awae, Escalier Yaounde Cameroon</h2>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border: none !important;">
                                                        <div class="invoice-details">
                                                            <div class="invoice-num-left">
                                                            </div>
                                                        </div>
                                                    </td style="border: none !important;">
                                                    <td style="border: none !important;">
                                                        <div class="invoice-details">
                                                            <div class="invoice-num-left">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border: none !important;">
                                                        <div class="invoice-details">
                                                            <div class="invoice-num-left">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border: none !important;">
                                                        <div class="invoice-details">
                                                            <div class="invoice-num-left">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- Row end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
