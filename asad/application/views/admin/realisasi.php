<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <?php echo form_open_multipart('realisasi/submit_realisasi'); ?>
        <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                  <li><a href="<?php echo base_url('daftar_pendapatan')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                  <li><a href="<?php echo base_url('daftar_pengeluaran')?>">Daftar Item Realisasi</a></li>
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
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                    <!-- <?php
                                      // var_dump($daftar_pengeluaran_hasil);
                                      // exit;
                                    ?> -->
                                    <label for="seltype">Pilih Dari Rencana Pengeluaran</label>
                                    <select class="form-control" id="seltype" name="nama_barang" required>
                                        <?php
                                          foreach($daftar_pengeluaran_hasil as $list){ ?>
                                                  <option value="<?php echo $list->penge_id ?><?php echo ' - ' ?><?php echo $list->penge_nama ?><?php echo ' - ' ?><?php echo $list->penge_tipe ?>"><?php echo $list->penge_tipe; echo $list->penge_id; ?><?php echo ' - ' ?><?php echo $list->penge_nama ?></option>
                                          <?php }
                                        ?>
                                    </select>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Harga</label>
                                  <input type="text" placeholder="Silahkan input harga" name="harga" id="harga" onchange="sumdata();" class="form-control" id="judul" required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="number" placeholder="Silahkan input harga" name="jumlah" id="jumlah" onchange="sumdata();" class="form-control" id="judul" required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Total</label>
                                  <input type="number" placeholder="Silahkan input harga" name="total" id="total" ="sumdata();" class="form-control" id="judul" required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Keterangan</label>
                                  <input type="text" placeholder="Silahkan input harga" name="keterangan" class="form-control" id="judul" required>
                              </div>    
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                              <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="date" name="tanggal" class="form-control"  required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Upload Image Proof</label>
                                    <input name="upload_image" type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                </form>    
                            </div>
                        </div>
                        <br/>
                        <input type="submit" value="Simpan" class="btn btn-sm btn-success" style="width:200px;" name="submit1" id="submit_pdpt"/> 
              </div>
            </div>
          </div>
        <br/>

      <!-- Tab panes -->

    <?php echo form_close();?>
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