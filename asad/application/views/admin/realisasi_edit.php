<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <?php echo form_open_multipart('admin/submit_update_rencana_pengeluaran'); ?>
        <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_realisasi')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Tambah Item Realisasi</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
        <h6 style="margin-bottom:20px;">Tambah Item Realisasi</h6>
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
                                  <label>Nama Barang</label>
                                  <input type="hidden" placeholder="Silahkan input nama dana" name="penge_id" class="form-control" id="judul" value="<?php echo $realisasi[0]->real_id?>" required>
                                  <input type="text" placeholder="Silahkan input nama dana" name="nama_barang" class="form-control" id="judul" value="<?php echo $realisasi[0]->real_nama?>" required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Harga</label>
                                  <input type="text" placeholder="Silahkan input harga" name="harga" id="harga" onchange="sumdata();" class="form-control" id="judul"  value="<?php echo $realisasi[0]->real_harga?>"  required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                    <label for="seltype">Pilih Tipe Rencana</label>
                                    <select class="form-control" id="seltype" name="tipe_rencana"  value="<?php echo $pengeluaran[0]->penge_tipe?>"  required>
                                        <option value="habis_pakai">Belanja Habis Pakai</option>
                                        <option value="aset_tetap">Belanja Aset Tetap Modal Lain</option>
                                        <option value="bahan_material">Belanja Bahan Material</option>
                                        <option value="cetak_pengadaan">Belanja Cetak dan Pengadaan</option>
                                        <option value="jasa_kantor">Belanja Jasa Kantor</option>
                                        <option value="makan_minum">Belanja Makan dan Minum</option>
                                        <option value="pemeliharaan">Belanja Pemeliharaan</option>
                                        <option value="alat_mesin">Belanja Peralatan dan Mesin</option>
                                        <option value="kendaraan">Belanja Pemeliharaan Kendaraan</option>
                                        <option value="dinas_luar">Belanja Perjalanan Dinas</option>
                                    </select>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="number" placeholder="Silahkan input harga" name="jumlah" id="jumlah" onchange="sumdata();" class="form-control" id="judul"  value="<?php echo $realisasi[0]->real_jumlah?>"  required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Total</label>
                                  <input type="number" placeholder="Silahkan input harga" name="total" id="total" ="sumdata();" class="form-control" id="judul"  value="<?php echo $realisasi[0]->real_total?>"  required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Keterangan</label>
                                  <input type="text" placeholder="Silahkan input harga" name="keterangan" class="form-control" id="judul"  value="<?php echo $realisasi[0]->real_ket?>"  required>
                              </div>    
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                              <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="date" name="tanggal" class="form-control"  value="<?php echo $realisasi[0]->real_tanggal?>" required>
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
      
      function sumdata(){
        let harga = $('#harga').val();
        let jumlah = $('#jumlah').val();
        let total = $('#total').val();
        
        let result = parseFloat(harga) * parseFloat(jumlah);
        if(!isNaN(result)){
          $('#total').val(result);
        }
      }
    </script>