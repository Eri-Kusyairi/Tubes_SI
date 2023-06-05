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
            border-collapse: collapse;
        }
        
        .invoice-table th, .invoice-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        
        .invoice-table thead {
            background-color: #f9f9f9;
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
    <h1>Data mapel Kelas</h1>
    <table class="invoice-table">
        <thead>
            <tr>
                <th>id_mapel</th>
                <th>Nama_Mapel</th>
                <th>namainstruktur</th>
                <th>id_jenisdiklat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel as $item)
                <tr>
                    <td>{{ $item->id_mapel }}</td>
                    <td>{{ $item->Nama_Mapel }}</td>
                    <td>{{ $item->namainstruktur }}</td>
                    <td>{{ $item->id_jenisdiklat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="notes">
        <p>Note: Data Mata Pelajaran.</p>
    </div>
</body>
</html>