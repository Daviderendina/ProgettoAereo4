<!doctype html>
<html lang="en">
<head>
    <title>Gruppo Aereo 4</title>
    <?php include("../app/template/header.php") ?>
</head>
<body>
<?php include("../app/template/menu.php") ?>
<div class="container pb-5 pt-5 mt-5">
    <div class="row">
        <div class="col text-center">
            <h2>Registrati al programma fedeltà</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-auto">
            <form class="py-md-4 px-md-5">
                <!--<div class="form-row px-3 mb-4">
                  <div class="success mx-auto">Account registrato! Accedi compilando il form.</div>
                </div>-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cognome">Cognome</label>
                        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="data_nascita">Data</label>
                        <input type="text" class="form-control datepicker" id="data_nascita" name="data_nascita" placeholder="Data di nascita">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="indirizzo">Indirizzo</label>
                        <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="Indirizzo">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="città">Città</label>
                        <input type="text" class="form-control" id="città" name="città" placeholder="Città">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cap">CAP</label>
                        <input type="number" class="form-control" id="cap" name="cap" placeholder="CAP">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="conferma_password">Conferma password</label>
                        <input type="password" class="form-control" id="conferma_password" name="conferma_password" placeholder="Conferma la password">
                    </div>
                </div>
                <div class="form-row px-3 pt-4 pb-3">
                    <div class="error mx-auto">Indirizzo e-mail già registrato.</div>
                </div>
                <div class="form-row pt-4">
                    <div class="form-group col-md-4 mx-auto">
                        <button type="submit" class="btn btn-primary w-100">Registrati</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../app/template/footer.php") ?>
</body>
</html>