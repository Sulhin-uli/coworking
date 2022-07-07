<?php $no=1; ?>
@foreach ($transaksis as $transaksi)
    <tr>
        <td>
            {{ $no++ }}
        </td>
        <td>
            {{ $transaksi->nik }}
        </td>
        <td>
            {{ $transaksi->nama }}
        </td>
        <td>
            {{ $transaksi->alamat }}
        </td>
        <td>
            {{ $transaksi->no_telp }}
        </td>
        <td>
            {{ $transaksi->detail_tempat }}
        </td>
        <td>
            {{ $transaksi->harga }}
        </td>
        <td>
            {{ $transaksi->tanggal_pemesanan }}
        </td>
     
    </tr>
@endforeach

