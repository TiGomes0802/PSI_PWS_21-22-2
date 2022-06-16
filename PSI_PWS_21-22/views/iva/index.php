<h2 class="text-left top-space">Iva Index</h2>
<h2 class="top-space"></h2>
<div style="text-align: right">
<a href="router.php?c=iva&a=create" class="btn btn-info"
   role="button">Criar Iva</a>
</div>
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
                    <td>
                        <a href="router.php?c=iva&a=show&id=<?=$iva->id ?>"
                           class="btn btn-info" role="button">Show</a>

                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
