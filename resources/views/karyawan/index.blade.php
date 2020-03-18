{{-- load template master --}}
@extends('templates.master')

{{-- isi dari halaman --}}
@section('content')
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Kelola Karyawan</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=""><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Karyawan</div>
                    </div>
                    <a style="margin:10px;" href="{{ route('karyawan.create') }}" class="btn btn-outline-success">Tambah Data</a>
                    <div class="ibox-body">
                    @php
                        $no = 1;
                    @endphp
                        <table class="table table-striped table-bordered table-hover" id="{{ empty($karyawans) ? '':'table-dt' }}" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Gaji</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($karyawans))
                                @foreach ($karyawans as $karyawan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $karyawan->name }}</td>
                                    <td>{{ $karyawan->email }}</td>
                                    <td>
                                <a href="{{route('karyawan.edit', $karyawan->id)}}" class="success p-0" data-original-title="" title="">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="hapusData({{ $karyawan->id }})" class="danger p-0" data-original-title="" title="">
                                    <i class="fa fa-trash font-medium-3 mr-2"></i>
                                </a>

                                <form id="karyawan-{{ $karyawan->id }}" action="{{ route('karyawan.destroy', $karyawan->id) }}" method="post" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id-{{ $karyawan->id }}" value="">
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
        $("#menu-karyawan").addClass("active");
        $(function(){
            $("#table-dt").dataTable();
        });
        function hapusData(id){
            let y = confirm('Are you sure to delete ?');
            if(y==true){
                $("#karyawan-"+id).submit();
            }
        }
    </script>
@endsection