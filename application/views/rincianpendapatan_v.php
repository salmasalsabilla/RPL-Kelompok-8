<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.13.0/css/font-awesome.min.css" /> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
  <style>
    tbody td:last-child {
      color: darkcyan;
    }
        body {
            background: #edf1f5;
        }

        .nav-item a {
            color: grey;
        }

        .nav-item a.active {
            color: white;
            font-weight: bold;
        }

        .nav-item :hover {
            font-weight: bold;
            color: white;
            /* background-color: blue; */
        }
        .select{
            width: 200px;
        }
        .blue {
           background-color: blue;
        }
        
        #sidebar{
            min-height : 100vh;
        }
  </style>
  <title>rincian</title>
</head>

<body class="bg-light">
      <!-- Navbar  -->
    <nav class="navbar navbar-light bg-info fixed-top">
        <div>
            <button type="button" class="btn btn-outline-light" id="sidebarmenu" title="Daftar Menu">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand text-white">Telkom University |<strong> Kantin Teknik</strong></a>
        </div>
        <a href="<?php echo base_url('Login/logout'); ?>">
        <button type="button" class="btn btn-outline-light " title="sign out">
            <i class="fas fa-sign-out-alt"></i>
        </button>
        </a>
    </nav>


        <?php $i = 1 ; $tot = 0; $totall = 0; $jlh = 0;?> 
          <?php foreach ($order as $K): ?>        
            <?php$i;?>
            <?php$K['pemesan'];?>
            <?php$K['pesanan'];?>
            <?php$K['tgl_pemesanan'];?>
            <?php$K['jumlah'];?>
            <?php$K['harga'];?>
          <?php $jlh = $jlh+$K['jumlah']; ?>
          <?php $tot = $K['harga']*$K['jumlah']; ?>
          <?php $totall = $totall + $tot ?>
            <?php$tot;?>

          
        
        <?php $i++;?>
      <?php endforeach ?>

    <div class="container-fluid mt-4">
        <div class="row">
          <!-- sidebar -->
          <div class="col-2 pt-5 bg-dark" id="sidebar">
                <div class="position-fixed">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url()?>menu" title="Daftar Menu">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="ml-3"> Daftar Menu</span>
                            </a>
                            <hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?=base_url()?>pesanan" title="pendapatan" title="Pesanan">
                                <i class="fas fa-clipboard-list"></i>
                                <span class="ml-3">Pesanan</span>
                            </a>
                            <hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#" title="pendapatan">
                                <i class="far fa-chart-bar"></i>
                                <span class="ml-3">Pendapatan</span>
                            </a>
                            <hr class="bg-secondary">
                        </li>
                    </ul>
                </div>
          </div>
          <div class="col-10" id="utama">
            <div class="row text-white" style="margin-top: 25px;">
      
      <div class="col bg-danger  m-3 p-4 rounded-lg">
        <h5 class="border-bottom pb-3  font-weight-bold">
          <span>Total</span>
          <span class="float-right">IDR</span>
        </h5>
        <div class="row">
          <div class="col">
            <div>Total Pesanan</div>
            <div>Total Pendapatan</div>
          </div>
          <div class="col text-right">
            <div><?= $jlh?></div>
            <div><?='Rp. '.number_format($totall)?></div>
          </div>
        </div>
      </div>
    </div>
            <!-- menu Makanan -->
    <div class="makanan mt-3 bg-white p-4 rounded-lg">
      <form method="post" id="form1" action="<?= base_url("Rincianpendapatan/cetak")?>">
      <div class="row pt-3 pb-3">
        
        <div class="col-6">
          <h5 class="">Daftar Pemasukan</a></h5>
        </div>
        <div class="col-2">
          <input type="date" name="tgl_awal" style="width: auto;">
        </div>
        <div class="col-2">
          <input type="date" name="tgl_akhir" style="width: auto;">
        </div>
        <div class="col-2">
          <button class="btn btn-primary" type="submit" type="button"><i>Cari</i></button>
        </div>
        
      </div>
      </form>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Pemesan</th>
            <th scope="col">Order</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jumlah Pesanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ; $tot = 0;?> 
          <?php foreach ($order as $K): ?>
            

          <tr>
            <th scope="row"><?=$i;?></th>
            <td><?=$K['pemesan'];?></td>
            <td><?=$K['pesanan'];?></td>
            <td><?=$K['tgl_pemesanan'];?></td>
            <td><?=$K['jumlah'];?></td>
            <td><?='Rp. '.number_format($K['harga']);?></td>
          <?php $tot = $K['harga']*$K['jumlah']; ?>

            <td><?='Rp. '.number_format($tot);?></td>

          </tr>
        </tbody>
        <?php $i++;?>
      <?php endforeach ?>
      </table>
      </div>

        
            </div>
      </div>


        </div>

    </div>


  
    <!-- <h3 class="">Rincian Pendapatan</h3> -->


    


 
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <script type="text/javascript">

$(function () {

// mobile aplication
if ($(window).width() < 768) {
    $("#sidebar").hide();
    $("#utama").toggleClass('col-10 col');
} else {
    $("#sidebar").show();
}

// want user show/head navbar
$("#sidebarmenu").click(function () {
    if ($("#sidebar").is(":hidden")) {
        if ($(window).width() < 768) {
            $("#sidebar").show();
            $("#utama").toggleClass('col col-10');
            $(".nav-item span").hide();
            // $(".nav-item hr").hide();
        } else {
            $("#sidebar").show();
            $("#utama").toggleClass('col col-10');
        }

    } else {
        $("#sidebar").hide();
        $("#utama").toggleClass('col-10 col');
    }
});
});
        $(document).ready(function(){
            $("select.select").change(function(){
                var statuspesanan = $(this).children("option:selected").val();
                if (statuspesanan == "done"){
                    // $("#tabel1").remove();
                }
            });
        });
    </script>
</body>

</html>