<h2 class="text-left top-space">Criar Iva</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=iva&a=store" method="POST">

            <label for="percentagem">Percentagem:</label><br>
            <input type="number" min="0" name="percentagem" value="<?php if(isset($iva)) { echo $iva->percentagem; }?>">
            <p><?php
                if(isset($iva->errors)) {
                    if (is_array($iva->errors->on('percentagem'))) {
                        foreach ($iva->errors->on('percentagem') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $iva->errors->on('percentagem');
                    }
                }
                ?>
            </p>

            <label for="descricao">Descrição:</label><br>
            <input type="text" name="descricao" value="<?php if(isset($iva)) { echo $iva->descricao; }?>">
            <p><?php
                if(isset($iva->errors)) {
                    if (is_array($iva->errors->on('descricao'))) {
                        foreach ($iva->errors->on('descricao') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $iva->errors->on('descricao');
                    }
                }
                ?>

            </p>
            <label for="emvigor">Em Vigor:</label><br>
            <select name="emvigor" value="<?php if(isset($iva)) { echo $iva->emvigor; }?>">
                <option value="1">Em vigor</option>
                <option value="0">Não vigor</option>
            </select>
            <p><?php
                if(isset($iva->errors)) {
                    if (is_array($iva->errors->on('role'))) {
                        foreach ($iva->errors->on('role') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $iva->errors->on('role');
                    }
                }
                ?>
            </p><br>
            <br>



                <input type="submit" value="Criar Iva">
        </form>
    </div>
</div>