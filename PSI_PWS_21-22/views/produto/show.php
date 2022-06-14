<h2 class="text-left top-space">Produtos Show</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th><h3>Id</h3></th>
            <th><h3>referencia</h3></th>
            <th><h3>descricao</h3></th>
            <th><h3>preco</h3></th>
            <th><h3>stock</h3></th>
            <th><h3>iva_id</h3></th>
            <th><h3></h3></th>
            </thead>
            <tbody>
            <tr>
                <td><?=$produto->id?></td>
                <td><?=$produto->referencia?></td>
                <td><?=$produto->descricao?></td>
                <td><?= $produto->preco ?></td>
                <td><?= $produto->stock ?></td>
                <td><?= $produto->iva_id ?></td>
                <td>
                    <a href="router.php?c=produto&a=edit&id=<?=$produto->id ?>"
                       class="btn btn-info" role="button">Adicionar stock</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
