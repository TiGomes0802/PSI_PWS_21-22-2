<!doctype html>
<html lang="en" class="h-100">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title><?php echo APP_NAME?></title>

    <script src="././public/js/script.js"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <link href="sticky-footer-navbar.css" rel="stylesheet">
</head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <div class="container container_margem">
                <h2 class="text-left top-space">Fatura Create</h2>
                <h2 class="top-space"></h2>
                <div class="row">
                    <div class="col-sm-12">

                            <br>
                            <div class="boxer">
                                <div class="row"id="row1">
                                    <div class="col-3">
                                    <p type="text"disabled>Cliente: <?= $fatura->user_cliente->username?><text>
                                    <p type="text"disabled>Email: <?= $fatura->user_cliente->email?><text>
                                    <p type="text"disabled>Nif: <?= $fatura->user_cliente->nif?><text>
                                    <br>
                                    </div>
                                </div>
                            </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Lista de produtos</h4>
                                    </div>
                                    <div class="card-body">

                                        <?php if($linhasfatura != null){foreach ($linhasfatura as $linhafatura) { ?>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Descrição do produto</label>
                                                    <input type="text" class="form-control" value="<?= $linhafatura->produto->descricao ?>" disabled>
                                                </div>
                                                <div class="col">
                                                    <label>Referencia</label>
                                                    <input type="number" class="form-control" value="<?= $linhafatura->produto->referencia ?>" disabled>
                                                </div>
                                                <div class="col">
                                                    <label>Valor</label>
                                                    <input type="text" class="form-control" value="<?= number_format($linhafatura->valor, 2); ?>€" disabled>
                                                </div>
                                                <div class="col">
                                                    <label>Valor Iva</label>
                                                    <input type="text" class="form-control" value="<?= number_format($linhafatura->valoriva, 2);?>€" disabled>
                                                </div>
                                                <div class="col">
                                                    <label>Quantidade</label>
                                                    <input type="number" class="form-control" value="<?= $linhafatura->quantidade ?>" disabled>
                                                </div>
                                            </div>
                                        <?php } }?>
                                    </div>
                            </div>
                            <br>

                            <div class="boxer">
                                <div class="row end" id="row1">
                                    <div class="col-3">
                                        <label for="valortotal">Valor total:</label>
                                        <input type="text" name="valortotal" class="form-control" value="<?php if(isset($fatura)) { echo number_format($fatura->valortotal,2); }?>€"disabled>
                                    </div>

                                    <div class="col-3">
                                        <label for="ivatotal">Iva total:</label>
                                        <input type="text" name="ivatotal" class="form-control" value="<?php if(isset($fatura)) { echo number_format($fatura->ivatotal,2); }?>€" disabled>
                                        <br>
                                    </div>
                                </div>
                            </div>

                            <br>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
