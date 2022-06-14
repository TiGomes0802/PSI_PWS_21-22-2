<h2 class="text-left top-space">Produtos Show</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th><h3>Id</h3></th>
            <th><h3>Referência</h3></th>
            <th><h3>Descrição</h3></th>
            <th><h3>Preço</h3></th>
            <th><h3>Stock</h3></th>
            <th><h3>Iva</h3></th>
            <th><h3></h3></th>
            </thead>
            <tbody>
            <tr>
                <td><?=$produto->id?></td>
                <td><?=$produto->referencia?></td>
                <td><?=$produto->descricao?></td>
                <td><?= $produto->preco ?>€</td>
                <td><?= $produto->stock ?></td>
                <td><?= $produto->iva->percentagem?>%</td>
                <td>
                    <a href="router.php?c=produto&a=edit&id=<?=$produto->id ?>"
                       class="btn btn-info" role="button">Adicionar stock</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
