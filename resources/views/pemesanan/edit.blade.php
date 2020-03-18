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
              <div class="row">
                  <div class="col-md-12">
                      <div class="ibox">
                          <div class="ibox-head">
                              <div class="ibox-title">Data</div>
                              <div class="ibox-tools">
                                  <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                  <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item">option 1</a>
                                      <a class="dropdown-item">option 2</a>
                                  </div>
                              </div>
                          </div>
                          <div class="ibox-body">
                              @php
                                  if(Session::has('nota')){
                                      $nomor1 = Session::get('nota');
                                      $nomor = $nomor1[0];
                                  }
                                  else{
                                      $nomor = $data[0];
                                  }
                              @endphp
                              <form  action="{{ route('pemesanan.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                  <div class="row">
                                      <div class="col-sm-6 form-group">
                                          <label>No Pesanan</label>
                                      <input class="form-control" type="text" placeholder="Nomor Pesanan" name="nomor" value="{{ $nomor }}" >
                                      </div>
                                      <div class="col-sm-6 form-group">
                                          <label>Kepada</label>
                                          <input class="form-control" type="text" name="kepada" value="{{ $data[2]}}"  placeholder="Kepada">
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Alamat</label>
                                    <input class="form-control" type="text" name="alamat" value="{{ $data[1]}}"  placeholder="Alamat">
                                    </div>
                                    <div class="col-sm-6 form-group">                                     
                                          <label>Catatan</label>
                                          <input class="form-control" name="keterangan" >
                                        {{-- </textarea> --}}
                            
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <h3 class="content-title">Informasi Barang</h3>
                                    <div class="content-process">
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <td>Nama Produk</td>
                                            <td>Jumlah</td>
                                            <td>Harga </td>
                                            <td>Input Barang</td>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>
                                              <select class="form-control" id="nama" onclick="isiharga()" name="nama">
                                                <option value="0">
                                                  Please select one
                                                </option>
                                                @foreach ($produks as $item)
                                                <option value="{{$item->nama}}">{{$item->nama  }}</option>
                                                @endforeach
                                              
                                            </select>
                                            </td>
                                            <td>
                                              <input type="number" id="" class="form-control" name="jumlah" min="1" value="1"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" data-attr="0" id="harga" name="harga" placeholder="" required/>
                                            </td>
                  
                                            <td>
                                                <button class="btn btn-outline-success" type="submit">Submit</button>
                                            </td>
                                          </tr>
                                                                </tbody>
                                      
                                      </table>
                                    </div>
                                  </div>
                              </form>


                          </div>
                      </div>
                  </div>
              </div>
   <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Pemesanan Barang</div>
                    </div>
                    <div class="ibox-body">
                    @php
                        $no = 1;
                    @endphp
                        <table class="table table-striped table-bordered table-hover" id="{{ empty($data2) ? '':'table-dt' }}" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alamat</th>

                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($total=[])
                            @if (!empty($data2))
                                @foreach ($data2 as $hari)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $hari->alamat }}</td>
                                    @php ($qty = $hari->jumlah)
                                    <td>{{ $hari->produk }}</td>
                                    <td>{{ $hari->jumlah }}</td>
                                    <td>{{ $hari->harga }}</td>
                                    <td>{{$qty*$hari->harga}}</td>
                                    @php(array_push($total,$qty*$hari->harga))
                                    <td>
                                <a href="{{route('harian.edit', $hari->id)}}" class="success p-0" data-original-title="" title="">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a href="{{ url('pemesanan', [$hari->id]) }}" onclick="return confirm('hapus data?')" class="danger p-0" data-original-title="" title="">
                                    <i class="fa fa-trash font-medium-3 mr-2"></i>
                                </a>

                                {{-- <form id="harian-{{ $hari->id }}" action="{{ route('pemesanan.destroy', $hari->id) }}" method="post" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id-{{ $hari->id }}" value="">
                                    <input type="submit" value="OK">
                                </form> --}}
                                      </tr>
                                      
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center"><i>Tidak Ada Data</i></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                <td>{{array_sum($total)}}</td>
                                <td><a href="{{ url('saldo', []) }}" class="btn btn-outline-success" type="submit">Selesai</a></td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
           
    @endsection

    @section('js')

    <script>
        $("#menu-pemesanan").addClass("active");
        $(function(){
            $("#table-dt").dataTable();
        });
        function hapusData(id){
            let y = confirm('Are you sure to delete ?');
            if(y==true){
                $("#pemesanan-"+id).submit();
            }
        }
    
    </script>
@endsection