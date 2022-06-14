<h2 class="text-left top-space">Iva Index</h2>
<h2 class="top-space"></h2>
<a href="router.php?c=iva&a=create" class="btn btn-info"
   role="button">Criar Iva</a>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th><h3>Percentagem</h3></th>
            <th><h3>Descrição</h3></th>
            <th><h3>Em Vigor</h3></th>
            <th><h3></h3></th>
            </thead>
            <tbody>
            <?php foreach ($ivas as $iva) { ?>
                <tr>
                    <td><?=$iva->percentagem?></td>
                    <td><?=$iva->descricao?></td>
                    <td><?=$iva->emvigor?></td>

                    <td>
                        <a href="router.php?c=iva&a=show&id=<?=$iva->id ?>"
                           class="btn btn-info" role="button">Show</a>
                        <a href="router.php?c=iva&a=edit&id=<?=$iva->id ?>"
                           class="btn btn-info" role="button">Editar Produto</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>

'