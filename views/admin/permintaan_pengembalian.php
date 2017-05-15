<?php 
    include('header_admin.php');
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Permintaan Pengembalian</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Daftar Permintaan Pengembalian Produk
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice</th>
                                    <th>Produk</th>
                                    <th>Alasan</th>
                                    <th>Status</th>
                                    <th>Respon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td class="center">1</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td class="center"><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="even gradeC">
                                    <td>2</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="odd gradeA">
                                    <td>3</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="even gradeA">
                                    <td>4</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="odd gradeA">
                                    <td>5</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="even gradeA">
                                    <td>6</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="gradeA">
                                    <td>7</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="gradeA">
                                    <td>8</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="gradeA">
                                    <td>9</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="gradeA">
                                    <td>10</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="gradeA">
                                    <td>11</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                                <tr class="gradeA">
                                    <td>12</td>
                                    <td>Trx2313</td>
                                    <td>Sepatu</td>
                                    <td>Kekecilan</td>
                                    <td>Menunggu Respon</td>
                                    <td><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#gridText"></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Modal -->
        <div class="modal fade" id="gridText" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Respon Permintaan Pengembalian</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-3">Invoice</div>
                  <div class="col-md-4">.col-md-4</div>
                </div>
                <div class="row">
                  <div class="col-md-3">Detail Produk</div>
                  <div class="col-md-4">.col-md-4</div>
                </div>
                <div class="row">
                  <div class="col-md-3">Alasan</div>
                  <div class="col-md-4">.col-md-4</div>
                </div>
                <div class="row">
                  <div class="col-md-3">Foto</div>
                  <div class="col-md-4">.col-md-4</div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="col-md-3"></div>
                  <div class="col-md-3"><button class="btn btn-success" type="submit">Terima</button></div>
                  <div class="col-md-3"><button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#ModalIsian">Tolak</button></div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!-- Modal -->
        <div class="modal fade" id="ModalIsian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Permintaan Ditolak</h4>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Alasan Penolakan</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Kirim Pesan</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal -->


    </div>
    <!-- /#page-wrapper -->

<?php
    include('footer_admin.php');
?>