<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title> Kartu Anggota Relawan Pendamping </title>
    <style>
        @page {
            size: 9cm 5.5cm; /* Ukuran kartu */
            margin: 0;
        }
        body {
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            /* height: 100vh; */
        }
        .card {
            width: 8.5cm;
            height: 5cm;
            background-color: #aefcf6;
            border: 2px solid black;
            padding: 10px;
            font-family: Arial, sans-serif;
            font-size: 12px;
            position: relative;
            page-break-inside: avoid; /* Mencegah kartu terpotong */
        }
        .title {
            font-weight: bold;
            font-size: 14px;
        }
        .qr-code {
            position: absolute;
            bottom: 25px;
            right: 25px;
            width: 50px;
            height: 50px;
            /* background-color: rgb(255, 255, 255);
            color: white; */
            text-align: center;
            line-height: 50px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="title">Kartu Anggota<br>Relawan Pendamping</div><br>
        <table style="width: 100%; font-size: 12px; border-collapse: collapse;">
            <tr>
                <td width="100px"><strong>No Anggota</strong></td>
                <td>: {{ $relawan->no_anggota }}</td>
            </tr>
            <tr>
                <td><strong>NIK</strong></td>
                <td>: {{ $relawan->nik_relawan }}</td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>: {{ $relawan->relawan->name }}</td>
            </tr>
            <tr>
                <td><strong>Alamat</strong></td>
                <td>: {{ $relawan->relawan->alamat . " No." . $relawan->relawan->no_alamat . ", " . $relawan->relawan->desa->nama . ", " . $relawan->relawan->kecamatan->nama . ", " . $relawan->relawan->kabupaten->nama }}</td>
            </tr>
            <tr>
                <td><strong>No Telp</strong></td>
                <td>: {{ $relawan->relawan->no_telp }}</td>
            </tr>
            <tr>
                <td><strong>Jabatan</strong></td>
                <td>: {{ $relawan->jabatan }}</td>
            </tr>
        </table>
        <div class="qr-code">
            {{-- QR CODE --}}
            {{-- {!! QrCode::size(60)->generate("TESTING") !!} --}}
            {!! QrCode::size(60)->generate( route('filament.dashboard.resources.relawans.kartu-anggota', $relawan->id) ) !!}
        </div>
    </div>
</body>
</html>
