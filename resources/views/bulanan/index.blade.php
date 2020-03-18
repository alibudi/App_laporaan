{{-- load template master --}}
@extends('templates.master')

{{-- isi dari halaman --}}
@section('content')
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Operasional Bulanan</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=""><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Operasional Bulanan</div>
                    </div>
                    <a style="margin:10px;" href="{{ route('bulanan.create') }}" class="btn btn-outline-success">Tambah data</a>
                    @foreach ($saldo as $item)
                    <a style="margin:10px;"  class="btn btn-outline-info">Rp.{{ number_format($item->saldo) }}</a>
                @endforeach
                    <div class="ibox-body">
                    @php
                        $no = 1;
                    @endphp
                        <table class="table table-striped table-bordered table-hover" id="{{ empty($bulanans) ? '':'table-dt' }}" cellspacing="0" width="100%">
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
                            @if (!empty($bulanans))
                                @foreach ($bulanans as $bulan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $bulan->nama }}</td>
                                    <td>{{ $bulan->nilai }}</td>
                                    <td>{{ $bulan->keterangan }}</td>
                                    <td> <img width="100px;" src="{{ url('images', $bulan['nota']) }}" /></td>
                                    <td>
                                <a href="{{route('harian.edit', $bulan->id)}}" class="success p-0" data-original-title="" title="">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="hapusData({{ $bulan->id }})" class="danger p-0" data-original-title="" title="">
                                    <i class="fa fa-trash font-medium-3 mr-2"></i>
                                </a>

                                <form id="harian-{{ $bulan->id }}" action="{{ route('harian.destroy', $bulan->id) }}" method="post" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id-{{ $bulan->id }}" value="">
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
        $("#menu-bulanan").addClass("active");
        $(function(){
            $("#table-dt").dataTable();
        });
        function hapusData(id){
            let y = confirm('Are you sure to delete ?');
            if(y==true){
                $("#bulanan-"+id).submit();
            }
        }
    </script>
@endsection