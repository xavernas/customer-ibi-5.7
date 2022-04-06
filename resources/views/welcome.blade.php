@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Halaman Sambutan</div>

                <div class="card-body">
                    @guest
                    Selamat Datang, silahkan masuk untuk menggunakan fitur ini!
                    @else
                    Silahkan menggunakan Fasilitas Pencarian Pelanggan!
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
