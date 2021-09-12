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
                    @if ($errors->any())
                    <div class="mt-2">
                        <p class="text-danger">Periksa Formulir Data!</p>
                    </div>
                    @endif
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                    <div class="card-body">
                        <form action="{{route('home.create')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Desa</label>
                                        <select name="desa_id" class="form-control" id="desa_select">
                                            <option disabled selected>--Pilih--</option>
                                            @foreach ($data['desa'] as $d)
                                            <option value="{{$d->id}}">{{$d->nama_desa}}</option>
                                            @endforeach
                                        </select>
                                        @error('desa')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-5">
                                    <div class="form-group">
                                        <label>Hukum</label>
                                        <select name="hukum_id" id="hukum_select" class="form-control">
                                            <option disabled selected>--Pilih--</option>
                                        </select>
                                        @error('hukum')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Form Pelanggar</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nik</label>
                                                <input type="text" name="nik" class="form-control" autocomplete="off">
                                                @error('nik')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control" autocomplete="off">
                                                @error('nama')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control"
                                                    autocomplete="off">
                                                @error('tempat_lahir')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input name="tgl_lahir" type="date" class="form-control">
                                                @error('tgl_lahir')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Umur</label>
                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <input name="umur" type="number" class="form-control"
                                                            placeholder="Tahun">
                                                        @error('umur')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <p class="mt-2">Tahun</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="gender" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                    <option disabled selected>--Pillih--</option>
                                                    <option>Laki-Laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                                @error('gender')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Form Adat</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Isi Perjanjian</label>
                                                <textarea name="isi_perjanjian" class="form-control" rows="3"
                                                    style="margin-top: 0px; margin-bottom: 0px; height: 305px;"></textarea>
                                                @error('isi_perjanjian')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <textarea name="keterangan" class="form-control" rows="3"
                                                    style="margin-top: 0px; margin-bottom: 0px; height: 120px;"></textarea>
                                                @error('keterangan')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <center>
                                        <div class="form-check form-check-inline">
                                            <input required class="form-check-input" type="radio" name="ttd" id="ttd"
                                                value="yes">
                                            <label class="form-check-label" for="ttd">Setujui untuk menandatangani
                                                dokumen ini!</label>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <div class="row pt-2 pb-4">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </center>
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
            <div class="card-body">
                <h4 class="card-title pb-2">Data Kasus</h4>
                <h6 class="card-subtitle">Semua data yang menyangkut dengan <code>Kasus</code> ada pada tabel
                    ini.</h6>
                <div class="table-responsive">
                    <table class="table" id="pelanggar_table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nik</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($data['all'] as $d)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$d->nik}}</td>
                                <td>{{$d->nama}}</td>
                                <td>{{$d->adat_rerol->desa_rerol->nama_desa}}</td>
                                <td>
                                    <button type="button" data-id="{{$d->id}}" id="detail_button"
                                        class="btn btn-sm btn-success"><i class="far fa-list-alt"></i>
                                    </button>
                                    <button type="button" data-id="{{$d->id}}" id="delete_button"
                                        class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i>
                                    </button>
                                </td>
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
@section('js')
<script>
    $(document).ready(function()
    {
        $('#pelanggar_table').DataTable();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#desa_select').on('change',function()
        {
            let dataId = $('#desa_select').find(":selected").val();
            let url = "hukumspecdata";
            $.get(url,function(data)
            {
                $('#hukum_select').html('');
                $.each(data,function(i,d){
                    $('#hukum_select').append(`
                    <option value="`+ d.id +`">`+ d.jenis_pelanggaran +`</option>
                    `);
                });
            });
        });

        $(document).on('click','#detail_button',function()
        {
            let dataId = $(this).data('id');
            let url = "detailspecdata/" + dataId;
            $.get(url,function(data){
                $('.modal-title').html('Detail Denda Desa');
                $('.modal-body').html('');
                $('.modal-body').append(`
                <form action="{{route('home.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="adat_id" value="`+ data.adat_id +`"></input>
                    <input type="hidden" name="pelanggar_id" value="`+ data.id +`"></input>
                    <input type="hidden" name="hukum_id" value="`+ data.adat_rerol.hukum_id +`"></input>
                    <input type="hidden" name="desa_id" value="`+ data.adat_rerol.desa_id+`"></input>
                    <input type="hidden" name="ttd" value="yes"></input>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h6 class="mt-2">Form Pelanggar</h6>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <button id="formedit_button" type="button" class="btn btn-light"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nik</label>
                                        <input type="text" name="nik" value="`+ data.nik +`" readonly class="form-control edit_input" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" value="`+ data.nama +`" readonly class="form-control edit_input" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir"  value="`+ data.tempat_lahir +`" readonly class="form-control edit_input"
                                            autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input  value="`+ data.tgl_lahir +`" name="tgl_lahir" type="date" readonly class="form-control edit_input" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Umur</label>
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <input value="`+ data.umur +`" name="umur" type="number" readonly class="form-control edit_input" autocomplete="off">
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="mt-2">Tahun</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="gender" disabled class="form-control"
                                            id="gender">
                                            <option disabled selected>--Pillih--</option>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Form Adat</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Isi Perjanjian</label>
                                        <textarea readonly name="isi_perjanjian" id="isi_perjanjian" class="form-control edit_input" rows="3"
                                            style="margin-top: 0px; margin-bottom: 0px; height: 305px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea readonly name="keterangan" id="keterangan" class="form-control edit_input" rows="3"
                                            style="margin-top: 0px; margin-bottom: 0px; height: 120px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div id="editsave_button" class="col-md-6 text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
                `);
                $('#gender').val(data.gender);
                $('#isi_perjanjian').val(data.adat_rerol.isi_perjanjian);
                $('#keterangan').val(data.adat_rerol.keterangan);
                $('#univmodal').modal('show');
            });
        });

        $(document).on('click','#formedit_button',function()
        {
            $('.edit_input').removeAttr('readonly');
            $('#gender').removeAttr('disabled');
            $('#editsave_button').html('');
            $('#editsave_button').append(`
                <button type="submit" class="btn btn-secondary mr-2">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            `);
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
    });
</script>
@endsection