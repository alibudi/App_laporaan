{{-- load template master --}}
@extends('templates.master')

{{-- isi dari halaman --}}
@section('content')
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Operasional Harian</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=""><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Operasional Harian</div>
                    </div>
                    <a style="margin:10px;" href="{{ route('harian.create') }}" class="btn btn-outline-success">Pengeluaran</a>
                    <a style="" href="{{ route('harian.create') }}" class="btn btn-outline-success">Tambah Saldo</a>
                    @foreach ($saldo as $item)
                    <a style="margin:10px;"  class="btn btn-outline-info">Rp.{{ number_format($item->saldo) }}</a>
                @endforeach
                 
                    <div class="ibox-body">
                    @php
                        $no = 1;
                    @endphp
                        <table class="table table-striped table-bordered table-hover" id="{{ empty($harians) ? '':'table-dt' }}" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Penggunaan</th>
                                    <th>Pengeluaran</th>
                                    <th>Keterangan</th>
                                    <th>Nota</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($harians))
                                @foreach ($harians as $harian)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $harian->nama }}</td>
                                    <td>{{number_format($harian->nilai) }}</td>
                                    <td>{{ $harian->keterangan }}</td>
                                    <td> <img width="100px;" src="{{ url('images', $harian['nota']) }}" /></td>
                                    <td>
                                <a href="{{route('harian.edit', $harian->id)}}" class="success p-0" data-original-title="" title="">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="hapusData({{ $harian->id }})" class="danger p-0" data-original-title="" title="">
                                    <i class="fa fa-trash font-medium-3 mr-2"></i>
                                </a>

                                <form id="harian-{{ $harian->id }}" action="{{ route('harian.destroy', $harian->id) }}" method="post" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id-{{ $harian->id }}" value="">
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
        $("#menu-harian").addClass("active");
        $(function(){
            $("#table-dt").dataTable();
        });
        function hapusData(id){
            let y = confirm('Are you sure to delete ?');
            if(y==true){
                $("#harian-"+id).submit();
            }
        }
    </script>
@endsection