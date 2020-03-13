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
                              <form>
                                  <div class="row">
                                      <div class="col-sm-6 form-group">
                                          <label>No Pesanan</label>
                                          <input class="form-control" type="text" placeholder="Nomor Pesanan">
                                      </div>
                                      <div class="col-sm-6 form-group">
                                          <label>Kepada</label>
                                          <input class="form-control" type="text" placeholder="Kepada">
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Alamat</label>
                                        <input class="form-control" type="text" placeholder="Alamat">
                                    </div>
                                    <div class="col-sm-6 form-group">                                     
                                          <label>Catatan</label>
                                          <textarea class="form-control" rows="3"></textarea>
                            
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
                                              <select class="form-control" id="" name="">
                                                <option value="0">
                                                  Please select one
                                                </option>
                                                <option value="12"> Besi </option>       
                                                <option value="KAT1"> Kipas Angin <option>
                                                <option value="LAMP"> Lampu</option>
                                                <option value="TV"> TV </option>
                                            </select>
                                            </td>
                                            <td>
                                              <input type="number" id="" class="form-control" name="jumlah" min="1" value="1"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control form-price-format discount-trx" data-attr="0" id="" name="" placeholder="" required/>
                                            </td>
                  
                  
                                            <td>
                                              <a href="#" class="btn btn-success btn-rounded" id="">Input Barang</a>
                                            </td>
                                          </tr>
                                                                </tbody>
                                        <tfoot>
                                          <tr>
                                            <th colspan="3">Total Pembelian</th>
                                            <th colspan="2" id="total-pembelian"></th>
                                          </tr>
                                        </tfoot>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <button class="btn btn-outline-success" type="submit">Submit</button>
                                  </div>
                              </form>
                          </div>
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
                $("#harians-"+id).submit();
            }
        }
    </script>
@endsection