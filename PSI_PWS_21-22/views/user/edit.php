<h2 class="text-left top-space">Editar perfil</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="./router.php?c=user&a=update&id=<?=$user->id?>" method="POST">
            <br>
            <label for="id">Id:</label><br>
            <input type="text" name="id" value="<?=$user->id?>" disabled><br>
            <p></p>
            <label for="username">username:</label><br>
            <input type="text" name="username" value="<?=$user->username?>" disabled><br>
            <p><?php
                if(isset($cliente->errors)) {
                    if (is_array($cliente->errors->on('username'))) {
                        foreach ($cliente->errors->on('username') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $cliente->errors->on('username');
                    }
                }
                ?>
            </p>
            <label for="password">password:</label><br>
            <input type="password" name="password" value=""><br>
            <p><?php
                if(isset($cliente->errors)) {
                    if (is_array($cliente->errors->on('password'))) {
                        foreach ($cliente->errors->on('password') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $cliente->errors->on('password');
                    }
                }
                ?>
            </p>
            <label for="email">Email:</label><br>
            <input type="text" name="email" value="<?=$user->email?>"><br>
            <p><?php
                if(isset($cliente->errors)) {
                    if (is_array($cliente->errors->on('email'))) {
                        foreach ($cliente->errors->on('email') as $error) {
                            echo $error . '<br>';
                        }
                    } else {
                        echo $cliente->errors->on('email');
                    }
                }
                ?>
            </p>

            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
