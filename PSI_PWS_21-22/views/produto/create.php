<h2 class="text-left top-space">Produtos</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=produto&a=create" method="POST">

            </p><br>
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
            </p><br>

            <label for="descricao">descricao:</label><br>
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

            </p><br>
            <label for="preco">preco:</label><br>
            <input type="number" name="preco" value="<?php if(isset($produto)) { echo $produto->preco; }?>">
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
            </p><br>


            <label for="stock">stock:</label><br>
            <input type="number" name="stock" value="<?php if(isset($produto)) { echo $produto->stock; }?>">
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

            <p></p>
            <label for="iva_id">Percentagem Iva:</label><br>
            <select name="iva_id">
                <?php foreach($ivas as $iva){?>
                    <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?></option>
                <?php } ?>
            </select>
            </p><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</div>