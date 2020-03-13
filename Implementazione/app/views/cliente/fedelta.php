<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gruppo Aereo 4 - Area fedeltà</title>
    <?php include("../app/template/header.php") ?>
    <link type="text/css" rel="stylesheet" href="../css/style.css" />
</head>

<body>
<?php include("../app/template/menu.php") ?>
<div class="body-cont px-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="fidelity-profile-image">
                    <?=substr($_SESSION["nome_cliente"], 0, 1);?>
                </div>
            </div>
            <div class="col-md-9">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 px-5 table-responsive">
                <h4 class="py-2">Le tue prenotazioni:</h4>
                <table class="table table-striped " aria-describedby="tabella_prenotazioni">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Da</th>
                        <th scope="col">A</th>
                        <th scope="col">Data</th>
                        <th scope="col">Pagamento</th>
                        <th scope="col">Punti</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Milano </td>
                        <td>Barcellona</td>
                        <td>2/3/2020</td>
                        <td>Pagato</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Milano </td>
                        <td>Barcellona</td>
                        <td>2/3/2020</td>
                        <td>Annullato</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Milano </td>
                        <td>Barcellona</td>
                        <td>2/3/2020</td>
                        <td>In sospeso</td>
                        <td>100</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $dir ?>js/script.js"></script>
<?php include("../app/template/footer.php") ?>
</body>

</html>
