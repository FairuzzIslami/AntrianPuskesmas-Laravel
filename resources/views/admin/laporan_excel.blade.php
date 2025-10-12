<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Dokter</th>
            <th>Nama Pasien</th>
            <th>Diagnosa</th>
            <th>Tanggal Pemeriksaan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->dokter->nama ?? '-' }}</td>
                <td>{{ $data->nama_pasien }}</td>
                <td>{{ $data->diagnosa }}</td>
                <td>{{ $data->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
