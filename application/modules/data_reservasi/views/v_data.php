            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Reservasi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body" style="margin-top: 10px;">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <?php if ($this->session->flashdata('success_insert') == TRUE) : ?>
                                    <div class='alert alert-success alert-dismissable text-center'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $this->session->flashdata('success_insert'); ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($this->session->flashdata('success_delete') == TRUE) : ?>
                                    <div class='alert alert-success alert-dismissable text-center'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $this->session->flashdata('success_delete'); ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($this->session->flashdata('success_edit') == TRUE) : ?>
                                    <div class='alert alert-success alert-dismissable text-center'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $this->session->flashdata('success_edit'); ?>
                                    </div>
                                <?php endif ?>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemesan</th>
                                        <th>Tgl Pesan</th>
                                        <th>Kamar</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach ($reservasi as $rsv): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $rsv['nama']; ?></td>
                                        <td><?php echo shortdate_indo($rsv['tgl_pesan']); ?></td>
                                        <td><?php echo $rsv['nm_kmr']; ?></td>
                                        <td><?php echo shortdate_indo($rsv['tgl_dtg']); ?></td>
                                        <td><?php echo shortdate_indo($rsv['tgl_plg']); ?></td>
                                        <td><?php echo $rsv['jml_kamar']; ?> Kamar</td>
                                        <td>
                                            <a href="<?php echo base_url().'data_reservasi/detail/'.$rsv['id_rsv']; ?>" class="btn btn-success btn-circle" title="edit"><i class="fa fa-search"></i></a>
                                            <a href="<?php echo base_url().'data_reservasi/edit/'.$rsv['id_rsv'];?>" class="btn btn-warning btn-circle" title="edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url().'data_reservasi/hapus/'.$rsv['id_rsv'];?>" class="btn btn-danger btn-circle" title="hapus" onclick="return confirm('Apakah anda yakin ?')"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>    
                                    <?php endforeach; ?>
                                    <!-- Modal -->
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- konten modal-->
                                            <div class="modal-content">
                                                <!-- heading modal -->
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Bagian heading modal</h4>
                                                </div>
                                                <!-- body modal -->
                                                <div class="modal-body">
                                                    <p>bagian body modal.</p>
                                                </div>
                                                <!-- footer modal -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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