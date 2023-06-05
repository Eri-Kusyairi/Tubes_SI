<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Export PDF</title>
    <style>
      @page {
            size: landscape;
        }
        
        body {
    font-family: 'Courier New', monospace;
    background-color: #f4f4f4;
    margin: 0;
    padding: 10px;
}
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        
        .invoice-table {
    width: 100%;
    table-layout: fixed;
}

.invoice-table thead {
    background-color: #f9f9f9;
}
        
        .invoice-table th, .invoice-table td {
            padding: 10px;
            border: 1px solid #ddd;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .invoice-table tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        .invoice-table th {
            background-color: #333;
            color: #fff;
            text-align: left;
        }
        
        .invoice-table td:first-child {
            font-weight: bold;
        }
        
        .highlight {
            background-color: #ffd700;
        }
        
        .total-row td {
            font-weight: bold;
        }
        
        .notes {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <h1>Data Peserta Dikat</h1>
    <table class="invoice-table">
        <thead>
            <tr>
                <th>Id_siswa</th>
                <th>Nama_siswa</th>
                <th>periode_diklat</th>
                <th>email</th>
                <th>Alamat</th>
                <th>no_hp</th>
                <th>Gender</th>
                <th>Namaortu</th>
                <th>Pekerjaanortu</th>
                <th>Penghasilan</th>
                <th>id_jenisdiklat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Daftar as $item)
                <tr>
                    <td>{{ $item->Id_siswa }}</td>
                    <td>{{ $item->Nama_siswa }}</td>
                    <td>{{ $item->periode_diklat }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->Alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->Gender }}</td>
                    <td>{{ $item->Namaortu }}</td>
                    <td>{{ $item->Pekerjaanortu }}</td>
                    <td>{{ $item->Penghasilan }}</td>
                    <td>{{ $item->id_jenisdiklat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="notes">
        <p>Note: Data Peserta Dikat</p>
    </div>
</body>
</html>