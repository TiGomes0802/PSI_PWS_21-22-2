<div class="row">
    <div class="col">
        <form action="router.php?c=user&a=index_all_user" method="post">
            <div class="input-group mb-3">
                <input type="search" class="form-control" name="pesquisa" placeholder="Pesquisar Cliente pelo username ou role" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary " type="button">&#128269;</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-2 text-center">
        <a href="router.php?c=user&a=create_user" class="btn w-100 p-2 btn-info">Criar user</a>
    </div>
</div>
<h3 class="text-left top-space">Lista de users</h3>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th class="text-center"><h3>Role</h3></th>
                <th class="text-center"><h3>Username</h3></th>
                <th class="text-center"><h3>Email</h3></th>
                <th class="text-center"><h3>Telefone</h3></th>
                <th class="text-center"><h3>Nif</h3></th>
                <th class="text-center"><h3>Morada</h3></th>
                <th class="text-center"><h3>Codigo postal</h3></th>
                <th class="text-center"><h3>Localidade</h3></th>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr id="list">
                        <td class="text-center"><?=$user->role?></td>
                        <td class="text-center users"><?=$user->username?></td>
                        <td class="text-center"><?=$user->email?></td>
                        <td class="text-center"><?=$user->telefone?></td>
                        <td class="text-center"><?=$user->nif?></td>
                        <td class="text-center"><?=$user->morada?></td>
                        <td class="text-center"><?=$user->codigopostal?></td>
                        <td class="text-center"><?=$user->localidade?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>