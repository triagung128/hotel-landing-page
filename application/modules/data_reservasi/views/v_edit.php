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
                        <?php foreach ($reservasi as $rsv): ?>
                        <form role="form" action="<?php echo base_url().'data_reservasi/edit/'.$rsv['id_rsv']?>" method="post">
                          <input type="hidden" name="id_rsv" value="<?php echo $rsv['id_rsv']?>">

                          <div class="form-group">
                            <label for="nama">Nama Pemesan</label>
                            <input type=""text" class="form-control" name="nama" id="nama" value="<?php echo $rsv['nama']?>">
                            <div style="color: red;"><?php echo form_error('nama')?></div>
                          </div>

                          <div class="form-group">
                            <label for="no_hp">No. Handphone</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?php echo $rsv['no_hp']?>">
                            <div style="color: red;"><?php echo form_error('no_hp')?></div>
                          </div>

                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $rsv['email']?>">
                            <div style="color: red;"><?php echo form_error('email')?></div>
                          </div>

                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat" id="alamat"><?php echo $rsv['alamat']?></textarea>
                            <div style="color: red;"><?php echo form_error('alamat')?></div>
                          </div>

                          <div class="form-group">
                            <label for="kamar">Nama Kamar</label>
                            <div class="form-field">
                              <i class="icon icon-chevron-down"></i>
                              <select name="nm_kamar" id="kamar" class="form-control">
                                <option selected disabled>Pilih Kamar</option>
                                <?php foreach ($kamar as $kmr): ?>
                                  <?php if ($kmr['id_kmr']==$rsv['id_kmr']): ?>
                                    <option value="<?php echo $kmr['id_kmr']?>" selected="selected"><?php echo $kmr['nm_kmr']?></option>
                                  <?php else: ?>
                                    <option value="<?php echo $kmr['id_kmr']?>"><?php echo $kmr['nm_kmr']?></option>
                                  <?php endif ?>
                                <?php endforeach ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="cek_in">Check In</label>
                            <input type="text" class="form-control tgl-dtg" id="tgl-dtg" name="cek_in" value="<?php echo shortdate_indo($rsv['tgl_dtg']); ?>" autocomplete="off">
                            <div style="color: red;"><?php echo form_error('cek_in')?></div>
                          </div>

                          <div class="form-group">
                            <label for="cek_in">Check Out</label>
                            <input type="text" class="form-control tgl-dtg" id="tgl-dtg" name="cek_out" value="<?php echo shortdate_indo($rsv['tgl_plg']); ?>" autocomplete="off">
                            <div style="color: red;"><?php echo form_error('cek_out')?></div>
                          </div>

                          <div class="form-group">
                            <label for="jml_kamar">Jumlah Kamar</label>
                            <div class="form-field">
                              <i class="icon icon-chevron-down"></i>
                              <select name="jml_kamar" id="jml_kamar" class="form-control">
                                <?php for ($i=1; $i<=5; $i++){
                                  if ($i == $rsv['jml_kamar']) {
                                      echo "<option value=$i". set_select('jml_kamar', $i) ." selected='selected'>$i Kamar</option>";
                                  } else {
                                      echo "<option value=$i". set_select('jml_kamar', $i) .">$i Kamar</option>";
                                  }
                                } ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ?')">Edit</button>
                            <a href="<?php echo base_url('data_reservasi')?>" class="btn btn-warning">Batal</a> 
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