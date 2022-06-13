<h2 class="text-left top-space">Empresa Create</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=empresa&a=store" method="POST">
            <br>
            <label for="designacaosocial">Designação Social:</label><br>
            <input type="text" name="designacaosocial" value="<?php if(isset($empresa)) { echo $empresa->designacaosocial; }?>">
            <p><?php
                if(isset($empresa->errors)) {
                    if (is_array($empresa->errors->on('designacaosocial'))) {
                        foreach ($empresa->errors->on('designacaosocial') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $empresa->errors->on('designacaosocial');
                    }
                }
                 ?></p>
            <br>

            <label for="email">Email:</label><br>
            <input type="text" name="email" value="<?php if(isset($empresa)) { echo $empresa->email; }?>">
            <p><?php if(isset($empresa->errors)){ echo $empresa->errors->on('email'); }?></p>
            <br>

            <label for="telefone">Telefone:</label><br>
            <input type="number" name="telefone" value="<?php if(isset($empresa)) { echo $empresa->telefone; }?>">
            <p><?php if(isset($empresa->errors)){ echo $empresa->errors->on('telefone'); }?></p>
            <br>

            <label for="nif">NIF:</label><br>
            <input type="number" name="nif" value="<?php if(isset($empresa)) { echo $empresa->nif; }?>">
            <p><?php if(isset($empresa->errors)){ echo $empresa->errors->on('nif'); }?></p>
            <br>

            <label for="morada">Morada:</label><br>
            <input type="text" name="morada" value="<?php if(isset($empresa)) { echo $empresa->morada; }?>">
            <p><?php if(isset($empresa->errors)){ echo $empresa->errors->on('morada'); }?></p>
            <br>

            <label for="codigopostal">Codigo-Postal:</label><br>
            <input type="text" name="codigopostal" value="<?php if(isset($empresa)) { echo $empresa->codigopostal; }?>">
            <p><?php if(isset($empresa->errors)){ echo $empresa->errors->on('codigopostal'); }?></p>
            <br>

            <label for="localidade">Localidade:</label><br>
            <input type="text" name="localidade" value="<?php if(isset($empresa)) { echo $empresa->localidade; }?>">
            <p><?php if(isset($empresa->errors)){ echo $empresa->errors->on('localidade'); }?></p>
            <br>

            <label for="capitalsocial">Capital Social:</label><br>
            <input type="text" name="capitalsocial" value="<?php if(isset($empresa)) { echo $empresa->capitalsocial; }?>">
            <p><?php if(isset($empresa->errors)){ echo $empresa->errors->on('capitalsocial'); }?></p>
            <br>

            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>