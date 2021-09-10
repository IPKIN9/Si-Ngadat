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
                        <form action="{{route('denda.insert')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Pilih Nama Desa</label>
                                        <select id="desa_selected" name="desa_id" class="form-control"
                                            id="exampleFormControlSelect1">
                                            <option selected disabled>--Selected--</option>
                                            @foreach ($data['desa'] as $d)
                                            <option value="{{$d->id}}">{{$d->nama_desa}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row" id="form_content">
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
            <div class="card-body">
                <h4 class="card-title pb-2">Tabel Denda</h4>
                <h6 class="card-subtitle">Semua data yang menyangkut dengan <code>denda</code> ada pada tabel
                    ini.</h6>
                <div class="table-responsive">
                    <table class="table" id="denda_table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Updated_at</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($data['desa'] as $d)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$d->nama_desa}}</td>
                                <td>{{date('d-m-Y', strtotime($d->created_at))}}</td>
                                <td>{{date('d-m-Y', strtotime($d->updated_at))}}</td>
                                <td>
                                    <button type="button" data-id="{{$d->id}}" id="detail_button"
                                        class="btn btn-sm btn-success"><i class="far fa-list-alt"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-id="{{$d->id}}" id="edit_button"
                                        class="btn btn-sm btn-info"><i class="fa fa-edit"></i>
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
    $(document).ready(function() {
        $('#denda_table').DataTable();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#desa_selected').change(function()
        {
            $.get('hukumspecdata',function(data){
                $('#form_content').html('');
                $.each(data, function(i,d){
                    $('#form_content').append(`
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hukum</label>
                                <h6>`+ d.jenis_pelanggaran +`</h6>
                                <input type="hidden" name="hukum_id[]" class="form-control"value="`+ d.id+`">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Denda</label>
                                <input type="text" name="denda[]" class="form-control" placeholder="Input Denda">
                            </div>
                        </div>
                        <hr>
                        `);
                });
            });
        });

        $(document).on('click','#detail_button',function()
        {
            let dataId = $(this).data('id');
            let url = "detailspecdata/" + dataId;
            $.get(url,function(data)
            {
               if (data == 0) {
                Swal.fire({
                    title: 'Kosong!',
                    text: 'Data denda pada desa ini kosong.',
                    icon: 'warning',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oke'
                }).then((result) => {
                });
               } else {
                $('.modal-title').html('Detail Denda Desa');
                $('.modal-body').html('');
                $('.modal-body').append(`
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>Aturan</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody id="tb_body" class="border border-info">
                                
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-danger mt-5" data-dismiss="modal">Close</button>
                    `);
                $.each(data,function(i,d)
                {
                    $('#tb_body').append(`
                    <tr>
                        <td>`+ d.hukum_rerol.jenis_pelanggaran +`</td>
                        <td>`+ d.denda +`</td>
                    </tr>
                    `);
                });
                $('#univmodal').modal('show');
               }
            });
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
                <form action="{{route('denda.update')}}" method="POST" autocomplete="off">
                @csrf
                <div id="denda_edit" class="row">
                    
                </div>
                <div class="row pt-4">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
                `);
                $.each(data,function(i,d){
                    $('#denda_edit').append(`
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Hukum</label>
                                <input type="hidden" name="id[]" class="form-control"value="`+ d.id+`">
                                <h6>`+ d.hukum_rerol.jenis_pelanggaran +`</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Denda</label>
                                <input type="text" name="denda[]" class="form-control" placeholder="Input Denda" value="`+ d.denda +`">
                            </div>
                        </div>
                    `);
                });
                $('#univmodal').modal('show');
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