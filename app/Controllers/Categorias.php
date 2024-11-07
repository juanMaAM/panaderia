<?php

namespace App\Controllers;

class categorias extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index()
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipoUsuario')!=1 || $session->get('valido')!=1){
            return redirect()->to(base_url('/login'));
        }


        $categoriaM = model('CategoriaM');
        $data['categorias'] = $categoriaM->findAll();
        return view('head') .
                view('menu') . 
                view('categorias/show', $data) .
                view('footer');
    }

    public function add(){   //get

        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipoUsuario')!=1 || $session->get('valido')!=1){
            return redirect()->to(base_url('/login'));
        }
        return view('head') .
        view('menu') . 
        view('categorias/add') .
        view('footer');
    }

    public function edit($idcategoria){   //get

        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipoUsuario')!=1 || $session->get('valido')!=1){
            return redirect()->to(base_url('/login'));
        }
        $idcategoria = $data['idcategoria'] = $idcategoria;
        $categoriaM = model('categoriaM');
        $data['categoria'] = $categoriaM->where('idcategoria',$idcategoria)->findAll();
        return view('head') .
        view('menu') . 
        view('categorias/edit',$data) .
        view('footer');


    }

    public function update(){
        $categoriaM = model('categoriaM');
        $idcategoria = $_POST['idcategoria'];

            $data = [
                    'nombreCategoria' => $_POST['categoria'],
                    'descripcionCategoria' =>$_POST['descripcion']
            ];
                $categoriaM->set($data)->where('idCategoria',$idcategoria)->update();
            return redirect()->to(base_url('/categorias'));


    }


    public function insert(){ 
        if (! $this->request->is('post')) {
                $this->index();
        }
        
        $rules = [
            'categoria' => 'required',
            'descripcion' => 'required'

        ];

        $categorias = [
            "nombreCategoria" => $_POST['categoria'],
            "descripcionCategoria" => $_POST['descripcion']
        ] ;

            if (! $this->validate($rules)) {
                return     
                view('head') .
                view('menu') . 
                view('categorias/add',[
                    'validation' => $this->validator
                ]) .
                view('footer'); 
            }
            else{
                $CategoriaM = model('categoriaM');
                $CategoriaM->insert($categorias);
                return redirect()->to(base_url('/categorias'));
            }

        
    }


    public function delete($idcategoria){

        $categoriaM = model('categoriaM');
        $categoriaM->delete($idcategoria);
        return redirect()->to(base_url('/categorias'));
    }
}