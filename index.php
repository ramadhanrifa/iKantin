<?php
include 'fungsi.php';
$jumlah = new jumlah();
?>
<IDOCTYPE html>
    <html lang="en">
    <style> 
    .note {
      background-color: #fff;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 4px;
    }</style>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" ” content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>iKantin wikrama</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>

    <body>
        <nav class="navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-shopping-cart"></i> iKantin wWikrama</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php"><i class="fa fa-home"></i> Beranda</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#buy"><i class="fa fa-shopping-cart"></i> Beli</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"></a></li>
                    </ul>
                </div>

            </div>
            <!-- / .navbar-collapse -->
            <!-- /. container-fluid -->
        </nav>
        <div class="container" style="margin-top: 50px;">
            <div class=" panel-success">
                <div class="panel-body bg-primary">
                    <div class="container">
                        <h1><i class="fa fa-shopping-cart"></i> Selamat datang di iKantin Wikrama</h1>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container">
                        <div class="col-md-10">
                            <h4>Klik disini untuk pembelian <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#buy">
                                    <i class="fa fa-shopping-cart"></i> Beli</button>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container">
                        <?php
                        if (isset($_POST['check'])) {
                            $jmlbakso = $_POST['bakso'];
                            $jmlPc = $_POST['bakwan'];
                            $jmlrt = $_POST['roti'];
                            $jmlss = $_POST['susu'];
                            if ($jmlbakso == null) {
                                $jumlah->getJumlah($jmlPc, 0, $jmlrt, $jmlss);
                            } elseif ($jmlPc == null) {
                                $jumlah->getJumlah(0, $jmlbakso, $jmlrt, $jmlss);
                            } elseif ($jmlrt == null) {
                                $jumlah->getJumlah($jmlPc, $jmlbakso, 0, $jmlss);
                            } elseif ($jmlss == null) {
                                $jumlah->getJumlah($jmlPc, $jmlbakso, $jmlrt, 0);
                            }
                             else {
                                $jumlah->getJumlah( $jmlPc, $jmlbakso, $jmlrt, $jmlss);
                            }
                            $jumlah->setHarga();
                            $jumlah->cetakStruk();
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>


        <!-- [Modal Form] -->

        <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger" style="border-radius: 5px 5px 0px 0px;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                        <h4 class="modal-title" id="">Form Pembelian</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-group" action="" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
                                <input type="number" class="form-control" name="bakwan" id="bakwan" placeholder="Masukkan Jumlah Bakwan Yang Dibeli *" readOnly>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
                                <input type="number" class="form-control" name="bakso" id="bakso" placeholder="Masukkan Jumlah Bakso Yang Dibeli *" readonly>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
                                <input type="number" class="form-control" name="roti" id="roti" placeholder="Masukkan Jumlah Roti Yang Dibeli *" readonly>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
                                <input type="number" class="form-control" name="susu" id="susu" placeholder="Masukkan Jumlah Susu Yang Dibeli *" readonly>
                            </div>


                            <div class="modal-footer">
                            <button type="button" id="btnbakso" onclick="Onlybakso()" class="btn btn-success" style="float:left;">Bakso</button>
                            <button type="button" id="btnroti" onclick="Onlyroti()" class="btn btn-success" style="float:left;">Roti</button>
                            <button type="button" id="btnsusu" onclick="Onlysusu()" class="btn btn-success" style="float:left;">Susu</button>
                            <button type="button" onclick="exit()" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                            <button type="submit" class="btn btn-primary" name="check"><i class="fa fa-check"></i> Cek Total</button>
                            <button type="button" id="btnbakwan" onclick="Onlybakwan()" class="btn btn-success" style="float:left;">Bakwan</button>
                            <button type="button" onclick="Keduanya()" class="btn btn-success" style="float:left;"> Bebas</button>
                            </div>
                            <div class="note">
                                <p>*jika hanya ingin Roti & Susu dan sebgainya cukup klik 'Bebas' dan kosongkan yang tidak diiniginkan</p>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -

-->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

            <!-- Include all compiled plugins (below), or include individual files as needed -->

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    </body>

    </html>

    <script type="text/javascript">
        function Onlybakso() {
            document.getElementById("bakso").readOnly = false;
            document.getElementById("bakwan").readOnly = true;
            document.getElementById("roti").readOnly = true;
            document.getElementById("susu").readOnly = true;
            document.getElementById("btnbakwan").disabled = false;
            document.getElementById("btnroti").disabled = false;
            document.getElementById("btnsusu").disabled = false;
            document.getElementById("btnbakso").disabled = true;
        }

        function Onlybakwan() {
            document.getElementById("bakso").readOnly = true;
            document.getElementById("bakwan").readOnly = false;
            document.getElementById("roti").readOnly = true;
            document.getElementById("susu").readOnly = true;
            document.getElementById("btnbakwan").disabled = true;
            document.getElementById("btnroti").disabled = false;
            document.getElementById("btnsusu").disabled = false;
            document.getElementById("btnbakso").disabled = false;
        }
        function Onlyroti() {
            document.getElementById("bakso").readOnly = true;
            document.getElementById("bakwan").readOnly = true;
            document.getElementById("roti").readOnly = false;
            document.getElementById("susu").readOnly = true;
            document.getElementById("btnbakwan").disabled = false;
            document.getElementById("btnroti").disabled = true;
            document.getElementById("btnsusu").disabled = false;
            document.getElementById("btnbakso").disabled = false;
        }
        function Onlysusu() {
            document.getElementById("bakso").readOnly = true;
            document.getElementById("bakwan").readOnly = true;
            document.getElementById("roti").readOnly = true;
            document.getElementById("susu").readOnly = false;
            document.getElementById("btnbakwan").disabled = false;
            document.getElementById("btnroti").disabled = false;
            document.getElementById("btnsusu").disabled = true;
            document.getElementById("btnbakso").disabled = false;
        }

        function Keduanya() {
            document.getElementById("bakso").readOnly = false;
            document.getElementById("bakwan").readOnly = false;
            document.getElementById("roti").readOnly = false;
            document.getElementById("susu").readOnly = false;
            document.getElementById("btnbakwan").disabled = false;
            document.getElementById("btnroti").disabled = false;
            document.getElementById("btnsusu").disabled = false;
            document.getElementById("btnbakso").disabled = false;
        }

        function exit() {
            document.getElementById("bakso").readOnly = true;
            document.getElementById("bakwan").readOnly = true;
            document.getElementById("roti").readOnly = true;
            document.getElementById("susu").readOnly = true;
        }
    </script>