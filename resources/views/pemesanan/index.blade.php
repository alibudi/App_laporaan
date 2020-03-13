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
                              <div class="ibox-title">Basic form</div>
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
                                          <input class="form-control" type="text" placeholder="First Name">
                                      </div>
                                      <div class="col-sm-6 form-group">
                                          <label>Kepada</label>
                                          <input class="form-control" type="text" placeholder="First Name">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>Alamat</label>
                                      <input class="form-control" type="text" placeholder="Email address">
                                  </div>
                                
                                  <div class="form-group">
                                      <button class="btn btn-default" type="submit">Submit</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>


            <div class="page-content fade-in-up">
              
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Operasional Harian</div>
                    </div>
                    <a style="margin:10px;" href="{{ route('harian.create') }}" class="btn btn-outline-success">Tambah data</a>
                    {{-- <div class="ibox-body"> --}}
            
                          <!-- form start -->
                          <form id="transaction-form" class="form-horizontal" method="POST" action="http://localhost/pos3/transaksi/add_process">
                            <div class="box-body">
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="kode">Kode Transaksi</label>
                      <div class="col-sm-8">
                        <input data-attr="" type="text" name="transaction_id" data-origin="" value="" id="kode_transaksi" class="form-control" required/>
                        <span class="help-inline label label-danger" id="status_kode"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="category_id">Supplier</label>
                      <div class="col-sm-8">
                        <select class="form-control" id="supplier_id" name="supplier_id">
                           <option value="SUP001" >
                                Alan New                            </option>
                                <option value="SUP002" >
                                Made                            </option>
                       </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label" for="date">Tanggal</label>
                      <div class="col-sm-8">
                        <input type="text" value="2020-03-13 03:48:30" id="date" class="form-control" disabled/>
                        <input type="hidden" name="supplier_date" value="2020-03-13 03:48:30" id="supplier_date" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <h3 class="content-title">Informasi Barang</h3>
                    <div class="content-process">
                      <table class="table">
                        <thead>
                          <tr>
                            <td>Kategori</td>
                            <td>Nama Barang</td>
                            <td>Jumlah</td>
                            <td>Harga Beli Satuan</td>
                            <td>Disc 1</td>
                            <td>Disc 2</td>
                            <td>Disc 3</td>
                            <td>Harga Satuan Net</td>
                            <td>Input Barang</td>
                          </tr>
                        </thead>
                        <tbody id="transaksi-item">
                          <tr>
                            <td>
                              <select class="form-control" id="transaksi_category_id" name="category_id">
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
                              <select class="form-control" name="product_id" id="transaksi_product_id"></select>
                            </td>
                            <td>
                              <input type="number" id="jumlah" class="form-control" name="jumlah" min="1" value="1"/>
                            </td>
                            <td>
                              <input type="text" class="form-control form-price-format discount-trx" data-attr="0" id="sale_price" name="sale_price" placeholder="Harga" required/>
                            </td>
  
                            <td>
                              <input type="number" value="0" min="0" max="100" class="form-control discount-trx" data-attr="1" id="disc_1" name="disc_1" placeholder="Diskon 1" disabled/>
                            </td>
                            <td>
                              <input type="number" value="0" min="0" max="100" class="form-control discount-trx" data-attr="2" id="disc_2" name="disc_2" placeholder="Diskon 2" disabled/>
                            </td>
                            <td>
                              <input type="number" value="0" min="0" max="100" class="form-control discount-trx" data-attr="3" id="disc_3" name="disc_3" placeholder="Diskon 3" disabled/>
                            </td>
                            <td>
                              <input type="text" class="form-control" id="harga_satuan_net" name="harga_satuan_net" placeholder="Harga Satuan Net"/>
                            </td>
  
                            <td>
                              <a href="#" class="btn btn-xs btn-primary" id="tambah-barang">Input Barang</a>
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
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="col-md-3 col-md-offset-4">
                    <a class="btn btn-default" href="http://localhost/pos3/transaksi">Cancel</a>
                    <a class="btn btn-info pull-right" href="#" id="submit-transaksi">Submit</a>
                  </div>
                </div>
                <!-- /.box-footer -->
              </form>
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