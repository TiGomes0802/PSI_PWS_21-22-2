<h2 class="text-left top-space">Produto Index</h2>
<h2 class="top-space"></h2>
<a href="router.php?c=produto&a=create" class="btn btn-info"
   role="button">Criar Novo Produto</a>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th class="text-center"><h3>Referência</h3></th>
            <th class="text-center"><h3>Descrição</h3></th>
            <th class="text-center"><h3>Preço</h3></th>
            <th class="text-center"><h3>Stock</h3></th>
            <th class="text-center"><h3>Iva</h3></th>
            <th class="text-center"><h3></h3></th>
            </thead>
            <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td class="text-center"><?=$produto->referencia?></td>
                    <td class="text-center"><?=$produto->descricao?></td>
                    <td class="text-center"><?=$produto->preco?>€</td>
                    <td class="text-center"><?= $produto->stock?></td>
                    <td class="text-center"><?= $produto->iva->percentagem?> %</td>
                    <td class="text-center">
                        <a href="router.php?c=produto&a=show&id=<?=$produto->id ?>"
                           class="btn btn-info" role="button">Show</a>
                        <a href="router.php?c=produto&a=edit&id=<?=$produto->id ?>"
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