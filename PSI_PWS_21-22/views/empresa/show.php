<h2 class="text-left top-space">Empresa <?=$empresa->designacaosocial?></h2>
<br>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th class="text-center"><h3>email</h3></th>
                <th class="text-center"><h3>telefone</h3></th>
                <th class="text-center"><h3>nif</h3></th>
                <th class="text-center"><h3>morada</h3></th>
                <th class="text-center"><h3>codigopostal</h3></th>
                <th class="text-center"><h3>localidade</h3></th>
                <th class="text-center"><h3>capitalsocial</h3></th>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><?=$empresa->email?></td>
                    <td class="text-center"><?=$empresa->telefone?></td>
                    <td class="text-center"><?=$empresa->nif?></td>
                    <td class="text-center"><?=$empresa->morada?></td>
                    <td class="text-center"><?=$empresa->codigopostal?></td>
                    <td class="text-center"><?=$empresa->localidade?></td>
                    <td class="text-center"><?=number_format($empresa->capitalsocial, 2); echo '€'?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
