<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_realisasi')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Report</li>
                  </ul>
              </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <table id="t_pengeluaran" class="table table-striped table-bordered responsive nowrap" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Rencana Anggaran</th>
                        <th>Realisasi</th>
                    </tr>
                </thead>        
                        <tbody>
                            <?php if(isset($daftar_report)) {
                              $total_rencana = 0;
                              $total_realisasi = 0;
                              ?>
                            <?php foreach($daftar_report as $list) { 
                              $total_rencana = $total_rencana + $list->rencana_anggaran;
                              $total_realisasi = $total_realisasi + $list->realisasi;
                              ?>
                                <tr>
                                  <td><?php echo $list->kode_id; ?></td>
                                  <td><?php echo $list->nama_barang; ?></td>
                                  <td><?php echo $list->tanggal; ?></td>
                                  <td><?php echo $list->rencana_anggaran; ?></td>
                                  <td><?php echo $list->realisasi; ?></td>
                                </tr>
                                <?php } ?> 
                            <?php } ?>
                        </tbody>
                         <tbody>
                              <tr style="background:#28a745;color:#fff;">
                                  <td colspan="3">Total</td>
                                  <td> 
                                  <?php 
                                    function rupiah($angka){
                                      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                      return $hasil_rupiah;
                                    }
                                    echo '<b>'.rupiah($total_rencana) .'</b>';
                                    ?>
                                    </td>
                                  <td>
                                    <?php
                                      echo '<b>'.rupiah($total_realisasi) .'</b>';
                                    ?>
                                  </td>
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