<h2 class="text-left top-space">Fatura Show</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th class="text-center"><h3>Id</h3></th>
            <th class="text-center"><h3>Username</h3></th>
            <th class="text-center"><h3>Email</h3></th>
            <th class="text-center"><h3>Telefone</h3></th>
            <th class="text-center"><h3>Nif</h3></th>
            <th class="text-center"><h3>Morada</h3></th>
            <th class="text-center"><h3>Codigo postal</h3></th>
            <th class="text-center"><h3>Localidade</h3></th>
            <th class="text-center"><h3></h3></th>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><?=$cliente->id?></td>
                    <td class="text-center"><?=$cliente->username?></td>
                    <td class="text-center"><?=$cliente->email?></td>
                    <td class="text-center"><?=$cliente->telefone?></td>
                    <td class="text-center"><?=$cliente->nif?></td>
                    <td class="text-center"><?=$cliente->morada?></td>
                    <td class="text-center"><?=$cliente->codigopostal?></td>
                    <td class="text-center"><?=$cliente->localidade?></td>
                    <td class="text-center">
                        <a href="router.php?c=fatura&a=create&id_cliente=<?=$cliente->id ?>"
                           class="btn btn-info" role="button">Criar fatura</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="card">
            <div class="card-header">
                <h4>Lista de faturas</h4>
            </div>
            <div class="card-body">
                <table class="table tablestriped">
                    <thead>
                    <th class="text-center"><h3>Data</h3></th>
                    <th class="text-center"><h3>Valor total</h3></th>
                    <th class="text-center"><h3>Iva total</h3></th>
                    <th class="text-center"><h3>Estado</h3></th>
                    <th class="text-center"><h3>Empregado</h3></th>
                    <th class="text-center"><h3></h3></th>
                    </thead>
                    <tbody>
                        <?php if($faturas != null){
                            foreach ($faturas as $fatura) { ?>
                                <tr>
                                    <td class="text-center"><?= date('Y/m/d H:i:s', strtotime($fatura->data)); ?></td>
                                    <td class="text-center"><?= number_format($fatura->valortotal,2); echo'€'; ?></td>
                                    <td class="text-center"><?= number_format($fatura->ivatotal,2); echo'€'; ?></td>
                                    <td class="text-center"><?= $fatura->estado ?></td>
                                    <td class="text-center"><?= $fatura->user_empregado->username ?></td>
                                    <td class="text-center">
                                        <?php
                                        if($fatura->estado == "em lançamento"){
                                            echo '<a href="router.php?c=linhasfatura&a=create&id_fatura='. $fatura->id .'"
                                            class="btn btn-info" role="button">Adicinar produto</a>';
                                        }else if($fatura->estado == "emitida"){
                                            echo '<a target="_blank" href="router.php?c=fatura&a=imprimir&id_fatura='. $fatura->id .'"
                                            class="btn btn-info" role="button">Imprimir</a>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php }
                        }  else { ?>
                            <tr>
                                <td colspan="6" class="text-center "> Não tem nenhuma fatura</td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
