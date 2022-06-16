<div class="row">
    <div class="col">
        <h2 class="text-left top-space">Ivas</h2>
    </div>
    <div class="col-sm-2 text-center">
        <a href="router.php?c=iva&a=create" class="btn w-100 p-2 btn-info">Criar Iva</a>
    </div>
</div>
<p>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th class="text-center"><h3>Percentagem</h3></th>
            <th class="text-center"><h3>Descrição</h3></th>
            <th class="text-center"><h3>Em Vigor</h3></th>
            <th class="text-center"><h3></h3></th>
            </thead>
            <tbody>
            <?php foreach ($ivas as $iva) { ?>
                <tr>
                    <td class="text-center"><?=$iva->percentagem?>%</td>
                    <td class="text-center"><?=$iva->descricao?></td>
                    <td class="text-center"><?php
                        if($iva->emvigor == 1)
                        {
                            echo 'Em vigor';
                        } else if($iva->emvigor == 0) {
                            echo 'Não vigor';
                        }
                        ?></td>
                    <td class="text-center">
                        <a href="router.php?c=iva&a=show&id=<?=$iva->id ?>"
                           class="btn btn-info" role="button">Show</a>
                        <a href="router.php?c=iva&a=edit&id=<?=$iva->id ?>"
                           class="btn btn-info" role="button">Editar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
