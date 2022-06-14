<h2 class="text-left top-space">Book Index</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th><h3>Id</h3></th>
            <th><h3>Name</h3></th>
            <th><h3>ISBN</h3></th>
            <th><h3>Genres</h3></th>
            <th><h3>User Actions</h3></th>
            </thead>
            <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <a href="router.php?c=produto&a=create" class="btn btn-info"
                   role="button">Criar Novo Produto</a>
                <tr>

                    <td><?=$produto->referencia?></td>
                    <td><?=$produto->descricao?></td>
                    <td><?=$produto->preco?></td>
                    <td><?= $produto->stock?></td>
                    <td><?= $produto->iva_id?></td>

                    <td>
                        <a href="router.php?c=produto&a=show&id=<?=$produto->id ?>"
                           class="btn btn-info" role="button">Show</a>
                        <a href="router.php?c=produto&a=edit&id=<?=$produto->id ?>"
                           class="btn btn-info" role="button">Edit</a>
                        <a href="router.php?c=produto&a=delete&id=<?=$produto->id ?>"
                           class="btn btn-warning" role="button">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    </div>
</div>

'