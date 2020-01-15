<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_realisasi')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Daftar Realisasi</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <?php
                  if($this->session->userdata('role') == "admin"){
                  ?>
                    <button onclick="window.location.href='<?php echo base_url('realisasi');?>' " class="btn btn-sm btn-primary"><span data-feather="plus"></span>&nbsp;&nbsp;Tambah Item Realisasi</a>
                  <?php } 
              ?>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <table id="t_pengeluaran" class="table table-striped table-bordered responsive nowrap" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nomor Referensi</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Upload Bukti</th>
                        <th>Aksi</th>
                    </tr>
                </thead>        
                        <tbody>
                            <?php if(isset($daftar_realisasi)) {
                              $total = 0;
                              ?>
                            <?php foreach($daftar_realisasi as $list) { 
                                $total = $total + $list->real_total;
                              ?>
                                <tr>
                                  <td><?php echo $list->real_id; ?></td>
                                  <td><?php echo $list->real_tipe;echo $list->penge_id; ?></td>
                                  <td><?php echo $list->real_nama; ?></td>
                                  <td><?php echo $list->real_harga; ?></td>
                                  <td title="<?php echo $list->real_jumlah;?>"><?php echo $list->real_jumlah; ?></td>
                                  <td><?php echo $list->real_total; ?></td>
                                  <td><?php echo $list->real_ket; ?></td>
                                  <td><?php echo $list->real_tipe; ?></td>
                                  <td><?php echo $list->real_tanggal; ?></td>
                                  <td><img style="cursor" width="100" src='<?php echo base_url('assets/image_proof/'.$list->real_image_proof);?>'></td>
                                  <td>
                                        <button onclick="window.location.href='<?php echo base_url('realisasi_update/'.$list->real_id);?>' " class="btn btn-sm btn-success">Edit</a>
                                        <button onclick="window.location.href='<?php echo base_url('realisasi_delete/'.$list->real_id);?>' " class="btn btn-sm btn-danger" style="margin-left:10px;">Hapus</a>
                                  </td>
                                </tr>
                                <?php } ?> 
                            <?php } ?>
                        </tbody>
                        <tbody>
                              <tr style="background:#28a745;color:#fff;">
                                  <td colspan="5">Total : </td>
                                  <td> 
                                  <?php 
                                    function rupiah($angka){
                                      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                      return $hasil_rupiah;
                                    }
                                    echo '<b>'.rupiah($total) .'</b>';?></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
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
  });
</script>