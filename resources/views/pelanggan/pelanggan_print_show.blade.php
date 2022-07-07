<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BUKTI PEMESANAN</title>
    <style>
        #tabel
        {
        font-size:15px;
        border-collapse:collapse;
        }
        #tabel  td
        {
        padding-left:5px;
        border: 1px solid black;
        }
        </style>
</head>
<body>
  <center>
    <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
        <thead>
            <tr>
            <td width='20%'>NIK</td>
            <td width='20%'>Nama</td>
            <td width='20%'>Alamat</td>
            <td width='20%'>Nomor Telepon</td>
            <td width='20%'>Detail Tempat</td>
            <td width='20%'>Tanggal Pemesanan</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width='20%'>#{{$pelanggan->nik}}</td>
                <td width='20%'>{{$pelanggan->nama}}</td>
                <td width='20%'>{{$pelanggan->alamat}}</td>
                <td width='20%'>{{$pelanggan->no_telp}}</td>
                <td width='20%'>{{$pelanggan->detail_tempat}}</td>
                <td width='20%'>{{$pelanggan->tanggal_pemesanan}}</td>
            </tr>
            </table>
        </tbody>
    </table>
  </center>
    <script>
        window.print();
    </script>
</body>
</html>