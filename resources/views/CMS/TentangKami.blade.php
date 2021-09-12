@extends('Base.Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">

        <div id="accordion" class="custom-accordion mb-4">

            <div class="card mb-0">
                <div class="card-header" id="headingOne">
                    <h5 class="m-0">
                        <a style="text-decoration: none" class="custom-accordion-title d-block pt-2 pb-2 collapsed"
                            data-toggle="collapse" href="#collapseOne" aria-expanded="false"
                            aria-controls="collapseOne">
                            <i class="fas fa-plus-circle"></i> Tambah Data<span class="float-right"><i
                                    class="mdi mdi-chevron-down accordion-arrow"></i></span>
                        </a>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                    <div class="card-body">
                        <form action="{{route('tentangkami.insert')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Input Email">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="number" name="telepon" class="form-control"
                                            placeholder="Input Telepon">
                                        @error('telepon')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="3"
                                            style="margin-top: 0px; margin-bottom: 0px; height: 120px;"></textarea>
                                        @error('alamat')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" rows="3"
                                            style="margin-top: 0px; margin-bottom: 0px; height: 120px;"></textarea>
                                        @error('deskripsi')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end custom accordions-->
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            @foreach ($data['all'] as $d)
            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{$d->email}}" disabled>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Telepon</label>
                            <input type="text" class="form-control" value="{{$d->telepon}}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Email</label>
                            <textarea name="alamat" class="form-control" rows="3"
                                style="margin-top: 0px; margin-bottom: 0px; height: 120px;"
                                disabled>{{$d->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3"
                                style="margin-top: 0px; margin-bottom: 0px; height: 120px;"
                                disabled>{{$d->deskripsi}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" data-id="{{$d->id}}" id="edit_button" class="btn btn-sm btn-info"><i
                                class="fa fa-edit"></i>
                        </button>
                        <button type="button" data-id="{{$d->id}}" id="delete_button"
                            class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script>
        $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click','#edit_button',function()
        {
            let dataId = $(this).data('id');
            let url = "editspecdata/"+dataId;
            $.get(url,function(data)
            {
                $('.modal-title').html('Formulir Perubahan Data');
                $('.modal-body').html('');
                $('.modal-body').append(`
                <form action="{{route('tentangkami.update')}}" method="POST" autocomplete="off">
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="hidden" name="id" id="id" class="form-control" value="`+data.id+`">
                                <input type="email" name="email" id="email" class="form-control" value="`+data.email+`">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="number" name="telepon" id="telepon" class="form-control" value="`+data.telepon+`">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3"
                                    style="margin-top: 0px; margin-bottom: 0px; height: 120px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                    style="margin-top: 0px; margin-bottom: 0px; height: 120px;"></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
                `);
                $('#univmodal').modal('show');
                $('#alamat').val(data.alamat);
                $('#deskripsi').val(data.deskripsi);
            });
        });

        $(document).on('click', '#delete_button', function () {
            let dataId = $(this).data('id');
            Swal.fire({
            title: 'Anda Yakin?',
            text: "Data ini mungkin terhubung ke tabel yang lain!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "deletespecdata/" + dataId,
                        type: 'delete',
                        success: function () {
                            Swal.fire({
                                title: 'Hapus!',
                                text: 'Data berhasl di hapus.',
                                icon: 'success',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Oke'
                            }).then((result) => {
                                location.reload();
                            });
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ada yang salah!',
                            });
                        }
                    })
                }
            })
        });
    } );
    </script>
    @endsection