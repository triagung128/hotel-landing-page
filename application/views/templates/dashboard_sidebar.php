            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url('dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar-o fa-fw"></i> Reservasi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('data_reservasi')?>">Lihat Data</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('data_reservasi/cetak_pdf')?>">Cetak PDF</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('data_reservasi/cetak_excel')?>">Cetak Excel</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Kamar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('data_kamar')?>">Lihat Data</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('data_kamar/tambah')?>">Tambah Kamar</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('data_kamar/cetak_pdf')?>">Cetak PDF</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>