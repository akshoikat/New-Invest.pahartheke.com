<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            padding: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
        }
        .card {
            background: #fff;
            border: none;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
        }
        .table {
            margin-bottom: 0;
        }
        .table thead {
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            color: white;
            font-size: 11px;
        }
        .table td, .table th {
            vertical-align: middle;
            padding: 4px 6px;
            font-size: 11px;
        }
        img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 5px;
        }
        .summary {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            font-size: 12px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
            color: #0072ff;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        @media print {
            body {
                background: none;
                -webkit-print-color-adjust: exact;
                margin: 0;
                padding: 0;
                font-size: 11px;
            }
            .card {
                box-shadow: none;
                border: none;
                page-break-inside: avoid;
            }
            .print-button {
                display: none;
            }
            table, tr, td, th {
                page-break-inside: avoid !important;
                page-break-after: auto !important;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-end mb-2">
        <button onclick="printInvoice()" class="btn btn-sm btn-primary print-button">
            🖨️ Print
        </button>
    </div>

    <div class="card" id="invoiceArea">
        <div class="text-center mb-3">
            <div class="title">INVOICE</div>
            <small class="text-muted">Thank you for your purchase!</small>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <div class="section-title">Billing Info</div>
                <p><strong>Customer: </strong> {{ $order->name }}</p>
                <p><strong>Phone: </strong>{{ $order->phone }} </p>
                <p><strong>Address: </strong>  {{$order->address}}</p>
            </div>
            <div class="col-6 text-end">
                <div class="section-title">Order Details</div>
                <p><strong>Invoice:</strong> {{ $order->order_no ?? 'N/A' }} </p>
                <p><strong>Date:</strong>{{ $order->created_at ? $order->created_at->format('d M, Y') : '' }} </p>
            </div>
        </div>

        <div class="table-responsive mb-2">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Product</th>
                        <th>Img</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>
                                <img src="{{ asset($order->product->image) }}" alt="Product Image" style="width: 80px; height: 80px; object-fit: cover;">
                            </td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->product->regular_price }} BDT</td>
                            <td>{{ $order->subtotal }} BDT</td>
                            
                        </tr>
                
                </tbody>
            </table>
        </div>

        <div class="row justify-content-end">
            <div class="col-5">
                <div class="summary">
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between mb-1">
                            <span>Subtotal: </span>
                            <span>{{$order->subtotal}} BDT</span>
                        </li>
                        <li class="d-flex justify-content-between mb-1">
                            <span>Delivery:</span>
                            <span>  {{ $order->delivery_charge }} BDT</span>
                        </li>
                        <li class="d-flex justify-content-between fw-bold">
                            <span>Total:</span>
                            <span>{{ $order->total_price }} BDT</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center mt-3">
            <small class="text-muted">Thank you for shopping with us!</small>
        </div>
    </div>
</div>

<script>
    function printInvoice() {
        window.print();
    }
</script>

</body>
</html>
