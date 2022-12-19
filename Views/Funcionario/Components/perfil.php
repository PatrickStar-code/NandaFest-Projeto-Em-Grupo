<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
?>
<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="<?php
                                if ($_SESSION["login"]->img == null) {
                                    echo 'https://static.vecteezy.com/ti/vetor-gratis/p1/1505042-empregado-icone-gratis-vetor.jpg';
                                } else {
                                    echo $_SESSION["login"]->img;
                                }
                                ?>" alt="" />

                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?php echo $_SESSION["login"]->nome ?>
                    </h5>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
         
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

            </div>

            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Telefone</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_SESSION["login"]->tel ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Cpf</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_SESSION["login"]->cpf ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Logadouro</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_SESSION["login"]->logadouro ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Celular</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_SESSION["login"]->celular ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_SESSION["login"]->email ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>