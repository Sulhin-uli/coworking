<?php $no=1; ?>
@foreach ($riwayats as $riwayat)
    <tr>
        <td>
            {{ $no++ }}
        </td>
        <td>
            {{ $riwayat->nik }}
        </td>
        <td>
            {{ $riwayat->nama }}
        </td>
        <td>
            {{ $riwayat->alamat }}
        </td>
        <td>
            {{ $riwayat->no_telp }}
        </td>
        <td>
            {{ $riwayat->detail_tempat }}
        </td>
        <td>
            {{ $riwayat->harga }}
        </td>
        <td>
            {{ $riwayat->tanggal_pemesanan }}
        </td>
    </tr>
@endforeach

