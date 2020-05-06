            <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Edit Kamar</h1>
              </div>
              <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
              <div class="col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-body" style="margin-top: 10px;">
                    <div class="row">
                      <div class="col-lg-12">
                        <?php foreach ($kamar as $kmr): ?>
                        <form role="form" action="<?php echo base_url().'data_kamar/edit/'.$kmr['id_kmr']?>" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?php echo $kmr['id_kmr']?>">
                          <div class="form-group">
                            <label for="nama">Nama Kamar</label>
                            <input type=""text" class="form-control" placeholder="Masukkan Nama Kamar" name="nm_kamar" id="nama" value="<?php echo $kmr['nm_kmr']?>">
                            <div style="color: red;"><?php echo form_error('nm_kamar')?></div>
                          </div>
                          <div class="form-group">
                            <label for="harga">Harga Sewa</label>
                            Rp. <input type="text" class="form-control" placeholder="Masukkan Harga Sewa" name="hrg_sewa" id="harga" value="<?php echo $kmr['hrg_swa']?>">
                            <div style="color: red;"><?php echo form_error('hrg_sewa')?></div>
                          </div>
                          <div class="form-group">
                            <label>Status</label>
                            <div class="radio">
                              <?php if ($kmr['status'] == 'tersedia'): ?>
                              <label class="radio-inline">
                                <input type="radio" name="status" value="tersedia" <?php echo set_radio('status', 'tersedia'); ?> checked>
                                TERSEDIA
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="status" value="kosong" <?php echo set_radio('status', 'kosong'); ?>>
                                KOSONG
                              </label>
                              <?php else : ?>
                              <label class="radio-inline">
                                <input type="radio" name="status" value="tersedia" <?php echo set_radio('status', 'tersedia'); ?>>
                                TERSEDIA
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="status" value="kosong" <?php echo set_radio('status', 'kosong'); ?> checked>
                                KOSONG
                              </label>
                              <?php endif; ?>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="gambar">Gambar/Foto</label>
                            <input type="file" id="gambar" name="gambar">
                          </div>
                          <div class="form-group">
                            <label for="">Fasilitas</label>
                            <textarea class="form-control ckeditor" id="ckeditor" name="fasilitas"><?php echo $kmr['fasilitas'];?></textarea>
                            <div style="color: red;"><?php echo form_error('fasilitas')?></div>
                          </div>
                          <div class="form-group" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ?')">Edit</button>
                            <a href="<?php echo base_url('data_kamar')?>" class="btn btn-warning">Batal</a> 
                          </div>
                        </form>
                        <?php endforeach ?>
                      </div>
                      <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                  </div>
                  <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
              </div>
              <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->