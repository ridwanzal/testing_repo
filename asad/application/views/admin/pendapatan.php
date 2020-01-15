<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="overflow-y:scroll;">
        <?php echo form_open_multipart('pendapatan/submit_rencana_pendapatan'); ?>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                <ul class="breadcrumbs">
                  <li><a href="<?php echo base_url('daftar_pendapatan')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                  <li><a href="<?php echo base_url('daftar_pendapatan')?>">Daftar Rencana Pendapatan</a></li>
                  <li>Tambah Rencana Pendapatan</li>
                </ul>
            </div>
        </div>
        <br/>
        <br/>
        <h6 style="margin-bottom:20px;">Tambah Rencana Pendapatan</h6>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                        <?php
                            if($this->session->flashdata('message')){ ?>
                                <div class="alert alert-success alert-dismissible"><?php echo $this->session->flashdata('message') ?>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                                <?    }else if($this->session->flashdata('error')){ ?>
                                    <div class="alert alert-danger alert-dismissible"><?php echo $this->session->flashdata('error') ?>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                                    <?
                                }
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Nama Dana</label>
                                  <input type="text" placeholder="Silahkan input nama dana" name="nama_dana" class="form-control" id="judul" required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Harga</label>
                                  <input type="text" placeholder="Silahkan input harga" name="harga" class="form-control" id="judul" required>
                              </div>    
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                              <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="date" name="tanggal" class="form-control"  required>
                              </div>    
                            </div>
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-sm btn-success" style="width:200px;" name="submit1" id="submit_pdpt"/> 
                  <?php echo form_close();?>
              </div>
            </div>
          </div>
        <br/>

      <!-- Tab panes -->

    </main> 
    <script>
      $(document).ready(function(){
      });
    </script>