<h2 class="text-left top-space">Criar Iva</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=iva&a=store" method="POST">

            <label for="percentagem">Percentagem:</label><br>
            <input type="text" name="percentagem" value="<?php if(isset($iva)) { echo $iva->percentagem; }?>">
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
            <input type="number" min="0" step="0.01" name="emvigor" value="<?php if(isset($iva)) { echo $iva->emvigor; }else{echo '0';}?>">
            <p><?php
                if(isset($iva->errors)) {
                    if (is_array($iva->errors->on('emvigor'))) {
                        foreach ($iva->errors->on('emvigor') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $iva->errors->on('emvigor');
                    }
                }
                ?>
            </p>



                <input type="submit" value="Submit">
        </form>
    </div>
</div>