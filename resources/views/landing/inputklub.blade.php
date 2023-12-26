@extends('landing.layouts.app')
@section('content')

<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card p-3 shadow" style="background-color: #D3D3D3">
                <form action="{{ route('klub.store') }}" method="post">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="Nama_Klub" class="form-label">Nama Klub</label>
                        <input type="text" class="form-control" id="Nama_Klub" name="Nama_Klub">
                        @error('Nama_Klub')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Kota_Klub" class="form-label">Kota Klub</label>
                        <input type="text" class="form-control" id="Kota_Klub" name="Kota_Klub">
                        @error('Kota_Klub')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection