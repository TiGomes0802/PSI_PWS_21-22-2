<div class="row">
    <h2 class="text-left top-space">Lista de clientes</h2>
    <div class="col">
        <form action="router.php?c=user&a=index" method="post">
            <div class="input-group mb-3">
                <input type="search" class="form-control" name="pesquisa" placeholder="Pesquisar Cliente por username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary " type="button">&#128269;</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-2 text-center">
        <?php if($user->role == 'admin'){
            echo '<a href="router.php?c=user&a=create_user" class="btn w-100 p-2 btn-info">Criar user</a>';
        } else if($user->role == 'funcionario'){
            echo '<a href="router.php?c=user&a=create_cliente" class="btn w-100 p-2 btn-info">Criar novo cliente</a>';
        }
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th class="text-center"><h3>Username</h3></th>
                <th class="text-center"><h3>Email</h3></th>
                <th class="text-center"><h3>Telefone</h3></th>
                <th class="text-center"><h3>Nif</h3></th>
                <th class="text-center"><h3>Morada</h3></th>
                <th class="text-center"><h3>Codigo postal</h3></th>
                <th class="text-center"><h3>Localidade</h3></th>
                <th class="text-center"><h3></h3></th>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente) { ?>
                    <tr id="list">
                        <td class="text-center clientes"><?=$cliente->username?></td>
                        <td class="text-center"><?=$cliente->email?></td>
                        <td class="text-center"><?=$cliente->telefone?></td>
                        <td class="text-center"><?=$cliente->nif?></td>
                        <td class="text-center"><?=$cliente->morada?></td>
                        <td class="text-center"><?=$cliente->codigopostal?></td>
                        <td class="text-center"><?=$cliente->localidade?></td>
                        <td class="text-center">
                            <a href="router.php?c=user&a=show&id=<?=$cliente->id ?>"
                            class="btn btn-info" role="button">Show</a>
                            <a href="router.php?c=fatura&a=store&id_cliente=<?=$cliente->id ?>"
                               class="btn btn-info" role="button">Criar fatura</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>