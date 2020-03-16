{{-- load template master --}}
@extends('templates.master')

{{-- isi dari halaman --}}
@section('content')
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Pengeluaran</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
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
                    <form class="form-horizontal" action="{{ route ('event.store')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penggunaan</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{ $errors->has('nama') ? 'has-error':'' }}" type="text" name="nama">
                                    @if ($errors->has('nomor'))
                                        <p class="text-danger">{{ $errors->first('nama') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nilai</label>
                                <div class="col-sm-10">
                                    <input class="form-control currency {{ $errors->has('nilai') ? 'has-error':'' }}" type="text" name="nilai">
                                    @if ($errors->has('tahun'))
                                        <p class="text-danger">{{ $errors->first('nilai') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{ $errors->has('tgl') ? 'has-error':'' }}" type="date" name="tgl">
                                    @if ($errors->has('tentang'))
                                        <p class="text-danger">{{ $errors->first('tgl') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nota</label>
                                <div class="col-sm-10">
                                    <input class="form-control {{ $errors->has('nota') ? 'has-error':'' }}" type="file" name="nota">
                                    @if ($errors->has('file'))
                                        <p class="text-danger">{{ $errors->first('nota') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input class="form-control $errors->has('keterangan') ? 'has-error':'' }}" type="text" name="keterangan">
                                    @if ($errors->has('konten'))
                                        <p class="text-danger">{{ $errors->first('keterangan') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2020 © <b>PT</b> </div>
                <a class="px-4" hre target="_blank">Indonesia Merdeka Belajar</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    @endsection

@section('js')
    <script>
        $("#menu-event").addClass("active");
    </script>
@endsection
