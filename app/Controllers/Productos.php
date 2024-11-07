<?php

namespace App\Controllers;

class Productos extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index()
    {
        
        $productoM = model('producto');
        
        $product['producto'] = $productoM->findAll();
        
        return view('head') .
            view('menu') .
            view('producto/show', $product) .
            view('footer');
    }

    public function add()
    {
        
        return view('head') .
            view('menu') .
            view('producto/add') .
            view('footer');
    }

    public function edit($idProducto)
    {
        
        $productoM = model('producto');
        
        $product['producto'] = $productoM->where('idProducto', $idProducto)->findAll();

        
        return view('head') .
            view('menu') .
            view('producto/edit', $product) .
            view('footer');
    }

    public function update()
    {
        
        $productoM = model('producto');
        
        $idProducto = $_POST['idProducto'];

        
        $product = [
            'nombreProducto' => $_POST['producto'],
            'descripcion' => $_POST['descripcion'],
            'precioProducto' => $_POST['precio'],
        ];

        
        $productoM->set($product)->where('idProducto', $idProducto)->update();

        
        return redirect()->to(base_url('/productos'));
    }

    public function insert()
    {
        
        if (! $this->request->is('post')) {
            return $this->index();
        }

        
        $rules = [
            'producto' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric' 
        ];

        $productos = [
            'nombreProducto' => $_POST['producto'],
            'descripcion' => $_POST['descripcion'],
            'precioProducto' => $_POST['precio']
        ];

        
        if (! $this->validate($rules)) {
            return view('head') .
                view('menu') .
                view('producto/add', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            
            $productoM = model('producto');
            $productoM->insert($productos);

            
            return redirect()->to(base_url('/productos'));
        }
    }

    public function delete($idProducto)
    {
        
        $productoM = model('producto');
        
        $productoM->delete($idProducto);

        
        return redirect()->to(base_url('/productos'));
    }


    public function visualizar()
    {
        $productoM = model('producto');
        $product['producto'] = $productoM->findAll();
    
        
        return view('head') .
            view('menu') .
            view('producto/visualize', $product) . 
            view('footer');
    }
    
}
