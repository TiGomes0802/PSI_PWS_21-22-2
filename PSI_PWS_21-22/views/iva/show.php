<h2 class="text-left top-space">Iva Show</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th class="text-center"><h3>Id</h3></th>
            <th class="text-center"><h3>Percentagem</h3></th>
            <th class="text-center"><h3>Descrição</h3></th>
            <th class="text-center"><h3>Em Vigor</h3></th>

            <th><h3></h3></th>
            </thead>
            <tbody>
            <tr>
                <td class="text-center"><?=$iva->id?></td>
                <td class="text-center"><?=$iva->percentagem?>%</td>
                <td class="text-center"><?=$iva->descricao?></td>
                <td class="text-center"><?php
                    if($iva->emvigor == 1)
                    {
                        echo 'Em vigor';
                    } else if($iva->emvigor == 0) {
                        echo 'Não vigor';
                    }
                    ?></td>


            </tr>
            </tbody>
        </table>
    </div>
</div>
