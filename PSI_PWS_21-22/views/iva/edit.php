<h2 class="text-left top-space">Iva Edit</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=iva&a=update&id=<?=$iva->id?>" method="POST">
            <br>
            <label for="id">Id:</label><br>
            <input type="text" name="id" value="<?=$iva->id?>" disabled><br>
            <p></p>
            <label for="percentagem">percentagem:</label><br>
            <input type="text" name="percentagem" value="<?=$iva->percentagem?>"><br>
            <p><?php if(isset($iva->errors)){ echo $iva->errors->on('percentagem'); }?></p>
            <p></p>
            <label for="descricao">Descrição:</label><br>
            <input type="text" name="descricao" value="<?=$iva->descricao?>"><br>
            <p><?php if(isset($iva->errors)){ echo $iva->errors->on('descricao'); }?></p>
            <p></p>
            <label for="emvigor">Em Vigor:</label><br>
            <input type="number"  min="0" name="emvigor" value="<?=$iva->emvigor?>"><brdisabled>
                <p><?php if(isset($iva->errors)){ echo $iva->errors->on('emvigor'); }?></p>
                <p></p>

                <br><br>
                <input type="submit" value="Submit">

        </form>
    </div>
</div>
