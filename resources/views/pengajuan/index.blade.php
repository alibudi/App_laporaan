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
                        <div class="ibox-title">Data Pengajuan Anggaran</div>
                    </div>
                    <a style="margin:10px;" href="{{ route('anggaran.create') }}" class="btn btn-outline-success">Tambah data</a>
                    <div class="ibox-body">
                    @php
                        $no = 1;
                    @endphp
                        <table class="table table-striped table-bordered table-hover" id="{{ empty($anggarans) ? '':'table-dt' }}" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Nomor</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($anggarans))
                                @foreach ($anggarans as $hari)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $hari->nomor }}</td>
                                    <td>{{ $hari->alamat }}</td>
                                    <td>{{ $hari->tanggal }}</td>
                                    <td>{{ $hari->keterangan }}</td>
                                    <td>
                                <a href="{{route('harian.edit', $hari->id)}}" class="success p-0" data-original-title="" title="">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="hapusData({{ $hari->id }})" class="danger p-0" data-original-title="" title="">
                                    <i class="fa fa-trash font-medium-3 mr-2"></i>
                                </a>

                                <form id="harian-{{ $hari->id }}" action="{{ route('harian.destroy', $hari->id) }}" method="post" style="display:none;">
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
        $("#menu-anggaran").addClass("active");
        $(function(){
            $("#table-dt").dataTable();
        });
        function hapusData(id){
            let y = confirm('Are you sure to delete ?');
            if(y==true){
                $("#anggarans-"+id).submit();
            }
        }
    </script>
@endsection