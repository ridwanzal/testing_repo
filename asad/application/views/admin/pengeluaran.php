<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <?php echo form_open_multipart('pengeluaran/submit_rencana_pengeluaran'); ?>
        <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_pendapatan')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li><a href="<?php echo base_url('daftar_pengeluaran')?>">Daftar Rencana Pengeluaran</a></li>
                    <li>Tambah Rencana Pengeluaran</li>
                  </ul>
              </div>
              <div class="col-lg-3 col-md-3 col-xs-3 w-50">
                  <select class="form-control" id="seltype" name="tipe_rencana" required>
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
          <br/>
          <br/>
        <h6 style="margin-bottom:20px;">Tambah Menu Rencana Pengeluaran</h6>
        <div class="alert alert-success" role="alert">
          Total Pendapatan kamu hingga saat ini sebesar <?php 
                  setlocale(LC_MONETARY,"de_DE");          
                  $money = $total_pendapatan[0]->total_pendapatan;
                  // echo '<b>IDR.'. number_format($total_pendapatan[0]->total_pendapatan, 2).'</b>';
                  echo '<b>'.money_format("%.2n", $money) .'</b>';
                
                ?>
        </div>
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
                                    <label for="seltype">Pilih Tipe Rencana</label>
                                    <select class="form-control" id="seltype" name="tipe_rencana" required>
                                        <option value="1001">1001 - Belanja Habis Pakai</option>
                                        <option value="1002">1002 - Belanja Aset Tetap Modal Lain</option>
                                        <option value="1003">1003 - Belanja Bahan Material</option>
                                        <option value="1004">1004 - Belanja Cetak dan Pengadaan</option>
                                        <option value="1005">1005 - Belanja Jasa Kantor</option>
                                        <option value="1006">1006 - Belanja Makan dan Minum</option>
                                        <option value="1007">1007 - Belanja Pemeliharaan</option>
                                        <option value="1008">1008 - Belanja Peralatan dan Mesin</option>
                                        <option value="1009">1009 - Belanja Pemeliharaan Kendaraan</option>
                                        <option value="1010">1010 - Belanja Perjalanan Dinas</option>
                                    </select>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Nama Barang</label>
                                  <input type="text" placeholder="Silahkan input nama dana" name="nama_barang" class="form-control" id="judul" required>
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
                                  <input type="text" placeholder="Silahkan input harga" name="jumlah" id="jumlah" onchange="sumdata();" class="form-control" id="judul" required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Total</label>
                                  <input type="hidden" id="total_pengeluaran" value="<?php echo $total_pengeluaran[0]->total_pengeluaran;?>">
                                  <input type="hidden" id="total_pendapatan" value="<?php echo $total_pendapatan[0]->total_pendapatan;?>">
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
        let pendapatan = $('#total_pendapatan').val();
        let pengeluaran = $('#total_pengeluaran').val();
        
        let result = parseFloat(harga) * parseFloat(jumlah);
        let result_pendapatan = parseFloat(pendapatan);
        let result_pengeluaran = result + parseFloat(pengeluaran);
        
        if(!isNaN(result)){
          $('#total').val(result);
          if(result_pengeluaran > result_pendapatan){
              alert('Pengeluaran anda sebesar Rp. '+result_pengeluaran+' sudah melebihi ambang batas');
              $('#jumlah').val('');
              $('#harga').val('');
              $('#total').val('');
          }        
        }
      }
    </script>