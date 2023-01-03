<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alvine Ecommerce Invoice Page</title>
    <style>
        body {
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }

        .brand-section {
            background-color: #0d1033;
            padding: 10px 40px;
        }


        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .text-white {
            color: #fff;
        }

        .company-details {
            float: right;
            text-align: right;
        }

        .body-section {
            padding: 16px;
            border: 1px solid gray;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }

        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table td {
            vertical-align: middle !important;
            text-align: center;
        }

        table th,
        table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

        .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .text-right {
            text-align: end;
        }

        .w-20 {
            width: 20%;
        }

        .float-right {
            float: right;
        }
    </style>
</head>

<body>

    <div style="margin-top: 1.5rem; margin-bottom:1.5rem; !important;" class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Alvine Ecommerce</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Location: Kenyatta Avenue, Alvine Building, Room 206</p>
                        {{-- <p class="text-white"> </p> --}}
                        <p class="text-white">Email: alvineecommerce.info@co.ke</p>
                        <p class="text-white">Phone: +254712345678</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: {{ $order->id }}</h2>
                    <p class="sub-heading">Tracking No. {{ $order->tracking_number }} </p>
                    <p class="sub-heading">Order Date: {{ $order->created_at->format('d-m-Y h:i a') }} </p>
                    <p class="sub-heading">Email Address: {{ $order->email }} </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Full Name: {{ $order->fullname }} </p>
                    <p class="sub-heading">Address: {{ $order->address }} </p>
                    <p class="sub-heading">Phone Number: {{ $order->phone_number }} </p>
                    <p class="sub-heading">City,State,Pincode: {{ $order->pincode }} </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Color</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalCash = 0;
                    @endphp
                    @forelse ($order->orderItems as $od)
                        <tr>
                            <td>{{ $od->products->name }}</td>
                            <td>{{ $od->productColors?->colors?->name }}</td>
                            <td>{{ $od->price }}</td>
                            <td>{{ $od->quantity }}</td>
                            <td>${{ $od->price * $od->quantity }}</td>
                        </tr>
                        @php
                            $totalCash += $od->quantity * $od->price;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="5">No Items Found</td>
                        </tr>
                    @endforelse                        
                        
                    <tr>
                        <td colspan="4" class="text-right">Sub Total</td>
                        <td> ${{ $totalCash }}</td>
                    </tr>
                    <tr>
                        @php
                            $total_tax = (2 / 100) * $totalCash;
                        @endphp
                        <td colspan="4" class="text-right">Tax Total 2%</td>
                        <td> ${{ $total_tax }}</td>
                    </tr>
                    <tr>
                        @php
                            $total_Price = $totalCash - $total_tax;
                        @endphp
                        <td colspan="4" class="text-right">Grand Total</td>
                        <td> ${{ $total_Price }}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: {{ $order->payment_id }}</h3>
            <h3 class="heading">Payment Mode: {{ $order->payment_mode }}</h3>
        </div>
        <div class="body-section">
            <p>&copy; Copyright {{ now()->format('Y') }} - AlvineEcom. All rights reserved.
                <a href="https://github.com/alvine2200.git" class="float-right">www.github.com/alvine2200.git</a>
            </p>
        </div>
    </div>

</body>

</html>
