<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <style type="text/css">
        @media print {
            @page {
                size: A4 potrait;
                margin: 2mm;
            }

            html,
            body,
            div.page {
                margin: 0;
                box-shadow: 0;
                padding: 0px;
            }

            div.page {
                box-shadow: 0 0 0 #fff !important;
                width: 93% !important;
                height: 100% !important;
            }

            table {
                width: 100%;
            }

            table.table,
            h4 {
                font-size: 9px !important;
            }

            .btn-back {
                display: none;
            }

            body {
                -webkit-print-color-adjust: exact;
            }

            * {
                margin: 5px;
                padding: 0px;
            }
        }

        body {
            background: rgb(204, 204, 204);
        }

        div.page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
            width: 24cm;
            min-height: 15cm;
            padding: 15px;
        }

        * {
            margin: 5px;
            padding: 0px;
        }

        html {
            font-family: sans-serif;
            font-size: 9.5px;
            font-weight: 300;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        body {
            margin: 0px;
        }

        #logo {
            border: 1px solid #ddd;
            min-height: 100px;
        }

        table {
            width: 100%;
            margin: 0px;
        }

        #userId {
            border: 1px solid #ddd;
            min-height: 200px;
            clear: both;
            display: block;
        }

        #invoice {
            background: black;
            color: white;
            font-weight: bold;
            padding: 3px;
            text-align: center;
        }

        table.table {
            font-size: 9px;
            /*font-weight: 500;*/
            padding: 3px;
            border-collapse: collapse;
        }

        table.table>thead tr {
            color: black;
            font-weight: bold;
            background: #eee;
            border: thin solid black;
        }

        table.table>tbody tr td,
        table.table>thead tr td {
            border: thin solid black;
            border-bottom: 0px;
            border-right: 0px;
            padding: 2px;
        }

        table.table>tbody tr>td:last-child {
            text-align: right;
        }

        table.table>tbody tr:last-child td {
            border-bottom: thin solid black;
        }

        table.table>tbody tr td:last-child,
        table.table thead tr td:last-child {
            border-right: thin solid black;
        }

        table.table ul {
            margin: 10px 0px;
            margin-left: 10px;
            list-style: none;
        }

        table.table ul li:before {
            content: " - ";
        }

        table#totalPembayaran {
            width: 100%;
            padding: 5px;
        }

        table#totalPembayaran>tr td {
            text-align: right;
        }

        table#totalPembayaran>tr td:last-child {
            border: 1px solid black;
            background: #eee;
        }

        #InvoiceLabel {
            font-weight: bold;
            color: white;
            background: black;
            text-align: center;
            font-size: 18px;
            margin-top: 8px;
            padding: 5px;
        }

        .InvoiceNo {
            font-size: 16px;
            font-weight: bold;
        }

        #InvoiceNo {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .table tr td {
            padding: 0px;
            margin: 0px;
        }

        #InvoiceDate {
            text-align: center;
            text-align: center;
            font-size: 14px;
        }

        #detailCustomer {
            background: black;
            color: white;
            padding: 5px;
            padding-top: 10px;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }

        #CustomerDetail {
            background: black;
            color: white;
            padding: 5px;
            width: 30%;
            font-weight: bold;
        }

        table.subHeader {
            margin: 10px 0px;
        }

        .btn-back {
            text-decoration: none;
            padding: 10px;
            background: #f44336;
            color: white;
            font-size: 12px;
            float: right;
        }

        #content {
            display: table;
        }

        #pageFooter {
            display: table-footer-group;
        }

        #pageFooter:after {
            counter-increment: page;
            content: "Page "counter(page);
            left: 0;
            top: 100%;
            white-space: nowrap;
            z-index: 20px;
            -moz-border-radius: 5px;
            -moz-box-shadow: 0px 0px 4px #222;
            background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
            background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
        }

        body {
            counter-reset: section;
            text-align: justify;
        }

        header {
            padding: 0px;
            margin: 0px;
        }

        header img {
            display: inline-block;
            width: 60px;
            margin-right: 10px;
            vertical-align: top;
        }

        header div {
            display: inline-block;
            vertical-align: top;
            margin-top: 10px;
        }

        header div h3 {
            margin-bottom: 2px;
        }

        header div p {
            font-size: 10px !important;
            text-transform: uppercase;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .lineinvoice {
            background: #1e1e78;
            text-align: right;
            margin: 0px 0px 10px 0px;
        }

        .lineinvoice div {
            position: relative;
            text-align: right;
            display: flex;
            justify-content: flex-end;
            padding-right: 85px;
        }

        .lineinvoice div h2 {
            right: 0px;
            background: #fff;
            width: 280px;
            text-align: center;
            font-weight: 300;
            font-size: 1.5em;
            margin: 0px;
        }

        .bg-green {
            background-color: #11C26D;
            color: #fff;
        }

        .bg-danger {
            background-color: #ff4c52;
            color: #fff;
        }

        .text-danger {
            color: red;
        }

        .text-success {
            color: green;
        }

        .font-weight-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="page">
        <a href="<?= site_url('laporan') ?>" class="btn-back">KEMBALI</a>
        <header>
            <img src="<?= base_url('assets') ?>/images/logo.png" alt="logo" width="50">
            <div>
                <h2>PT. Yamaha Electronics Manufacturing Indonesia</h2>
                <p>CHECK SHEET PROSES LUX METER</p>
                <p>STANDART 800 +/- 200</p>
                <p>( CHECK DIJAWALKAN SETIAP AWAL BULAN  MINGGU PERTAMA )</p>
            </div>
        </header>
        <div class="lineinvoice">
            <div>
                <h2>LAPORAN DETAIL INSPEKSI</h2>
            </div>
        </div>
        <div style="margin: 0px;">
        	<table class="table" style="max-width: 250px;">
        		<tbody>
        			<tr>
        				<td style="border: 0px;">Periode</td>
        				<td style="border: 0px;text-align: left;">: <?=(!empty($laporan['tgl_input']) ? date('d/m/Y', strtotime($laporan['tgl_input'])) : '')?></td>
        			</tr>
        		</tbody>
        	</table>
        	<br />
            <table class="table table-striped table-bordered" cellpadding="2" cellspacing="0" style="">
                <thead>
                    <tr style="background:#dadade;">
                        <th style="padding: 5px; border: 1px solid black;">Area</th>
                        <th style="padding: 5px; border: 1px solid black;">Operator</th>
                        <th style="padding: 5px; border: 1px solid black;">Tgl Input</th>
                        <th style="padding: 5px; border: 1px solid black;">Hasil Inspeksi</th>
                        <th style="padding: 5px; border: 1px solid black;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (!empty($laporan)) {
                            foreach ($laporan['detail'] as $ky => $vl) {
                                echo '<tr>
                                    <td>' . $vl['area'] . '</td>
                                    <td>' . $vl['name'] . '</td>
                                    <td style="text-align:center;">' . (!empty($vl['tgl_update']) ? date('d M Y', strtotime($vl['tgl_update'])) : '') . '</td>
                                    <td style="text-align:center;">' . $vl['actual'] . '</td>
                                    <td class="'.($vl['judge'] == 'OK' ? 'text-success' : 'text-danger').' font-weight-bold" style="text-align:center;">' . $vl['judge'] . '</td>
                                </tr>';
                            }
                        } else {
                            echo '<tr>
                                    <td colspan="5" style="text-align:center;">Data tidak ditemukan</td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </div>
</body>

</html>