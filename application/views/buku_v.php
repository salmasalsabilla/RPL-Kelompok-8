

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />

    <title>Daftar Buku</title>

    <style type="text/css">
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
        
        #sidebar{
            min-height : 100vh;
        }
    </style>
</head>
<body>

    <!-- Navbar  -->
    <nav class="navbar navbar-light bg-info fixed-top">
        <div>
            <button type="button" class="btn btn-outline-light" id="sidebarmenu" title="Daftar Buku">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand text-white">E- |<strong> Perpus</strong></a>
        </div>
        <a href="<?php echo base_url('Login/logout'); ?>">
        <button type="button" class="btn btn-outline-light " title="sign out">
            <i class="fas fa-sign-out-alt"></i>
        </button>
        </a>
    </nav>
    
    <div class="container-fluid mt-4">
        <div class="row">

            <!-- sidebar -->
            <div class="col-2 pt-5 bg-dark" id="sidebar">
                <div class="position-fixed">
                    <ul class="nav flex-column">
                        <?php if($this->session->userdata('user_role') == "1"): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?=base_url()?>Buku" title="Daftar Buku">
                                    <i class="fas fa-book"></i>
                                    <span class="ml-3"> Daftar Buku</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>User" title="Kelola User">
                                    <i class="fas fa-clipboard-list"></i>
                                    <span class="ml-3">Kelola User</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>Pinjam" title="Pinjaman">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    <span class="ml-3">Peminjaman Buku</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>Riwayat" title="pendapatan">
                                    <i class="fas fa-history"></i>
                                    <span class="ml-3">Riwayat Peminjaman</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>

                        <?php elseif($this->session->userdata('user_role') == "2"): ?>
                             <li class="nav-item">
                                <a class="nav-link active" href="<?=base_url()?>Buku" title="Daftar Buku">
                                    <i class="fas fa-book"></i>
                                    <span class="ml-3"> Daftar Buku</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>

                        <?php else:  ?>

                            <li class="nav-item">
                                <a class="nav-link active" href="<?=base_url()?>Buku" title="Daftar Buku">
                                    <i class="fas fa-book"></i>
                                    <span class="ml-3"> Daftar Buku</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url()?>Pinjam" title="pendapatan">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    <span class="ml-3">Peminjaman Buku</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>



                    <?php endif?>
                    </ul>
                </div>
            </div>  

            <!-- main -->
            <div class="col-10" id="utama">
                <!-- Heading  -->
                <div class="head bg-white p-4 m-2 mt-5">
                    <h3 class="bg-white">Daftar Buku 
                        <strong style="font-size: 20px; color:#353434">
                            <?php if($this->session->userdata('user_role') == "3"): ?> 
                                <?="(Mahasiswa)"?>
                            <?php elseif($this->session->userdata('user_role') == "2"): ?> 
                                <?="(Pustakawan)"?>
                            <?php else: ?> 
                                <?="(Admin)"?>
                            <?php endif?>
                        </strong>  
                    </h3>
                    <!-- Button trigger modal -->
                    <?php if($this->session->userdata('user_role') == "1"): ?>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fa fa-plus"><strong> Tambah Buku</strong></i>
                        </button>
                    <?php elseif($this->session->userdata('user_role') == "2"): ?>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fa fa-plus"><strong> Tambah Buku</strong></i>
                        </button>   
                    <?php else: ?>
                        <strong style="color: red"><small>* Silahkan pesan buku, kemudian melapor ke Admin untuk <strong>Konfirmasi!</strong> </small> </strong>
                <?php endif ?>
                </div>

                <!-- Modal Tambah Daftar Buku-->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-white">
                        <h4 class="modal-title" id="staticBackdropLabel">Tambah Daftar Buku</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>Buku/add" method="post" enctype="multipart/form-data">
                                
                                <label for="inputGroupFile01">Masukan Gambar</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="gambar">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Judul Buku</label>
                                    <input class="form-control" name="nama" id="exampleFormControlInput1" placeholder="Input Judul">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Penulis</label>
                                    <input class="form-control" name="penulis" id="exampleFormControlInput1" placeholder="Input Penulis">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tahun Terbit</label>
                                    <input class="form-control" name="tahun" id="exampleFormControlInput1" placeholder="Input Tahun" type="number">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Penerbit</label>
                                    <input class="form-control" name="penerbit" id="exampleFormControlInput1" placeholder="Input Penerbit">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah Buku</label>
                                    <input class="form-control" name="jumlah_buku" id="exampleFormControlInput1" placeholder="Input Jumlah" type="number">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info">Done</button>
                                </div>
                            </form>
                        </div>            
                    </div>
                    </div>
                </div>

                
                <!-- Buku -->
                <div class="makanan m-2 bg-white p-4 mt-4">
                    <?php if($this->session->flashdata('flash')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?=$this->session->flashdata('flash'); ?>
                            <button type="button", class="close", data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif;?>   
                    <?php if(validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert"><?=validation_errors()?>
                            
                        </div>
                    <?php endif;?>
                    
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <?php if($this->session->userdata('user_role') == "3"): ?>  
                                <th scope="col">Status</th>
                            <?php else:?>
                                <th scope="col">Jumlah</th>
                            <?php endif?>
                           
                                <th scope="col" style="">Aksi</th>
                            
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1 ?>
                        <?php foreach ($buku as $K): ?>
						 
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><img class="rounded float-left" src=<?=base_url();?>img/<?= $K['gambar'];?> width="50" height="50" ></td>
                            <td><?=$K['judul']?></td>
                            <td> <?=$K['tahun']?></td> 
                            <td><?=$K['penulis']?></td>
                            <td><?=$K['penerbit']?></td>

                            <?php if($this->session->userdata('user_role') == "3"): ?>  
                                <?php if ($K['jumlah_buku']<1): ?>    
                                    <td>
                                        Buku Tidak Tersedia
                                    </td>
                                <?php endif ?>

                                <?php if ($K['jumlah_buku']>0): ?> 
                                    <td>
                                        Buku  Tersedia
                                    </td>
                                <?php endif ?>
                            <?php else: ?>
                                <td ><?= $K['jumlah_buku'] ?></td>
                            <?php endif?>


                            <td>
                            
                            <?php if($this->session->userdata('user_role') == '1' || $this->session->userdata('user_role') == '2'): ?>
                                <a href="<?=base_url();?>Buku/ubah/<?= $K['id_buku'];?>" class="badge"
                                    >
                                <button type="button" class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </button>
                                </a>    
                                
                                
                                <a href="<?=base_url();?>Buku/del/<?= $K['id_buku'];?>" 
                                    onclick= "return confirm('Apakah Menu Ini Akan Dihapus?');">
                                <button type="button" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                </a>
                            <?php else: ?>
                                <form action="<?=base_url()?>Buku/addmahasiswapinjam/?>" method="post">
                                    <div class="form-group" hidden>
                                        <div class="input-group mb-3" hidden>
                                            <input type="text" name="id_user" class="form-control" aria-label="penulis" placeholder="" value="<?=$this->session->userdata('id')?>">
                                        </div>

                                        <div class="input-group mb-3" hidden>
                                            <input type="text" name="id_buku" class="form-control" aria-label="penulis" placeholder="" value="<?= $K['id_buku'];?>">
                                        </div>

                                        <div class="input-group mb-3" hidden>
                                            <input type="text" name="status_pinjaman" class="form-control" aria-label="status_pinjamanan" placeholder="" value="Meminta Konfirmasi">
                                        </div>                                              
                                    </div>
                                        <?php if($K['jumlah_buku']<1): ?>
                                            <button class="btn btn-success" type="submit" disabled><i class="fas fa-shopping-cart"></i></button>  <!-- Arahkan ke Post -->
                                        <?php else:?>
                                            <button class="btn btn-success" type="submit"><i class="fas fa-shopping-cart"></i></button>  <!-- Arahkan ke Post -->
                                        <?php endif ?>
                                </form>

                                <!-- <a href="<?=base_url();?>Buku/ubah/<?= $K['id_buku'];?>" class="badge"
                                    >
                                <button type="button" class="btn btn-success">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                                </a>  -->
                            <?php endif?>
                            </td>
                        </tr>
                        <?php $i++;?>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

              

                

            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
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

        $('.custom-file-input').on('change', function(){
            let fileName =$(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
  </body>
</html>