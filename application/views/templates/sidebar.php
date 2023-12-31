<div class="col-md-3 left_col sidebar_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a class="site_title"><img style="width: 29px; height: 29px; border-radius: 50%; margin-left: 10px" src="<?= base_url('build/img/'); ?>logo-posyandu-1.png" alt=""></i> <span>POSYANDU</span></a>
        </div>

        <div class="clearfix"></div>
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Master Data</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('anak') ?>"><i class="fa fa-child"></i> Data Anak</a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('lansia') ?>"><i class="fa fa-wheelchair"></i> Data Lansia</a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Layanan</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('penimbangan_anak/index') ?>"><i class="fa fa-file-text"></i> Penimbangan Anak</a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('pemeriksaan_lansia/index') ?>"><i class="fa fa-file-text"></i> Pemeriksaan Lansia</a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Laporan</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('laporan_anak/index') ?>"><i class="fa fa-file-pdf-o"></i> Laporan Anak</a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('laporan_lansia/index') ?>"><i class="fa fa-file-pdf-o"></i> Laporan Lansia</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>