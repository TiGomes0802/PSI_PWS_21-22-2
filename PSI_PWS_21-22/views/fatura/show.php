<h2 class="text-left top-space">Fatura Show</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th class="text-center"><h3>data</h3></th>
                <th class="text-center"><h3>valortotal</h3></th>
                <th class="text-center"><h3>ivatotal</h3></th>
                <th class="text-center"><h3>estado</h3></th>
                <th class="text-center"><h3>empregado_id</h3></th>
                <th class="text-center"><h3>cliente_id</h3></th>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><?= date('Y/m/d -> H:i:s', strtotime($fatura->data));?></td>
                    <td class="text-center"><?=$fatura->valortotal?></td>
                    <td class="text-center"><?=$fatura->ivatotal?></td>
                    <td class="text-center"><?=$fatura->estado?></td>
                    <td class="text-center"><?=$fatura->user_empregado->username?></td>
                    <td class="text-center"><?=$fatura->user_cliente->username?></td>
                    <td class="text-center">
                        <a href="router.php?c=fatura&a=edit&id=<?=$fatura->id ?>"
                           class="btn btn-info" role="button">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
