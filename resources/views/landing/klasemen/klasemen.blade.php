@extends('landing.layouts.app')
@section('content')

<style type="text/css">

.demo-table {
    border-collapse: collapse;
    font-size: 14px;
    margin-left: 5%;
    font: bold;
    border: 2px solid #353535;
    font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";

}


.demo-table thead th {
    background-color: #508abb;
    color: #FFFFFF;
    border: 2px solid #6ea1cc !important;
    text-transform: uppercase;
}


.demo-table tbody td {
    color: #353535;
    border: 2px solid #e1edff;
}

/* Table Footer */
.demo-table tfoot th {
    background-color: #e5f5ff;
    border: 2px solid #e1edff;
}


.demo-table th {
    text-align: center;
}

.demo-table td {
    border: 2px solid #e1edff;
    padding: 13px 25px;
}

.demo-table .title {
    caption-side: bottom;
    margin-top: 12px;
}


.demo-table thead th {
    background-color: #508abb;
    color: #FFFFFF;
    border-color: #6ea1cc !important;
    text-transform: uppercase;
}


.demo-table tbody td {
    color: #353535;
}

.demo-table tbody td:first-child,
.demo-table tbody td:last-child,
.demo-table tbody td:nth-child(4) {
    text-align: center;
}

.demo-table tbody tr:nth-child(odd) td {
    background-color: #f4fbff;
}

.demo-table tbody tr:hover td {
    background-color: #ffffa2;
    border-color: #ffff0f;
    transition: all .2s;
}

/* Table Footer */
.demo-table tfoot th {
    background-color: #e5f5ff;
}

.demo-table tfoot th:first-child {
    text-align: left;
}

.demo-table tbody td:empty {
    background-color: #ffcccc;
}
</style>

<body style=" background-color:linen;">
    <h1 style="margin-left: 15%;margin-top: 5%;">Klasemen</h1>

    <table class="demo-table">
        <thead>
            <tr>
                <th>Tim</th>
                <th>Main</th>
                <th>Menang</th>
                <th>Seri</th>
                <th>Kalah</th>
                <th>Gol Masuk</th>
                <th>Gol Kebobolan</th>
                <th>Selisih Gol</th>
                <th>Poin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($klasemen as $item)
            <tr>
                <td>{{ $item->nama_tim }}</td>
                <td>{{ $item->main }}</td>
                <td>{{ $item->menang }}</td>
                <td>{{ $item->seri }}</td>
                <td>{{ $item->kalah }}</td>
                <td>{{ $item->gol_masuk }}</td>
                <td>{{ $item->gol_kebobolan }}</td>
                <td>{{ $item->selisih_gol }}</td>
                <td>{{ $item->poin }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection