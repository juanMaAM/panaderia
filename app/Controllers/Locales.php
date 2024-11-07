<?php
namespace App\Controllers;

class Locales extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index()
    {
        $localM = model('Local');
        
        $local['locales'] = $localM->findAll();
        
        return view('head') .
            view('menu') .
            view('local/show', $local) .
            view('footer');
    }

    public function edit($idLocal)
    {
        $localM = model('Local');
        
        $local['locales'] = $localM->find($idLocal);

        return view('head') .
            view('menu') .
            view('local/edit', $local) .
            view('footer');
    }

    public function update()
    {
        $localM = model('Local');
        
        $idLocal = $_POST['idLocal'];

        $local = [
            'nombreLocal' => $_POST['local'],
            'aliasLocal' => $_POST['alias'],
            'direccionLocal' => $_POST['direccion']
        ];

        $localM->update($idLocal, $local);

        return redirect()->to(base_url('/locales'));
    }
}





