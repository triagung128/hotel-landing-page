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
          <h2 class="mt0">Invoice Reservasi</h2>
          <div class="panel panel-default">
            <div class="panel-body center">
              <a href="<?php echo base_url('home');?>" class="btn btn-info pull-right">Tutup</a>
              <h3 class="text-center">Bukti Reservasi Kamar</h3>
              <div class="col-md-10 col-md-offset-1">

                <?php foreach ($data_rsv as $dt_rsv): ?>
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 170px;">ID Reservasi</th>
                    <td><strong><?php echo $dt_rsv['id_rsv']; ?></strong></td>
                  </tr>
                  <tr>
                    <th>Nama</th>
                    <td><?php echo $dt_rsv['nama']; ?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><?php echo $dt_rsv['alamat']; ?></td>
                  </tr>
                  <tr>
                    <th>No. Handphone</th>
                    <td><?php echo $dt_rsv['no_hp']; ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><?php echo $dt_rsv['email']; ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Pesan</th>
                    <td><?php echo shortdate_indo($dt_rsv['tgl_pesan']); ?></td>
                  </tr>
                  <tr>
                    <th>Tipe Kamar</th>
                    <td><?php echo $dt_rsv['nm_kmr']; ?></td>
                  </tr>
                  <tr>
                    <th>Check In</th>
                    <td><?php echo shortdate_indo($dt_rsv['tgl_dtg']); ?></td>
                  </tr>
                   <tr>
                    <th>Check Out</th>
                    <td><?php echo shortdate_indo($dt_rsv['tgl_plg']); ?></td>
                  </tr>
                  <tr>
                    <th>Durasi</th>
                    <td><?php echo $dt_rsv['lama_nginap']; ?> Hari</td>
                  </tr>
                  <tr>
                    <th>Jumlah Kamar</th>
                    <td><?php echo $dt_rsv['jml_kamar']; ?> Kamar</td>
                  </tr>
                  <tr>
                    <th>Total Biaya</th>
                    <td><strong><span style="font-size: 20px;"><?php echo rupiah($dt_rsv['total_biaya']); ?></span></strong></td>
                  </tr>
                </table>
                <?php endforeach ?>
                
                <ul>
                  <li><small>Mohon simpan ID Reservasi anda untuk melanjutkan proses administrasi check-in di hotel.</small></li>
                  <li><small>Harap cetak bukti reservasi yang akan diserahkan kepada resepsionis pada saat check-in.</small></li>
                </ul>

                <div class="form-group">
                  <a href="<?php echo base_url().'reservasi/cetak_pdf/'.$dt_rsv['id_rsv'] ?>" class="btn btn-success col-md-offset-5"><i class="icon icon-print"></i> Cetak PDF</a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <hr>
