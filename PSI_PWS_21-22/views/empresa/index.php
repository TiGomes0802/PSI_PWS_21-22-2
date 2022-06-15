<h2 class="text-left top-space">Empresa Index</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th class="text-center"><h3>designacaosocial</h3></th>
                <th class="text-center"><h3>email</h3></th>
                <th class="text-center"><h3>telefone</h3></th>
                <th class="text-center"><h3>nif</h3></th>
                <th class="text-center"><h3>morada</h3></th>
                <th class="text-center"><h3>codigopostal</h3></th>
                <th class="text-center"><h3>localidade</h3></th>
                <th class="text-center"><h3>capitalsocial</h3></th>
            </thead>
            <tbody>
                <?php foreach ($empresas as $empresa) { ?>
                    <tr>
                        <td><?=$empresa->designacaosocial?></td>
                        <td><?=$empresa->email?></td>
                        <td><?=$empresa->telefone?></td>
                        <td><?=$empresa->nif?></td>
                        <td><?=$empresa->morada?></td>
                        <td><?=$empresa->codigopostal?></td>
                        <td><?=$empresa->localidade?></td>
                        <td><?=$empresa->capitalsocial?></td>
                        <td>
                            <a href="router.php?c=empresa&a=show&id=<?=$empresa->id ?>"
                            class="btn btn-info" role="button">Show</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>