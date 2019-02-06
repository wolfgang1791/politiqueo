<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <html lang="es">
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Politiqueo</title>
         <link rel="icon" href="<?=base_url()?>img/icon-peru.png">
         <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
         <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
         <link rel="stylesheet" href="<?php echo base_url()?>css/style-layout.css">
         <link rel="stylesheet" href="<?php echo base_url()?>css/style-layoutAdmin.css">
     </head>
     <body>
         <script src="<?php echo base_url()?>js/libraries/jquery-3.3.1.min.js"></script>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1><a class="home-link" href="<?php echo base_url()?>">POLITIQUEO</a></h1>
                    </div>
                </div>
            </div>
        </header>
        <div id="main-content">
            <?php $this->load->view($content,$dataView); ?>
        </div>
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 developed">
                        LambdaDev - 2018
                    </div>
                </div>
            </div>
        </footer>
     </body>
 </html>
