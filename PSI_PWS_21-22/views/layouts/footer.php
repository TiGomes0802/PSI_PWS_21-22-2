        </div>
    </main>

    <style>
        .footer-distributed{
            background: #666;
            box-sizing: border-box;
            width: 100%;
            text-align: left;
            font: bold 16px sans-serif;
            padding: 30px 50px;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right{
            display: inline-block;
            vertical-align: top;
        }

        /* Footer left */

        .footer-distributed .footer-left{
            width: 40%;
        }

        /* The company logo */

        .footer-distributed h3{
            color:  lightseagreen;
            font: normal 36px 'Open Sans', cursive;
            margin: 0;
        }

        /* Footer links */

        .footer-distributed .footer-links{
            color:  #ffffff;
            margin: 20px 0 12px;
            padding: 0;
        }

        .footer-distributed .footer-links a{
            display:inline-block;
            line-height: 1.8;
            font-weight:400;
            text-decoration: none;
            color:  inherit;
        }

        .footer-distributed .footer-company-name{
            color:  #222;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
        }

        /* Footer Center */

        .footer-distributed .footer-center{
            width: 35%;
        }

        .footer-distributed .footer-center i{
            background-color:  #33383b;
            color: #ffffff;
            font-size: 20px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin: 10px 10px;
            vertical-align: middle;
        }

        .footer-distributed .footer-center i.fa-envelope{
            font-size: 17px;
            line-height: 38px;
        }

        .footer-distributed .footer-center p{
            display: inline-block;
            color: #ffffff;
            font-weight:400;
            vertical-align: middle;
            margin:0;
        }

        .footer-distributed .footer-center p span{
            display:block;
            font-weight: normal;
            font-size:14px;
            line-height:2;
        }

        .footer-distributed .footer-center p a{
            color:  lightseagreen;
            text-decoration: none;
        }

        .footer-distributed .footer-links a:before {
            content: "|";
            font-weight:300;
            font-size: 20px;
            left: 0;
            color: #fff;
            display: inline-block;
            padding-right: 5px;
        }

        .footer-distributed .footer-links .link-1:before {
            content: none;
        }



        .footer-distributed .footer-company-about{
            line-height: 20px;
            color:  #92999f;
            font-size: 13px;
            font-weight: normal;
            margin: 0;
        }

        .footer-distributed .footer-company-about span{
            display: block;
            color:  #ffffff;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* If you don't want the footer to be responsive, remove these media queries */

        @media (max-width: 880px) {

            .footer-distributed{
                font: bold 14px sans-serif;
            }

            .footer-distributed .footer-left,
            .footer-distributed .footer-center,
            .footer-distributed .footer-right{
                display: block;
                width: 100%;
                margin-bottom: 40px;
                text-align: center;
            }

            .footer-distributed .footer-center i{
                margin-left: 0;
            }

        }
    </style>
    <footer class="footer-distributed mt-auto bg-dark">

        <div class="footer-left">

            <h3><?= $empresa->designacaosocial?></h3>

            <p class="footer-links">
                <?php
                if(isset($_SESSION['id'])){
                    if($user->role == 'funcionario' or $user->role == 'admin') {
                        echo '<a class="link-1" href="./router.php?c=empresa&a=show&id=1">Empresa </a>
                              <a href="./router.php?c=fatura&a=index">Faturas </a>
                              <a href="./router.php?c=user&a=index">Clientes </a>
                              <a href="./router.php?c=produto&a=index">Produtos </a>
                              <a href="./router.php?c=iva&a=index">Ivas </a>';

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
