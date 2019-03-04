
      
      <!-- End Navbar -->
      <div class="content">
        
        
        <div class="row">
          
          <div class="col-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title"> Jenis Tanah</h2>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                      <td>Nama</td>
                      <td>Nilai</td>
                      <td>Keterangan</td>
                      </tr>
                    </thead>
                  <tbody>
                      <?php 
                 
                  foreach ($list_kec as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['jt']; ?></td>
                    <td><?php if($row['jt']=='0'){echo "Gromosol";} elseif ($row['jt']=='1'){echo "Latosol";} elseif ($row['rbl']=='2'){echo "Regosol";} else {echo "Alluvial";}  {
                      # code...
                    } ?> </td>
                    <?php foreach ($list_profile as $rows) {?>
                   <td class="text-center"<?php if($rows['sebagai']=="user"){echo 'hidden="yes"';} else{} ;?>><?php }?>
                      <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $row['nama']; ?>"><i class="tim-icons icon-settings"></i></button>
                    </td>
                    <?php } ?>
                  </tr>
                </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php   
   foreach ($list_kec as $rows) {
?>
<div id="edit<?php echo $rows['nama']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
        <form action="Tanah/edit" method="post">
        <table class="table borderless">
         
              <input type="hidden" name="nama" class="form-control input-sm" value="<?php echo $rows['nama']; ?>" readonly>
           
          <tr>
            <th width="30%">Nilai</th>
            <td width="3%">:</td>
            <td>
              <input type="text" name="jt" class="form-control input-sm" style="color: black" value="<?php echo $rows['jt']; ?>" required="" >
            </td>
          </tr>
         
          
      </table>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-success" style="margin-left: 20px;">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<?php } ?>
     