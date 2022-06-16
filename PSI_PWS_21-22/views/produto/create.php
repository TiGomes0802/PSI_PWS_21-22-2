<h2 class="text-left top-space">Criar Produto</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=produto&a=store" method="POST">

            <label for="referencia">Referência:</label><br>
            <input type="text" name="referencia" value="<?php if(isset($produto)) { echo $produto->referencia; }?>">
            <p><?php
                if(isset($produto->errors)) {
                    if (is_array($produto->errors->on('referencia'))) {
                        foreach ($produto->errors->on('referencia') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $produto->errors->on('referencia');
                    }
                }
                ?>
            </p>

            <label for="descricao">Descrição:</label><br>
            <input type="text" name="descricao" value="<?php if(isset($produto)) { echo $produto->descricao; }?>">
            <p><?php
                if(isset($produto->errors)) {
                    if (is_array($produto->errors->on('descricao'))) {
                        foreach ($produto->errors->on('descricao') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $produto->errors->on('descricao');
                    }
                }
                ?>

            </p>
            <label for="preco">Preço:</label><br>
            <input type="number" min="0" step="0.01" name="preco" value="<?php if(isset($produto)) { echo $produto->preco; }else{echo '0';}?>">
            <p><?php
                if(isset($produto->errors)) {
                    if (is_array($produto->errors->on('preco'))) {
                        foreach ($produto->errors->on('preco') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $produto->errors->on('preco');
                    }
                }
                ?>
            </p>


            <label for="stock">stock:</label><br>
            <input type="number" min="0" name="stock" value="<?php if(isset($produto)) { echo $produto->stock; }else{echo '0';}?>">
            <p><?php
                if(isset($produto->errors)) {
                    if (is_array($produto->errors->on('stock'))) {
                        foreach ($produto->errors->on('stock') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $produto->errors->on('stock');
                    }
                }
                ?>

            <p>
            <label for="iva_id">Percentagem Iva:</label><br>
            <select name="iva_id">
                <?php foreach($ivas as $iva){?>
                    <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?>%</option>
                <?php } ?>
            </select>
            <p>
            <input type="submit" value="Criar Produto">
        </form>
    </div>
</div>