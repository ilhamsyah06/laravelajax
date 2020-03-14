@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4>Laravel Form Ajax Autofill</h4>
            </div>
            <div class="panel panel-body">

                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control">
                        <input type="hidden" id="nikasli" name="nikasli">
                    </div>
                    <div class="form-group">
                        <label for="">NOMOR KTP</label>
                        <input type="text" id="noktp" name="noktp" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">NOMOR PASPOR</label>
                        <input type="text" id="nopaspor" name="nopaspor" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">NAMA LENGKAP</label>
                        <input type="text" id="nama" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">JENIS KELAMIN</label>
                        <input type="text" id="kelamin" name="kelamin" class="form-control">
                    </div>

                    <div class="form-group">
                        <a href="" class="btn btn-primary" type="submit">Submit</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h3>List Data Hobi</h3>
                </div>
                <div class="panel panel-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>HOBI</th>
                            <th>NAMA USER</th>
                            <th>EMAIL</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($hobi as $item)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_hobi }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

        <script>
    $(document).ready(function () {
                    //--- Pencarian Barang ketik ajax--//
        var timer; //variabel timer

            $('#nik').on('keydown', function (evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode == 13) {
                    clearTimeout(timer);
                }
            }).on('keyup', function (e) {
                timer = setTimeout(function () {
                    //alert disini
                    var keywords = $('#nik').val(); //variabel keyword
                
                    if (keywords.length > 0) {
                    
                        $.get('/finddata/cari/' + keywords, function (res) {
                            if (res.nik == null) {
                                $('#noktp').val('Data Tidak ditemukan');
                                $('#nopaspor').val('Data Tidak ditemukan');
                                $('#nama').val('Data Tidak ditemukan');
                                $('#kelamin').val('Data Tidak ditemukan');
                            } else {
                                $('#nikasli').val(res.nik);
                                $('#noktp').val(res.ktp);
                                $('#nopaspor').val(res.paspor);
                                $('#nama').val(res.nama);
                                $('#kelamin').val(res.kelamin);
                            }
                        });
                    }
                }, 500);
            });

    });
//--Pencarian Barang ketik ajax--- //

        </script>

@endsection
