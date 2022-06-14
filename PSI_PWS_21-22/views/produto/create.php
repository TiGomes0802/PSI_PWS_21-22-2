<h2 class="text-left top-space">Produtos</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=produto&a=create" method="POST">
            <br>
            </p><br>
            <label for="codigopostal">codpostal:</label><br>
            <input type="text" name="codigopostal" value="<?php if(isset($cliente)) { echo $cliente->codigopostal; }?>">
            <p><?php
                if(isset($cliente->errors)) {
                    if (is_array($cliente->errors->on('codigopostal'))) {
                        foreach ($cliente->errors->on('codigopostal') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $cliente->errors->on('codigopostal');
                    }
                }
                ?>
            </p><br>
            </p><br>
            <label for="codigopostal">codpostal:</label><br>
            <input type="text" name="codigopostal" value="<?php if(isset($cliente)) { echo $cliente->codigopostal; }?>">
            <p><?php
                if(isset($cliente->errors)) {
                    if (is_array($cliente->errors->on('codigopostal'))) {
                        foreach ($cliente->errors->on('codigopostal') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $cliente->errors->on('codigopostal');
                    }
                }
                ?>
            </p><br>
            </p><br>
            <label for="codigopostal">codpostal:</label><br>
            <input type="text" name="codigopostal" value="<?php if(isset($cliente)) { echo $cliente->codigopostal; }?>">
            <p><?php
                if(isset($cliente->errors)) {
                    if (is_array($cliente->errors->on('codigopostal'))) {
                        foreach ($cliente->errors->on('codigopostal') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $cliente->errors->on('codigopostal');
                    }
                }
                ?>
            </p><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>