@extends('landing.layouts.app')
@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <a href="{{ route('InputKlub.index') }}" class="btn btn-success ">Tambah Klub</a>

            <div class="card p-2 mt-2 shadow " style="background-color: #D3D3D3">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Klub</th>
                            <th scope="col">Nama Kota</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($klubs as $klub)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $klub->Nama_Klub }}</td>
                            <td>{{ $klub->Kota_Klub }}</td>
                            <td>
                                <a href="{{ route('klub.edit', ['klub' => $klub->id]) }}"
                                    class="btn btn-primary">Edit</a>
                                     <!-- Tombol Delete -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $klub->id }}">
                                    Delete
                                </button>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal{{ $klub->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $klub->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $klub->id }}">Konfirmasi
                                                    Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus klub ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('klub.destroy', ['klub' => $klub->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection