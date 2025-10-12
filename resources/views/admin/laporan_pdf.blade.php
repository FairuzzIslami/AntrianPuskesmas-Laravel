<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemeriksaan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #c8e6c9; }
        h2 { text-align: center; color: #2e7d32; }
    </style>
</head>
<body>
    <h2>Laporan Pemeriksaan Dokter</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Nama Pasien</th>
                <th>Diagnosa</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Tekanan Darah</th>
                <th>Suhu Tubuh</th>
                <th>Detak Jantung</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $l)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $l->dokter->name ?? '-' }}</td>
                <td>{{ $l->nama_pasien }}</td>
                <td>{{ $l->diagnosa }}</td>
                <td>{{ \Carbon\Carbon::parse($l->tanggal_pemeriksaan)->format('d-m-Y H:i') }}</td>
                <td>{{ $l->tekanan_darah }}</td>
                <td>{{ $l->suhu_tubuh }}</td>
                <td>{{ $l->detak_jantung }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
