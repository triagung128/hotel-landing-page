  <header role="banner" class="probootstrap-header">
    <!-- <div class="container"> -->
    <div class="row">
      <a href="index.html" class="probootstrap-logo visible-xs"><img src="<?php echo base_url()?>assets/img/logo_sm.png" class="hires" width="120" height="33" alt="Free Bootstrap Template by uicookies.com"></a>
      
      <a href="#" class="probootstrap-burger-menu visible-xs"><i>Menu</i></a>
      <div class="mobile-menu-overlay"></div>

      <nav role="navigation" class="probootstrap-nav hidden-xs">
        <ul class="probootstrap-main-nav">
          <li class="<?php if($this->uri->segment(1)=='home' || $this->uri->segment(1)==NULL){echo 'active';}?>"><a href="<?php echo base_url('home')?>">Home</a></li>
          <li class="<?php if($this->uri->segment(1)=='kamar'){echo 'active';}?>"><a href="<?php echo base_url('kamar')?>">Kamar</a></li>
          <li class="hidden-xs probootstrap-logo-center"><a href="<?php echo base_url('home')?>"><img src="<?php echo base_url()?>assets/img/logo_md.png" class="hires" width="181" height="50" alt="Free Bootstrap Template by uicookies.com"></a></li>
          <li class="<?php if($this->uri->segment(1)=='reservasi'){echo 'active';}?>"><a href="<?php echo base_url('reservasi')?>">Reservasi</a></li>
          <li class="<?php if($this->uri->segment(1)=='kontak'){echo 'active';}?>"><a href="<?php echo base_url('kontak')?>">Kontak</a></li>
        </ul>
        <div class="extra-text visible-xs">
          <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
          <h5>Connect With Us</h5>
          <ul class="social-buttons">
            <li><a href="#"><i class="icon-twitter"></i></a></li>
            <li><a href="#"><i class="icon-facebook2"></i></a></li>
            <li><a href="#"><i class="icon-instagram2"></i></a></li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- </div> -->
  </header>