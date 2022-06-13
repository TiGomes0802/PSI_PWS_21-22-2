<?php

echo '<p id="demo"> teste</p>';
$numlinhas = 0
?>
<h2 class="text-left top-space">Fatura Create</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form method="POST" action=<?php echo'./router.php?c=fatura&a=store&numlinhas='."$numlinhas"?>
            <br>
            <div class="boxer">
                <div class="row"id="row1">
                    <div class="col-3">
                    <label for="cliente_id">cliente_id:</label>
                    <input type="number" name="cliente_id" class="form-control" value="<?php if(isset($fatura)) { echo $fatura->cliente_id; }?>">
                    <p><?php
                        if(isset($fatura->errors)) {
                            if (is_array($fatura->errors->on('cliente_id'))) {
                                foreach ($fatura->errors->on('cliente_id') as $error) {
                                    echo $error . '<br>';
                                }
                            } else {
                                echo $fatura->errors->on('cliente_id');

                            }
                        }
                        ?></p>
                    <br>
                    </div>
                </div>
            </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Produtos</h4>
                    </div>
                    <div class="card-body">
                        <h5>Lista de produtos</h5>
                        <br>
                        <div id="product_form">
                            <div class="row"id="row1">
                                <div class="col-md-1">
                                    <label></label>
                                    <input type="button" value="produto" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Produto id</label>
                                    <input type="number" name="produto_id0" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Valor</label>
                                    <input type="number" name="valor0" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Valor Iva</label>
                                    <input type="number" name="valoriva0" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Quantidade</label>
                                    <input type="number" name="quantidade0" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="button" class="btn btn-dark float-end mt-2" onclick=add_more_product() value="adicionar produto">
                    </div>
            </div>
            <br>

            <div class="boxer">
                <div class="row end" id="row1">
                    <div class="col-3">
                        <label for="valortotal">Valor total:</label>
                        <input type="number" name="valortotal" class="form-control" value="<?php if(isset($fatura)) { echo $fatura->valortotal; }?>">
                        <p><?php
                            if(isset($fatura->errors)) {
                                if (is_array($fatura->errors->on('valortotal'))) {
                                    foreach ($fatura->errors->on('valortotal') as $error) {
                                        echo $error . '<br>';
                                    }
                                } else {
                                    echo $fatura->errors->on('valortotal');
                                }
                            }
                            ?></p>
                    </div>

                    <div class="col-3">
                        <label for="ivatotal">Iva total:</label>
                        <input type="number" name="ivatotal" class="form-control" value="<?php if(isset($fatura)) { echo $fatura->ivatotal; }?>">
                        <p><?php
                            if(isset($fatura->errors)) {
                                if (is_array($fatura->errors->on('ivatotal'))) {
                                    foreach ($fatura->errors->on('ivatotal') as $error) {
                                        echo $error . '<br>';
                                    }
                                } else {
                                    echo $fatura->errors->on('ivatotal');
                                }
                            }
                            ?></p>
                        <br>
                    </div>
                </div>
            </div>

            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>