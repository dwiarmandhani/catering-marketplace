<!-- resources/views/invoice.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Invoice {{ $order->invoice }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px;
        }
        .invoice h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <h1>Invoice {{ $order->invoice }}</h1>
        <p>Nama Menu: {{ $order->menu->name }}</p>
        <p>Jumlah: {{ $order->quantity }}</p>
        <p>Total Harga: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
        <p>Tanggal Pengiriman: {{ $order->delivery_date }}</p>
        <p>Status: {{ $order->status }}</p>
    </div>
</body>
</html>
