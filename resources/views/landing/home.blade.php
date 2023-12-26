@extends('landing.layouts.app')
@section('content')
<style>
.carousel-item img {
    opacity: 0.6;
}

.nav-icon {
    background: #1b1b1b;
    width: 3.8rem;
    height: 3.8rem;
    border-radius: 50%;
    border: 0;
    opacity: 0.7;
    text-shadow: none;
    color: #fff;
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
}

.nav-icon:hover {
    background-color: #000;
    opacity: 1.0;
    transition: all ease 0.2s;
    color: #fff;
}

.carousel-indicators li {
    border-radius: 50%;
    width: .8rem;
    height: .8rem;
    background: transparent;
    border: solid 2px #1b1b1b;
}

.score-table {
    border-collapse: collapse;
    width: 80%;
    margin: 2% auto;
}

.score-table th,
.score-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

.score-table th {
    background-color: #f2f2f2;
}

.score-table tr:nth-child(even) {
    background-color: #f9f9f9;
}
</style>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="/images/gambar2.jpg" alt="First slide">

        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/images/gambar3.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="/images/gambar2.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <div class="nav-icon">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </div>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <div class="nav-icon">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </div>
    </a>
</div>
<section class="bg-gray-200 py-2">
    <div class="container">
        <span class="badge text-black fs-3"> Profil Team </span>
        <div class="row">
            @foreach($klubs as $klub)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">


                    <img src="https://upload.wikimedia.org/wikipedia/id/4/4d/Logo_persekat_kabupaten_tegal_2015ok.png"
                        class="card-img-top" alt="Default Image">

                    <div class="card-body">
                        <h5 class="card-title text-gray-900 font-medium">{{ $klub->Nama_Klub }}</h5>
                        <p class="card-text">{{ $klub->Kota_Klub }}</p>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<div class="container">
    <h1 class="mt-5">Skor Pertandingan</h1>

    <table class="score-table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Tim A</th>
                <th>Skor A</th>
                <th>Skor B</th>
                <th>Tim B</th>
            </tr>
        </thead>
        <tbody>
            @foreach($score as $match)
            <tr>
                <td>{{ $match->tanggal }}</td>
                <td>{{ $match->tim_a }}</td>
                <td>{{ $match->skor_a }}</td>
                <td>{{ $match->skor_b }}</td>
                <td>{{ $match->tim_b }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection