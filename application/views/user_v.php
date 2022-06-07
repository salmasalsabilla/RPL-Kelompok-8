
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />

    <title>Kelola User</title>

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
        .password {

            display:inline-block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 15ch;
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
                                <a class="nav-link " href="<?=base_url()?>Buku" title="Daftar Buku">
                                    <i class="fas fa-book"></i>
                                    <span class="ml-3"> Daftar Buku</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?=base_url()?>User" title="Kelola User">
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
                    <h3 class="bg-white">User Role</h3>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fa fa-plus"><strong> Tambah User</strong></i>
                    </button>
                </div>

                <!-- Modal Tambah Daftar User-->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-white">
                        <h4 class="modal-title" id="staticBackdropLabel">Tambah User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>User/add" method="post" enctype="multipart/form-data">
                                
                                
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Username</label>
                                    <input class="form-control" name="username" id="exampleFormControlInput1" placeholder="ex:Daniel">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Password</label>
                                    <input class="form-control" name="password" id="exampleFormControlInput1" placeholder="ex:@@asuqwn12">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input class="form-control" name="email" id="exampleFormControlInput1" placeholder="ex: mahasiswa@gmail.com" type="email">
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Category</label>
                                <select class="form-control" name="user_role" id="exampleFormControlSelect1">
                                    <option value="2">Pustakawan</option>
                                    <option value="3">Mahasiswa</option>
                                </select>
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

               

                <!-- Pustakawan -->
                <div class="m-2 bg-white p-4 mt-4">
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
                    <h5>List Pustakawan</h5>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            
                            <th scope="col">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?> 
                        <?php foreach ($user as $K): ?>
                        <?php if ($K['user_role'] == '2'): ?>
                        <tr class="kelolauser">
                            <th scope="row"><?=$i?></th>
                            <td class="username"><?=$K['username']?></td>
                            <td class="password">
                                  <?=$K['password']?>
                                      
                            </td>
                            <td class="email"><?=$K['email']?></td> 
                            <td>
                                <?php if ($K['user_role'] == '2'): ?>
                                    <?php echo "Pustakawan" ?>
                                <?php endif ?>
                                
                            </td>
                            
                            <td>
                            <?php $i++ ?>
                                <a href="<?=base_url();?>user/ubah/<?= $K['id'];?>" class="badge"
                                    >
                                <button type="button" class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </button>
                                </a>    
                                
                                
                                <a href="<?=base_url();?>User/del/<?= $K['id'];?>" 
                                    onclick= "return confirm('Apakah Akun User(Pustakawan) Ini Akan Dihapus?');">
                                <button type="button" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                </a>
                            </td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

                 <!-- Mahasiswa -->
                <div class="m-2 bg-white p-4 mt-4">
                       
                    
                    <h5>List Mahasiswa</h5>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?> 
                        <?php foreach ($user as $K): ?>
                        <?php if ($K['user_role'] == '3'): ?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$K['username']?></td>
                            <td class="password"><?=$K['password']?></td>
                            <td><?=$K['email']?></td> 
                         
                            <td>
                                <?php if ($K['user_role'] == '3'): ?>
                                    <?php echo "Mahasiswa" ?>
                                <?php endif ?>
                                
                            </td>
                            <td>
                            <?php $i++ ?>
                                <a href="<?=base_url();?>user/ubah/<?= $K['id'];?>" class="badge"
                                    >
                                <button type="button" class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </button>
                                </a>    
                                
                                
                                <a href="<?=base_url();?>User/del/<?= $K['id'];?>" 
                                    onclick= "return confirm('Apakah Akun User(Mahasiswa) Ini Akan Dihapus?');">
                                <button type="button" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                </a>
                            </td>
                        </tr>
                        <?php endif ?>
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