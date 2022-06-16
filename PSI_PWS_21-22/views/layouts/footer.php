        </div>
    </main>
        <br>
        <br>
    <footer class="footer-distributed mt-auto bg-dark">

        <div class="footer-left">

            <h3><?= $empresa->designacaosocial?></h3>

            <p class="footer-links">
                <?php
                if(isset($_SESSION['id'])){
                    if($user->role == 'funcionario') {
                        echo '<a class="link-1" href="./router.php?c=empresa&a=show&id=1">Empresa </a>
                              <a href="./router.php?c=fatura&a=index">Faturas</a>
                              <a href="./router.php?c=user&a=index">Clientes</a>
                              <a href="./router.php?c=produto&a=index">Produtos</a>
                              <a href="./router.php?c=iva&a=index">Ivas</a>';
                    }
                    if($user->role == 'admin') {
                        echo '<a class="link-1" href="./router.php?c=empresa&a=show&id=1">Empresa </a>
                              <a href="./router.php?c=fatura&a=index">Faturas</a>
                              <a href="./router.php?c=user&a=index">Clientes</a>
                              <a href="./router.php?c=produto&a=index">Produtos</a>
                              <a href="./router.php?c=iva&a=index">Ivas</a>
                              <a href="./router.php?c=user&a=index_all_user">Users</a>';
                    }
                    if($user->role == 'cliente') {
                        echo '<a class="link-1" href="./router.php?c=fatura&a=minhasfaturas">Minhas Faturas</a>';
                    }

                }
                ?>
            </p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><?= $empresa->morada?></p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p><?= $empresa->telefone?></p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:<?= $empresa->email?>"><?= $empresa->email?></a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>Sobre a <?= $empresa->designacaosocial?></span>
                Otima empresa!
            </p>

        </div>

    </footer>

    <script src="./public/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>
