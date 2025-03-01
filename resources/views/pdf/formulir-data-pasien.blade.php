<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Data Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            padding: 20px;
            margin: auto;
        }
        h2 {
            text-align: left;
            border-left: 5px solid red;
            padding-bottom: 5px;
            padding-left: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
        }
        td {
            padding: 5px;
        }
        .section-title {
            font-weight: bold;
            color: red;
        }
        .checkbox-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }
        .checkbox-group label {
            font-weight: bold;
        }
        .signature {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            border: 1px solid red;
            padding: 10px;
            width: 45%;
            font-size: 12px;
        }
        .signature div p {
            margin: 0;
        }
    </style>
</head>
<body>
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

        <strong style="color: red;">Relawan Pendamping:</strong><br>
        <table style="border: 1px solid red; color: red;">
            <tr>
                <td style="border-right: 1px solid red;"><strong>Nama:</strong> {{ $data->relawan_pendamping->relawan->name }}</td>
                <td style="text-align: center;">Tanda tangan relawan pendamping</td>
            </tr>
            <tr>
                <td style="border-right: 1px solid red;"><strong>No. Anggota:</strong> {{ $data->relawan_pendamping->no_anggota }}</td>
                <td></td>
            </tr>
            <tr>
                <td style="border-right: 1px solid red;"></td>
                <td style="text-align: center;">(____________________)</td>
            </tr>
    </div>
</body>
</html>
