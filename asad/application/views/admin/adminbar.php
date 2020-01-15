<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap">
    <a class="col-sm-3 col-md-2 mr-0" href="<?php echo base_url() ?>admin">
                <span style="width:100%;
                color:#fff;white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;">
                <span>Sistem Anggaran Sekolah</span>
              </span>
    </a>
    <span style="width:100%;
                color:#fff;white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;  "><span data-feather="users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard - <?php
                    print_r('Welcome ' . $this->session->userdata['fullname']);
                  ?>
              </span>
    <form class="form-inline">
    <span class="badge badge-warning">v1.0 Development</span>
    </form>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky" style="position:relative;top:30px;">
              <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <span data-feather="book-open" style="position:relative;top:-3px;margin-right:10px;"></span>
                          Anggaran
                      </button>
                      
                    </h5>
                  </div>
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <ul class="list-group">
                            <a href="<?php echo base_url('daftar_pendapatan'); ?>"><li class="list-group-item"> <span data-feather="arrow-right"></span>&nbsp;Rencana Pendapatan</li></a>
                            <a href="<?php echo base_url('daftar_pengeluaran'); ?>"><li class="list-group-item"><span data-feather="arrow-left"></span>&nbsp;Rencana Pengeluaran</li></a>
                          </ul>
                        </div>
                      </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <a href="<?php echo base_url('daftar_realisasi'); ?>" class="btn btn-default"><span data-feather="book" style="position:relative;top:-3px;margin-right:10px;"></span>Realisasi Biaya</a>
                    </h5>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <a href="<?php echo base_url('daftar_report'); ?>" class="btn btn-default"><span data-feather="book" style="position:relative;top:-3px;margin-right:10px;"></span>Report</a>
                    </h5>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <a href="#" id="logout" style="color:#212529;">
                            <span data-feather="log-out"></span>
                            Logout
                          </a>
                      </button>
                    </h5>
                  </div>
                </div>
              </div>
        </div>
      </nav>