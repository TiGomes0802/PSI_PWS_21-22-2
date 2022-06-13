<h2 class="text-left top-space">Fatura Index</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th class="text-center"><h3>Data</h3></th>
                <th class="text-center"><h3>Valor total</h3></th>
                <th class="text-center"><h3>Iva total</h3></th>
                <th class="text-center"><h3>Estado</h3></th>
                <th class="text-center"><h3>Empregado</h3></th>
                <th class="text-center"><h3>Cliente</h3></th>
            </thead>
            <tbody>
                <?php foreach ($faturas as $fatura) { ?>
                    <tr>
                        <td class="text-center"><?= date('Y/m/d H:i:s', strtotime($fatura->data)); ?></td>
                        <td class="text-center"><?= number_format($fatura->valortotal,2); echo'€'; ?></td>
                        <td class="text-center"><?= number_format($fatura->ivatotal,2); echo'€'; ?></td>
                        <td class="text-center"><?= $fatura->estado ?></td>
                        <td class="text-center"><?= $fatura->user_empregado->username ?></td>
                        <td class="text-center"><?= $fatura->user_cliente->username ?></td>
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
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>