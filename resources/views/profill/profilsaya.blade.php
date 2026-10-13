@extends('layouts.public')
@section('Title page', 'profil saya')
@section('content')
    <div class="container-fluid m-5 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30 shadow ">
                    <div class="align-items-center gap-4 mb-4 flex-wrap text-center mt-4">
                        <img src="{{ asset('assets/images/Nazril.jpg') }}" alt="" style="width: 150px; height: 150px">
                        <hr>
                        <div class="table-wrapper table-responsive">
                        <table class="table striped-table">
                            <tbody>
                                <tr>
                                    <th >Nama </th>
                                    <td>:Nazril Alfiana</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: Kp.Leuwiseeng</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>: XII RPL 2</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>: 07 APRIL 2009</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection