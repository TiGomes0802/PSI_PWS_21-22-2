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
            <input type="text" name="referencia" value="<?=$produto->referencia?>"><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('referencia'); }?></p>
            <p></p>
            <label for="descricao">Descrição:</label><br>
            <input type="text" name="descricao" value="<?=$produto->descricao?>"><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('descricao'); }?></p>
            <p></p>
            <label for="preco">Preço:</label><br>
            <input type="text" name="preco" value="<?=$produto->preco?>"><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('preco'); }?></p>
            <p></p>
            <label for="stock">Stock:</label><br>
            <input type="text" name="stock" value="<?=$produto->stock?>"><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('stock'); }?></p>
            <p></p>
            <label for="iva_id">ID-Iva:</label><br>
            <input type="text" name="iva_id" value="<?=$produto->iva_id?>"><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('iva_id'); }?></p>
            <p></p>

            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
