<h2 class="text-left top-space">Produtos Show</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th><h3>Id</h3></th>
            <th><h3>Percentagem</h3></th>
            <th><h3>Descrição</h3></th>
            <th><h3>Em Vigor</h3></th>

            <th><h3></h3></th>
            </thead>
            <tbody>
            <tr>
                <td><?=$iva->id?></td>
                <td><?=$iva->percentagem?></td>
                <td><?=$iva->descricao?></td>
                <td><?= $iva->emvigor ?></td>

                <td>
                    <a href="router.php?c=iva&a=edit&id=<?=$iva->id ?>"
                       class="btn btn-info" role="button">Adicionar stock</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
