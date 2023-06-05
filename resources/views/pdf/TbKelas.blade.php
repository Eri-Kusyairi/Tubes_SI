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
    <h1>Data Jenis Kelas</h1>
    <table class="invoice-table">
        <thead>
            <tr>
                <th>id_kelas</th>
                <th>id_instruktur</th>
                <th>id_mapel</th>
                <th>id_jenisdiklat</th>
                <th>Id_siswa</th>
                <th>hari</th>
                <th>jumlahjam</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($TbKelas as $item)
                <tr>
                    <td>{{ $item->id_kelas }}</td>
                    <td>{{ $item->id_instruktur }}</td>
                    <td>{{ $item->id_mapel }}</td>
                    <td>{{ $item->id_jenisdiklat }}</td>
                    <td>{{ $item->Id_siswa }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->jumlahjam }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="notes">
        <p>Note: Data Jenis Kelas.</p>
    </div>
</body>
</html>