
      
      <!-- End Navbar -->
      <div class="content">
        
        
        <div class="row">
          
          <div class="col-12">
            <div class="card ">
              <div class="card-header">
                <h2 class="card-title"> Kecamatan</h2>
              </div><?php foreach ($list_profile as $rows) {?>
              <div class="card-header" <?php if($rows['sebagai']=="user"){echo 'hidden="yes"';} else{} ;?>>
                <button type="button" class="btn btn-primary btn-xl" data-toggle="modal" data-target="#tambah"><i class="tim-icons icon-simple-add"></i></button>
              </div><?php } ?>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                      <td>No</td>
                      <td>Nama</td>
                      
                      </tr>
                    </thead>
                  <tbody>
                      <?php 
                 $i=1;
                  foreach ($list_kec as $row) {
                  ?>
                  
                  <tr>
                    <td><?php echo $i++;?><?php  $row['id']; ?></td>
                    <td style="font-style: capitallized"><?php echo $row['nama']; ?></td>
                    <?php foreach ($list_profile as $rows) {?>
                    <td class="text-center" <?php if($rows['sebagai']=="user"){echo 'hidden="yes"';} else{} ;?>><?php }?>
                      <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>"><i class="tim-icons icon-settings"></i></button>
                      <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $row['id']; ?>"><i class="tim-icons icon-trash-simple"></i></button>
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
<div id="edit<?php echo $rows['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
        <form action="Kecamatan/edit" method="post">
        <table class="table borderless">
         
              <input type="hidden" name="id" class="form-control input-sm" value="<?php echo $rows['id']; ?>" readonly>
            
          <tr>
            <th width="30%">Nama</th>
            <td width="3%">:</td>
            <td>
              <input type="text" name="nama" class="form-control input-sm" style="color: black" value="<?php echo $rows['nama']; ?>" required="" >
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
     
     <div id="tambah" class="modal fade" role="dialog" style="margin-top: -90px" width="auto">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Kecamatan</h4>
      </div>
      <div class="modal-body">
        <form action="Kecamatan/tambah" method="post">
        <table class="table borderless">
            <tr>
            <th width="20%">Nama</th>
            <th width="5%">:</th>
            <td colspan="2">
              <input type="text" name="nama" class="form-control input-sm" style="color: black" value="" required="" >
            </td>
          </tr>
          <tr>
            <th colspan="6" style="text-align: center;" ><u>Nilai Kriteria</u></th>
          </tr>
          <tr>
            <th style="font-size: 12px">Kelerengan </th>
            <th width="1%">:</th>
            <td width="20%">
              <select  class="form-control" name="k" style="height: auto; color: black" required=""/>
                  <option value="0">0-8%</option>
                  <option value="1">8-15%</option>
                  <option value="2">15-25%</option>
                  <option value="3">25-40%</option>
                  <option value="4">>40%</option>  
                </select>
            </td>
            <th width="20%" style="font-size: 12px">Penggunaan Lahan</th>
            <th width="1%">:</th>
            <td width="20%">
              <select class="form-control" name="pl" style="height: auto; color: black" required=""/>
                  <option  value="0">Hutan</option>
                  <option value="1">Sawah/Ladang/Tambak</option>
                  <option value="2">Kebun/Lapangan</option>
                  <option value="3">Pemukinam</option>
                  <option value="4">Industri</option>  
                </select>
            </td>
          </tr>  

          <tr>
            <th style="font-size: 12px">Rawan Longsor </th>
            <th width="1%">:</th>
            <td width="25%">
              <select  class="form-control" name="rbl" style="height: auto; color: black" required=""/>
                  <option value="0">Rendah</option>
                  <option value="1">Sedang</option>
                  <option value="2">Tinggi</option>
                  
                </select>
            </td>
            <th width="25%" style="font-size: 12px">Curah Hujan</th>
            <th width="1%">:</th>
            <td width="25%">
              <select class="form-control" name="ch" style="height: auto; color: black" required=""/>
                  <option value="0">>4000</option>
                  <option value="1">2750-4000</option>
                  <option value="2">1500-2750</option>
                 
                </select>
            </td>
          </tr> 

          <tr>
            <th style="font-size: 12px">Cadangan Air Tanah </th>
            <th width="1%">:</th>
            <td width="25%">
              <select  class="form-control" name="cat" style="height: auto; color: black" required=""/>
                  <option style="color: black" value="0">>10 l/d/km2</option>
                  <option value="1">2.5-10 l/d/km2</option>
                  <option value="2">< 2.5 l/d/km2</option>
                  <option value="3">Merata Asin</option>
                  <option value="4">Krisis Air</option>  
                </select>
            </td>
            <th width="25%" style="font-size: 12px">Jenis Tanah</th>
            <th width="1%">:</th>
            <td width="25%">
              <select class="form-control" name="jt" style="height: auto; color: black" required=""/>
                  <option value="0">Gromosol</option>
                  <option value="1">Latosol</option>
                  <option value="2">Regosol</option>
                  <option value="3">Alluvial</option>
                </select>
            </td>
          </tr>          
      </table>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-success" style="margin-left: 20px;">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php   
   foreach ($list_kec as $rows) {
?>
<div id="hapus<?php echo $rows['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Kecamatan</h4>
      </div>
      <form method="post" action="Kecamatan/delete">
      <div class="modal-body">
        <h3 align="center" style="color: black">
          Apakah anda yakin ingin menghapus <br> Kecamatan <?php echo $rows['nama']; ?> ?
        </h3>
        <h6 style="color: red; text-align: center;">Data yang sudah dihapus tidak dapat dikembalikan</h6>
        <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
      </form>
    </div>

  </div>
</div>
<?php } ?>
