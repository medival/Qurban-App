<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

  <style>
    .tabel td{
      padding: .3rem;
    }
  </style>

</head>

<body onload="window.print()">

  <div class="container-fluid">

    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
      <div class="card">
        <div class="card-header  ">
        <div class="text-center">
            <img src="<?=base_url();?>assets/img/logo.png" alt="logo" width="120" class="shadow-light rounded-circle">
            <h5 class="mt-2">Qurban App</h5>
          </div>
          
        </div>
        <div class="card-body">
   
          <div class="text-center">
          <h3 class="mb-0">Invoice Transaksi</h3>
              Tanggal : <?= date('d-M-Y')?>
              <hr>
          </div>
          <?php foreach($dataTransaksi as $row) : ?>
            
          <div class="row mb-4">
            <div class="col-sm-6">
              <div class="table-responsive-sm">
                <table class="tabel">
                  <tr>
                    <td width="50%">Nama</td>
                    <td width="20%">:</td>
                    <th><?= $row->nama; ?></th>
                  </tr>
                  <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <th><?= $row->nis; ?></th>
                  </tr>
                  <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <th>Kelas <?= $row->kelas; ?><?= $row->ruang; ?></th>
                  </tr>
                  <tr>
                    <td>Rincian</td>
                    <td>:</td>
                    <th>
                      
                    </th>
                  </tr>
                </table>
              </div>
              
              
              <!-- <h3 class="text-dark mb-1">Wiro</h3>
              <div>NIS: 1212</div>
              <div>Kelas: Kelas 1B</div> -->
            </div>

            <div class="col-sm-12 mt-2">
              <div class="table-responsive-sm">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="center">#</th>
                      <th>Keterangan</th>
                      <th class="right">Nominal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="center">1</td>
                      <td class="left"><?= $row->kredit_debet; ?></td>
                      <td class="right">Rp. <?= number_format($row->nominal,0,',','.'); ?></td>
                  </tbody>
                </table>
              </div>
            </div>
            
            <div class="col-lg-9 col-sm-9">
            </div>
            <div class="col-lg-3 col-sm-3">
            <div style="margin-bottom: 6rem;">Petugas</div>
            <strong class="text-dark"><?php echo $_SESSION['name'] ?></strong>
            </div>
          </div>
          <?php endforeach ?>
          <div class="row">
            
          </div>
        </div>
        <div class="card-footer bg-white">
          <p class="mb-0">Copyright &copy; <?=date('Y')?> Skripsi Tabungan Qurban | Yusuf Sugiarto | STI201702547</p>
        </div>
      </div>
    </div>
  </div>


  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>