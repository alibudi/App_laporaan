{{-- load template master --}}
@extends('templates.master')

{{-- isi dari halaman --}}
@section('content')
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Data Pengajuan Anggaran</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=""><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>

            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Form </div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                    <form class="form-horizontal" action="{{ route ('produk.store')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{ $errors->has('nama') ? 'has-error':'' }}" type="text" name="nama">
                                    @if ($errors->has('nomor'))
                                        <p class="text-danger">{{ $errors->first('nama') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input class="form-control currency {{ $errors->has('harga') ? 'has-error':'' }}" type="number" name="harga">
                                    @if ($errors->has('harga'))
                                        <p class="text-danger">{{ $errors->first('harga') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{ $errors->has('jumlah') ? 'has-error':'' }}" type="number" name="jumlah">
                                    @if ($errors->has('jumlah'))
                                        <p class="text-danger">{{ $errors->first('jumlah') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Pengajuan Anggaran</div>
                    </div>
                   <div class="ibox-body">
                    @php
                        $no = 1;
                    @endphp
                        <table class="table table-striped table-bordered table-hover" id="{{ empty($produks) ? '':'table-dt' }}" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($produks))
                                @foreach ($produks as $hari)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $hari->nama }}</td>
                                    <td>{{ $hari->harga }}</td>
                                    <td>{{ $hari->jumlah }}</td>
                                    <td>
                                <a href="{{route('produk.edit', $hari->id)}}" class="success p-0" data-original-title="" title="">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="hapusData({{ $hari->id }})" class="danger p-0" data-original-title="" title="">
                                    <i class="fa fa-trash font-medium-3 mr-2"></i>
                                </a>

                                <form id="harian-{{ $hari->id }}" action="{{ route('produk.destroy', $hari->id) }}" method="post" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id-{{ $hari->id }}" value="">
                                    <input type="submit" value="OK">
                                </form>
                                      </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center"><i>Tidak Ada Data</i></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
           
    @endsection

    @section('js')
    <script>
        $("#menu-produk").addClass("active");
        $(function(){
            $("#table-dt").dataTable();
        });
        function hapusData(id){
            let y = confirm('Are you sure to delete ?');
            if(y==true){
                $("#produk-"+id).submit();
            }
        }
    </script>
@endsection