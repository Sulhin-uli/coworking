<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
        <thead>
            <tr>
            <td>NIK</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Nomor Telepon</td>
            <td>Detail Tempat</td>
            <td>Tanggal Pemesanan</td>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggan as $pelanggan)
            <tr>
                <td>#{{$pelanggan->nik}}</td>
                <td>{{$pelanggan->nama}}</td>
                <td>{{$pelanggan->alamat}}</td>
                <td>{{$pelanggan->no_telp}}</td>
                <td>{{$pelanggan->detail_tempat}}</td>
                <td>{{$pelanggan->tanggal_pemesanan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>