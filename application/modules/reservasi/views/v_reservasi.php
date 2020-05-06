    <section class="probootstrap-slider flexslider probootstrap-inner">
    <ul class="slides">
       <li style="background-image: url(<?php echo base_url()?>assets/img/img_11.jpg);" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <p><img src="<?php echo base_url()?>assets/img/curve_white.svg" class="seperator probootstrap-animate" alt="Free HTML5 Bootstrap Template"></p>
                  <h1 class="probootstrap-heading probootstrap-animate">Reservasi Kamar</h1>
                  <div class="probootstrap-animate probootstrap-sub-wrap">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</div>
                </div>
              </div>
            </div>
          </div>
        </li>
    </ul>
  </section>

  <section class="probootstrap-cta probootstrap-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="probootstrap-cta-heading" style="width: 700px">Sudah memiliki ID Reservasi ? <span> &mdash; Silahkan cek dengan memasukkan ID Reservasi anda !</span></h2>
          <div class="probootstrap-cta-button-wrap " style="width: 400px;">
            <form class="form-inline" action="<?php echo base_url().'reservasi/invoice'?>" method="post">
              <div class="form-group">
                <input type="text" name="id" class="form-control" placeholder="Masukkan ID Reservasi Anda" style="width: 250px;" required autocomplete="off">
              </div>
              <button type="submit" class="btn btn-primary btn-sm" name="submit">Cek</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="probootstrap-section">
    <div class="container">
      <div class="row probootstrap-gutter40">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="mt0">Form Reservasi</h2>
          
          <!-- Formulir Reservasi -->
          <form action="<?php echo base_url().'reservasi';?>" method="post" class="probootstrap-form">
            
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_unik; ?>">

            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <div class="form-field">
                <i class="icon icon-user"></i>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" autocomplete="off">
                <div style="color: red"><?php echo form_error('nama'); ?></div>
              </div>
            </div>

            <div class="form-group">
              <label for="no_hp">No. Handphone</label>
              <div class="form-field">
                <i class="icon icon-phone"></i>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo set_value('no_hp'); ?>" autocomplete="off">
                <div style="color: red"><?php echo form_error('no_hp'); ?></div>
              </div>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <div class="form-field">
                <i class="icon icon-mail"></i>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" autocomplete="off">
                <div style="color: red"><?php echo form_error('email'); ?></div>
              </div>
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <div class="form-field">
                <i class="icon icon-home"></i>
                <textarea type="text" class="form-control" id="alamat" name="alamat"><?php echo set_value('alamat'); ?></textarea>
                <div style="color: red"><?php echo form_error('alamat'); ?></div>
              </div>
            </div>

            <hr>

            <div class="form-group">
              <label for="kamar">Kamar</label>
              <div class="form-field">
                <i class="icon icon-chevron-down"></i>
                <select name="id_kamar" id="kamar" class="form-control">
                  <option selected disabled>Pilih Kamar</option>
                  <?php foreach ($kamar as $kmr): ?>
                    <?php if ($kmr['status']=='tersedia'): ?>
                      <option value="<?php echo $kmr['id_kmr'] ?>"<?php echo set_select('id_kamar', $kmr['id_kmr']); ?>><?php echo $kmr['nm_kmr'];?></option>
                    <?php endif ?>
                  <?php endforeach ?>
                </select>
                <div style="color: red"><?php echo form_error('id_kamar'); ?></div>
              </div>
            </div>

            <div class="row mb30">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tgl-dtg">Check In</label>
                  <div class="form-field">
                    <i class="icon icon-calendar2"></i>
                    <input type="text" class="form-control tgl-dtg" id="tgl-dtg" name="tgl_dtg" value="<?php echo set_value('tgl_dtg'); ?>" autocomplete="off">
                    <div style="color: red"><?php echo form_error('tgl_dtg'); ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tgl-dtg">Check Out</label>
                  <div class="form-field">
                    <i class="icon icon-calendar2"></i>
                    <input type="text" class="form-control tgl-dtg" id="tgl-dtg" name="tgl_plg" value="<?php echo set_value('tgl_plg'); ?>" autocomplete="off">
                    <div style="color: red"><?php echo form_error('tgl_plg'); ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="jml_kamar">Jumlah Kamar</label>
                  <div class="form-field">
                    <i class="icon icon-chevron-down"></i>
                    <select name="jml_kamar" id="jml_kamar" class="form-control">
                      <?php for ($i=1; $i<=5; $i++){
                        echo "<option value=$i". set_select('jml_kamar', $i) .">$i Kamar</option>";
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" style="width: 200px;" class="btn btn-primary btn-lg pull-right" name="submit" onclick="return confirm('Apakah anda yakin ?')">Pesan</button>
            </div>

          </form>
          <!-- /end Formulir Reservasi -->

        </div>
      </div>
    </div>
  </section>
  
  <hr>