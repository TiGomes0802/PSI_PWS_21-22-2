<h2 class="text-left top-space">Produto Edit</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=produto&a=update&id=<?=$produto->id?>" method="POST">
            <br>
            <label for="id">Id:</label><br>
            <input type="text" name="id" value="<?=$produto->id?>" disabled><br>
            <p></p>
            <label for="referencia">Referência:</label><br>
            <input type="text" name="referencia" value="<?=$produto->referencia?>"disabled><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('referencia'); }?></p>
            <p></p>
            <label for="descricao">Descrição:</label><br>
            <input type="text" name="descricao" value="<?=$produto->descricao?>"disabled><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('descricao'); }?></p>
            <p></p>
            <label for="preco">Preço:</label><br>
            <input type="number" step="0.01" min="0" name="preco" value="<?=$produto->preco?>"><brdisabled>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('preco'); }?></p>
            <p></p>
            <label for="stock">Stock:</label><br>
            <input type="number" min="0" name="stock" value="<?=$produto->stock?>"><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('stock'); }?></p>
            <p></p>
                <label for="iva_id">Percentagem Iva:</label><br>
                <select name="iva_id">
                    <?php foreach($ivas as $iva){?>
                        <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?>%</option>
                    <?php } ?>
                </select>

            <br><br>
            <input type="submit" value="Submit">

        </form>
    </div>
</div>
