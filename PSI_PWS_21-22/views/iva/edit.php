<h2 class="text-left top-space">Iva Edit</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=iva&a=update&id=<?=$iva->id?>" method="POST">
            <br>
            <label for="id">Id:</label><br>
            <input type="text" name="id" value="<?=$iva->id?>" disabled><br>
            <p></p>
            <label for="percentagem">Percentagem:</label><br>
            <input type="text" name="percentagem" value="<?=$iva->percentagem?>"><br>
            <p><?php if(isset($iva->errors)){ echo $iva->errors->on('percentagem'); }?></p>
            <p></p>
            <label for="descricao">Descrição:</label><br>
            <input type="text" name="descricao" value="<?=$iva->descricao?>"><br>
            <p><?php if(isset($iva->errors)){ echo $iva->errors->on('descricao'); }?></p>
            <p></p>
            <label for="emvigor">Em Vigor:</label><br>
            <select name="emvigor" value="<?php if(isset($iva)) { echo $iva->emvigor; }?>">
                <option value="1">Em vigor</option>
                <option value="0">Não vigor</option>
            </select><br>
                <p><?php if(isset($iva->errors)){ echo $iva->errors->on('emvigor'); }?></p>
                <p></p>

                <br><br>
                <input type="submit" value="Editar Iva">

        </form>
    </div>
</div>
