<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Data Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            position: relative;
            font-size: 18px;
        }
        .container {
            width: 100%;
            padding: 20px;
            margin: auto;
            position: relative;
            z-index: 1;
        }
        h2 {
            text-align: left;
            border-left: 5px solid red;
            padding-left: 10px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 8px;
            vertical-align: top;
        }
        .section-title {
            font-weight: bold;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70%;
            opacity: 0.1;
            z-index: -1;
        }
        .red-box {
            border: 1px solid red;
            padding: 10px;
            color: red;
            font-weight: bold;
        }
        .red-box td {
            border-right: 1px solid red;
            padding: 10px;
        }
    </style>
</head>
<body>
    <img src="{{ public_path('images/watermark.png') }}" class="watermark">

    <div class="container">
        <h2>Formulir Data Pasien</h2>
        <table>
            <tr>
                <td width="31%">Nama</td><td>: {{ $data->pasien->name }}</td>
            </tr>
            <tr>
                <td>NIK</td><td>: {{ $data->pasien->nik }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td><td>: {{ $data->pasien->tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>Alamat</td><td>: {{ $data->pasien->alamat . " No." . $data->pasien->no_alamat . ", " . $data->pasien->desa->nama . ", " . $data->pasien->kecamatan->nama . ", " . $data->pasien->kabupaten->nama }}</td>
            </tr>
            <tr>
                <td>Keluarga Pendamping</td><td>: {{ $data->keluarga_pendamping->name }}</td>
            </tr>
            <tr>
                <td>No. HP</td><td>: {{ $data->keluarga_pendamping->no_telp }}</td>
            </tr>
        </table>

        <table>
            <tr>
                <td><label><input type="checkbox" {{ $data->jenis_layanan_id == 1 ? 'checked' : '' }}> <strong>IRD</strong></label></td>
                <td><label><input type="checkbox" {{ $data->jenis_layanan_id == 2 ? 'checked' : '' }}> <strong>IRJA</strong></label></td>
                <td><label><input type="checkbox" {{ $data->jenis_layanan_id == 3 ? 'checked' : '' }}> <strong>IRNA</strong></label></td>
            </tr>
        </table>

        <table>
            <tr>
                <td width="31%">Tanggal Masuk</td><td>: {{ $data->tanggal_masuk }}</td>
            </tr>
            <tr>
                <td>Jam Masuk</td><td>: {{ $data->jam_masuk }}</td>
            </tr>
            <tr>
                <td>Rujukan dari</td><td>: {{ $data->rujukan->nama }}</td>
            </tr>
            <tr>
                <td>Diagnosa</td><td>: {{ $data->diagnose }}</td>
            </tr>
            <tr>
                <td>Status Jaminan</td><td>: {{ $data->status_jaminan }}</td>
            </tr>
            <tr>
                <td>Tujuan Poli</td><td>: {{ $data->poli }}</td>
            </tr>
            <tr>
                <td>Ruangan/Kamar</td><td>: {{ $data->ruangan }}</td>
            </tr>
            <tr>
                <td>Keterangan tambahan</td><td>: {{ $data->keterangan }}</td>
            </tr>
        </table>
        <br>

        <p style="color: red; font-weight: bold;">Relawan Pendamping:</p>
        <table class="red-box">
            <tr>
                <td width="50%">Nama : {{ $data->relawan_pendamping->relawan->name }}</td>
                <td style="text-align: center;">Tanda tangan relawan pendamping:</td>
            </tr>
            <tr>
                <td>No. Anggota : {{ $data->relawan_pendamping->no_anggota }}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;">(____________________)</td>
            </tr>
        </table>
    </div>
</body>
</html>
