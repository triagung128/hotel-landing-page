            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Kamar</h1>
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
                                        <th>Gambar</th>
                                        <th>Nama Kamar</th>
                                        <th>Harga Sewa</th>
                                        <th>Fasilitas</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach ($kamar as $kmr): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><img src="<?php echo base_url()?>assets/img/kamar/<?php echo $kmr['gambar'] ?>" height="75" width="100px"></td>
                                        <td><?php echo $kmr['nm_kmr']; ?></td>
                                        <td><?php echo rupiah($kmr['hrg_swa']); ?></td>
                                        <td><?php echo $kmr['fasilitas'];?></td>
                                        <td>
                                            <?php if ($kmr['status'] == 'tersedia'): ?>
                                                <span class="label label-success">
                                                    <?php echo strtoupper($kmr['status']) ?>
                                                </span>
                                            <?php else : ?>
                                                <span class="label label-danger">
                                                    <?php echo strtoupper($kmr['status']) ?>
                                                </span>
                                            <?php endif ?>        
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url().'data_kamar/edit/'.$kmr['id_kmr']; ?>" class="btn btn-info btn-circle" title="edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url().'data_kamar/hapus/'.$kmr['id_kmr']; ?>" class="btn btn-danger btn-circle" title="hapus" onclick="return confirm('Apakah anda yakin ?')"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>    
                                    <?php endforeach; ?>
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