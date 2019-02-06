<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

<header class="header-login">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"> Área de Administración</h1>
            </div>
        </div>
    </div>
</header>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 card">
                <?php $atributos = array('class' => 'card-body', 'id' => 'form-validado');
                echo form_open(base_url()."Login/acceso",$atributos);?>
                    <div class="form-group">
                    <label>Email</label>
                    <?php $email = array('type'=>'email','name'=> 'email','placeholder'=>'Email','class'=>'form-control');
                    echo form_input($email);
                    ?>
                    <?php echo form_error('email','<div class="form-error">*', '</div>'); ?>
                    </div>
                    <div class="form-group">
                    <label>Contraseña</label>
                    <?php $pass = array('type'=>'password','name'=> 'pass','placeholder'=>'Contraseña','class'=>'form-control');
                    echo form_input($pass); ?>
                    <?php echo form_error('pass','<div class="form-error">*', '</div>'); ?>
                    </div>
                    <h6 id="error"></h6>
                    <button type="button" class="btn btn-peru btn-block send-formlogin">Iniciar Session</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
<script src="js/validations.js"></script>
