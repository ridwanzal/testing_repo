<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_pendapatan')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Daftar Rencana Pendapatan</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <?php
                  if($this->session->userdata('role') == "admin"){
                      ?>
                      <button onclick="window.location.href='<?php echo base_url('pendapatan');?>' " class="btn btn-sm btn-primary"><span data-feather="plus"></span>&nbsp;&nbsp;Tambah Rencana Pendapatan</button></a>
                      <?php } 
                ?>
                <select class="myselect" id="filter_parent" name="filter_pendapatan" style="display:none;margin-left:120px;">
                  <option value="">-- Filter berdasarkan -- </option>
                  <option value="tahun">Tahun</option>
                </select>
                <select class="myselect" id="filter_child1" name="filter_pendapatan" style="display:none;">
                  <option value="">2019</option>
                  <option value="">2020</option>
                  <option value="">2021</option>
                  <option value="">2022</option>
                  <option value="">2023</option>
                  <option value="">2024</option>
                </select>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <table id="t_pendapatan" class="table table-striped table-bordered responsive nowrap" width="100%">
                <thead>
                    <tr>  
                        <th>Id</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>        
                        <tbody>
                            <?php if(isset($daftar_pendapatan)) {
                              $total = 0;
                              ?>
                            <?php foreach($daftar_pendapatan as $list) { 
                                $total = $total + $list->penda_harga;
                              ?>
                                <tr>
                                  <td><?php echo $list->penda_id; ?></td>
                                  <td><?php echo $list->penda_nama; ?></td>
                                  <td><?php echo $list->penda_harga; ?></td>
                                  <td><?php echo $list->penda_tanggal; ?></td>
                                  <td>
                                        <button onclick="window.location.href='<?php echo base_url('pendapatan_update/'.$list->penda_id);?>' " class="btn btn-sm btn-success">Edit</a>
                                        <button onclick="window.location.href='<?php echo base_url('pendapatan_delete/'.$list->penda_id);?>' " class="btn btn-sm btn-danger" style="margin-left:10px;">Hapus</a>
                                  </td>
                                </tr>
                                <?php } ?> 
                            <?php } ?>
                        </tbody>
                        <tbody>
                              <tr style="background:#28a745;color:#fff;">
                                  <td>Total : </td>
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
                              </tr>
                        </tbody>
                </table>
            </div>
          </div>
    </main> 
<script>
  $( document ).ready(function() {
        // $('#t_pendapatan').DataTable({
        //   "responsive" : true,
        // });
        $('#t_pendapatan').DataTable({
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
            }else{
              $('#filter_child1').hide();
            }
        });
  });
</script>