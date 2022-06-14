<?php

require_once 'BaseAuthController.php';

class EmpresaController extends BaseAuthController
{
    public function __construct()
    {
        $this->loginFilter();
        if ($this->getRole() == 'cliente'){
            $this->redirectToRoute('fatura', 'minhasfaturas');
        }
    }

    public function show($id)
    {
        $empresa = Empresa::find([$id]);
        if (is_null($empresa)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('empresa','show', ['empresa' => $empresa]);
        }
    }

    public function edit($id)
    {
        $empresa = Empresa::find([$id]);
        if (is_null($empresa)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('empresa','edit', ['empresa' => $empresa]);
        }
    }

    public function update($id)
    {
        $empresa = Empresa::find([$id]);
        $empresa->update_attributes($_POST);
        if($empresa->is_valid()){
            $empresa->save();
            //redirecionar para o index
            $empresas = Empresa::all();
            $this->renderView('empresa','show', ['empresas' => $empresas]);
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('empresa','edit', ['empresa' => $empresa]);
        }
    }

}
