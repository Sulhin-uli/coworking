<?php $no=1; ?>
@foreach ($beritas as $berita)
    <tr>
        <td>
            {{ $no++ }}
        </td>
        <td>
            {{ $berita->judul }}
        </td>
        <td>
            {{ $berita->isi }}
        </td>
        <td>
            {{ $berita->created_at }}
        </td>
        <td>
            <button class="btn btn-danger btn-sm" onclick="hapus({{ $berita->id }})">Hapus</button>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalFormEdit" onclick="edit({{ $berita->id }})">Edit</button>
        </td>
    </tr>
@endforeach

