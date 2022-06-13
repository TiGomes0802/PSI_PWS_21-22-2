
<h2 class="text-left top-space">Fatura Create</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">

        <form method="POST" action=<?php echo'./router.php?c=linhasfatura&a=store&id_fatura='. $fatura->id?>
            <br>
            <div class="boxer">
                <div class="row"id="row1">
                    <div class="col-3">
                    <label for="cliente_id">Nome do cliente:</label>
                    <input type="text" name="cliente_id" class="form-control" value="<?= $fatura->user_cliente->username?>" disabled>
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
                            <div class="row">

                                <div class="col">
                                    <label>Referencia do produto</label>
                                    <input type="text" name="referencia" class="form-control">
                                    <p><?php
                                        if(isset($naoproduto) and $naoproduto) {
                                            echo 'Produto inexistente';
                                        }
                                        ?></p>
                                </div>
                                <div class="col-2">
                                    <label>Quantidade</label>
                                    <input type="number" name="quantidade" class="form-control" value="1" min="1">
                                    <p><?php
                                        if(isset($produto->errors)) {
                                            if (is_array($produto->errors->on('stock'))) {
                                                foreach ($produto->errors->on('stock') as $error) {
                                                    echo $error .'<br>';
                                                }
                                            } else {
                                                echo $produto->errors->on('stock');

                                            }
                                        }
                                        ?></p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-dark float-end mt-2" value="adicionar produto">
                        <br><br><br>
                        </form>

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
                                <div class="col">
                                    <p></p>
                                    <?php
                                        echo '<a href="router.php?c=linhasfatura&a=delete&id='. $linhafatura->id .'"
                                            class="btn btn-info" role="button">Apagar</a>';

                                    ?>
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
            <?php if($fatura->valortotal > 0){?>
                <div class="row">
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                        <a class="nav-link" href="./router.php?c=fatura&a=updateestado&id=<?= $fatura->id ?>">
                            <button class="btn w-100 p-2 btn-info">Emitir fatura</button>
                        </a>
                    </div>
                </div>
            <?php }?>
            <br>
    </div>
    <br>
</div>