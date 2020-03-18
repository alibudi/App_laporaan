{{-- load template master --}}
@extends('templates.master')

{{-- isi dari halaman --}}
@section('content')
     <!-- END SIDEBAR-->
     <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">{{$po_count}}</h2>
                                <div class="m-b-5">Data PO</div><i class="ti-file widget-stat-icon"></i>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">{{$anggaran_count}}</h2>
                                <div class="m-b-5">Data pengajuan </div><i class="ti-money widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">{{$galeri_count}}</h2>
                                <div class="m-b-5">Data Galeri</div><i class="fa fa-photo widget-stat-icon"></i>
                             </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">{{$user_count}}</h2>
                                <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
         
    <script>
  $(document).ready(function(){
    $("#menu-dashboard").addClass("active");
  });
</script>
    @endsection
 