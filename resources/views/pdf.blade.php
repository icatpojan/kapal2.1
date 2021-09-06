<!DOCTYPE html>
<html>

<head>
    <title>INVOICE OFFICE KAPAL PINTAR</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>

<body style=background-color: rgb(3, 3, 122)">
    <div class="card-header py-3" style="background-color: rgb(3, 3, 122)">
        <h1 style="color:white">INVOICE</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">{{ $customer_id }}</h5>
                    <p class="card-text">{{ $address }}</p>
                </div>
                <div class="col" style="text-align: right">
                    <p> Tanggal Invoice : {{ $tanggal }}</p>
                    <p> Nomer Invoice : {{ $invoice_no }}</p>
                    <p> Transfer Date : {{ $transfer_date }}</p>
                </div>
            </div>
        </div>
    </div>
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('https://office.kapalpintar.com/cetak/pdf/' . $id)) !!} ">
</body>
<style>
    @page {
        margin: 0px;
    }

    /* body {
        margin: 0px;
    } */

</style>

</html>
