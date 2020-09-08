  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar elevation-4">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/<?php echo $this->session->userdata('image'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="<?php echo (isset($current['dashboard']))?$current['dashboard']:'' ?>">
            <a href="<?php echo base_url() ?>admin/dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          
            <?php if($this->session->userdata('role_id') != 4) { ?>
              <li class="treeview <?php echo (isset($current['masterdata']))?$current['masterdata']:'' ?>">
                  <a href="#">
                    <i class="fa fa-archive"></i> <span>Master Data</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php echo (isset($subcurrent['datamustahiq']))?$subcurrent['datamustahiq']:'' ?>">
                      <a href="<?php echo base_url() ?>admin/datamustahiq"><i class="fa  fa-chevron-circle-right"></i> Mustahiq</a>
                    </li>
                  </ul>
              </li>
            <?php } ?>

            <li class="treeview <?php echo (isset($current['transaksi']))?$current['transaksi']:'' ?>">
              <a href="#">
                <i class="fa fa-dollar"></i> <span>Transaksi</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if($this->session->userdata('role_id') != 3){ ?>
                  <li class="<?php echo (isset($subcurrent['daftardonasi']))?$subcurrent['daftardonasi']:'' ?>">
                    <a href="<?php echo base_url() ?>admin/daftardonasi"><i class="fa  fa-chevron-circle-right"></i> Donasi</a>
                  </li>
                <?php } ?>
                <li class="<?php echo (isset($subcurrent['proposal']))?$subcurrent['proposal']:'' ?>">
                  <a href="<?php echo base_url() ?>admin/proposal"><i class="fa  fa-chevron-circle-right"></i> Proposal Donasi</a>
                </li>
              </ul>
            </li>

            <?php if($this->session->userdata('role_id') > 4 OR $this->session->userdata('role_id') == 1 OR $this->session->userdata('role_id') == 2){ ?>
              <li class="treeview <?php echo (isset($current['laporan']))?$current['laporan']:'' ?>">
                <a href="#">
                  <i class="fa fa-paste"></i> <span>Laporan</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo (isset($subcurrent['laporanuangmasuk']))?$subcurrent['laporanuangmasuk']:'' ?>">
                    <a href="<?php echo base_url() ?>admin/laporanuangmasuk"><i class="fa  fa-chevron-circle-right"></i> Laporan Rekapitulasi</a>
                  </li>
                  <!-- <li class="<?php echo (isset($subcurrent['laporanuangkeluar']))?$subcurrent['laporanuangkeluar']:'' ?>">
                    <a href="<?php echo base_url() ?>admin/laporanuangkeluar"><i class="fa  fa-chevron-circle-right"></i> Laporan Uang Keluar</a>
                  </li> -->
                </ul>
              </li>
            <?php } ?>
          

          <?php if($this->session->userdata('role_id') == 1) { ?>
            <li class="treeview <?php echo (isset($current['setting']))?$current['setting']:"" ?>">
                  <a href="#">
                    <i class="fa fa-gear"></i> <span>Setting</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php echo (isset($subcurrent['users']))?$subcurrent['users']:"" ?>">
                      <a href="<?php echo base_url() ?>admin/users"><i class="fa  fa-chevron-circle-right"></i> Users</a>
                    </li>
                  </ul>
                </li>
                    <!-- <li class="submenu">
                      <a href=""><i class="fa  fa-chevron-circle-right"></i> Laporan Kegiatan</a>
                    </li>
                    <li class="submenu">
                      <a href=""><i class="fa  fa-chevron-circle-right"></i> Laporan Simpan Potong Gaji</a>
                    </li> -->
        <?php  } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>