<h2 class="text-left top-space">Iva Edit</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=iva&a=update&id=<?=$produto->id?>" method="POST">
            <br>
            <label for="id">Id:</label><br>
            <input type="text" name="id" value="<?=$produto->id?>" disabled><br>
            <p></p>
            <label for="percentagem">percentagem:</label><br>
            <input type="text" name="percentagem" value="<?=$produto->percentagem?>"><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('percentagem'); }?></p>
            <p></p>
            <label for="descricao">Descrição:</label><br>
            <input type="text" name="descricao" value="<?=$produto->descricao?>"><br>
            <p><?php if(isset($produto->errors)){ echo $produto->errors->on('descricao'); }?></p>
            <p></p>
            <label for="emvigor">Em Vigor:</label><br>
            <input type="number" step="0.01" min="0" name="emvigor" value="<?=$produto->emvigor?>"><brdisabled>
                <p><?php if(isset($produto->errors)){ echo $produto->errors->on('emvigor'); }?></p>
                <p></p>

                <br><br>
                <input type="submit" value="Submit">

        </form>
    </div>
</div>
