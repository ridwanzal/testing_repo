<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_pengeluaran')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Daftar Rencana Pengeluaran</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
          <div class="row">
            <div class="col-lg-4 col-md-4">
            <?php
                if($this->session->userdata('role') == "admin"){
                    ?>
                      <button onclick="window.location.href='<?php echo base_url('pengeluaran');?>' " class="btn btn-sm btn-primary"><span data-feather="plus"></span>&nbsp;&nbsp;Tambah Rencana Pengeluaran</button>
                    <?php } 
                ?>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="form-group">
                    <?php echo form_open_multipart('pengeluaran/daftar_rencana_pengeluaran'); ?>
                    <div class="input-group mb-3">
                        <select class="form-control" id="seltype" name="tahun" required>
                            <option value="">-- Filter rencana berdasarkan tahun -- </option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2020">2022</option>
                            <option value="2021">2023</option>
                            <option value="2020">2024</option>
                        </select>
                        <div class="input-group-append">
                          <input class="btn btn-outline-secondary" type="submit" value="Filter">
                        </div>
                    </div>
                  <?php echo form_close();?>
              </div>    
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="form-group">
                    <?php echo form_open_multipart('pengeluaran/daftar_rencana_pengeluaran'); ?>
                    <div class="input-group mb-3">
                        <select class="form-control" id="seltype" name="tipe_rencana" required>
                            <option value="">-- Filter rencana berdasarkan tipe -- </option>
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
                        <div class="input-group-append">
                          <input class="btn btn-outline-secondary" type="submit" value="Filter">
                        </div>
                    </div>
                  <?php echo form_close();?>
              </div>    
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <table id="t_pengeluaran" class="table table-striped table-bordered responsive nowrap" width="100%">
                <thead>
                    <tr>
                        <th>Id Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>        
                        <tbody>
                            <?php if(isset($daftar_pengeluaran)) {
                              $total = 0;
                              ?>
                            <?php foreach($daftar_pengeluaran as $list) { 
                                $total = $total + $list->penge_total;
                              ?>
                                <tr>
                                  <td><?php echo $list->penge_tipe; echo $list->penge_id ?></td>
                                  <td><?php echo $list->penge_nama; ?></td>
                                  <td><?php echo $list->penge_harga; ?></td>
                                  <td title="<?php echo $list->penge_jumlah;?>"><?php echo $list->penge_jumlah; ?></td>
                                  <td><?php echo $list->penge_total; ?></td>
                                  <td><?php echo $list->penge_ket; ?></td>
                                  <td><?php echo $list->penge_tipe; echo ' - '; echo $list->penge_tipe_caption; ?></td>
                                  <td><?php echo $list->penge_tanggal; ?></td>
                                  <td>
                                        <button onclick="window.location.href='<?php echo base_url('pengeluaran_update/'.$list->penge_id);?>' " class="btn btn-sm btn-success">Edit</a>
                                        <button onclick="window.location.href='<?php echo base_url('pengeluaran_delete/'.$list->penge_id);?>' " class="btn btn-sm btn-danger" style="margin-left:10px;">Hapus</a>
                                  </td>
                                </tr>
                                <?php } ?> 
                            <?php } ?>
                        </tbody>
                        <tbody>
                              <tr style="background:#28a745;color:#fff;">
                                  <td colspan="4">Total : </td>
                                  <td>
                                  <?php 
                                   function rupiah($angka){
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                  }
                                  
                                  
                                  echo '<b>'.rupiah($total) .'</b>';?>
                                  </td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                              </tr>
                        </tbody>
                </table>
            </div>
          </div>
    </main> 
<script>
  $( document ).ready(function() {
        // $('#t_pengeluaran').DataTable({
        //   "responsive" : true,
        // });

        $('#t_pengeluaran').DataTable({
          "responsive" : true,
          "dom": 'Bfrtip',
          "buttons": [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ],
          "pagingType": "full_numbers",
          "paging": true,
          "lengthMenu": [10, 25, 50, 75, 100],
        });

        $('#filter_parent').on('change', function(){
            let val = $(this).val();
            if(val === 'tahun'){
                $('#filter_child1').show();
                $('#filter_child2').hide();
            }else{
              if(val === 'tipe'){
                $('#filter_child2').show();
                $('#filter_child1').hide();
              }else{
                $('#filter_child1').hide();
                $('#filter_child2').hide();
              }
            }
        });
  });
</script>