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
                                {{-- <h2 class="m-b-5 font-strong">{{$produk_count}}</h2> --}}
                                <div class="m-b-5">Data Produk</div><i class="ti-file widget-stat-icon"></i>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                {{-- <h2 class="m-b-5 font-strong">{{$berita_count}}</h2> --}}
                                <div class="m-b-5">Data Berita</div><i class="ti-camera widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                {{-- <h2 class="m-b-5 font-strong">{{$galeri_count}}</h2> --}}
                                <div class="m-b-5">Data Galeri</div><i class="fa fa-photo widget-stat-icon"></i>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                {{-- <h2 class="m-b-5 font-strong">{{$user_count}}</h2> --}}
                                <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2019 © <b>JDIH</b></div>
                <a class="px-4">Jaringan Dokumentasi Informasi Hukum</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <script>
  $(document).ready(function(){
    $("#menu-dashboard").addClass("active");
  });
</script>
    @endsection
 