<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Usuarios extends Controller{

    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index(): string
    {
        $usuarioM = model('Usuario');
        $data['usuarios'] = $usuarioM->findAll();
        return view('head') .
                view('menu') . 
                view('usuarios/show', $data) .
                view('footer');
    }

    public function add(){   //get
        return view('head') .
        view('menu') . 
        view('usuarios/add') .
        view('footer');
    }

    public function edit($idUsuario){   //get
        $idUsuario = $data['idUsuario'] = $idUsuario;
        $usuarioM = model('Usuario');
        $data['usuario'] = $usuarioM->where('idUsuario',$idUsuario)->findAll();
        return view('head') .
        view('menu') . 
        view('usuarios/edit',$data) .
        view('footer');
    }

    public function update($idUsuario) {
        $usuarioM = model('Usuario');
    
        // Verifica si el ID no está vacío
        if (!$idUsuario) {
            return redirect()->to(base_url('/usuarios'));
        }
    
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellidoPaterno' => $this->request->getPost('apellidoPaterno'),
            'apellidoMaterno' => $this->request->getPost('apellidoMaterno'),
            'password' => $this->request->getPost('password'),
            'tipoUsuario' => $this->request->getPost('tipoUsuario'),
            'correo' => $this->request->getPost('correo'),
            'telefono' => $this->request->getPost('telefono'),
            'fechaNacimiento' => $this->request->getPost('fechaNacimiento')
        ];
    
        
        $usuarioM->update($idUsuario, $data);
    
        return redirect()->to(base_url('/usuarios'));
    }
    


    public function inserta(){ 
        if (! $this->request->is('post')) {
                $this->index();
        }
        
        $rules = [
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'password' => 'required',
            'tipoUsuario' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'fechaNacimiento' => 'required'
        ];

        $usuarios = [
            "nombre" => $_POST['nombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "password" => $_POST['password'],
            "tipoUsuario" => $_POST['tipoUsuario'],
            "correo" => $_POST['correo'],
            "telefono" => $_POST['telefono'],
            "fechaNacimiento" => $_POST['fechaNacimiento']
        ] ;

            if (! $this->validate($rules)) {
                return     
                view('head') .
                view('menu') . 
                view('usuarios/add',[
                    'validation' => $this->validator
                ]) .
                view('footer'); 
            }
            else{
                $UsuarioM = model('Usuario');
                $UsuarioM->insert($usuarios);
                return redirect()->to(base_url('/usuarios'));
            }

        
    }

    public function delete($idUsuario){

        $usuarioM = model('Usuario');
        $usuarioM->delete($idUsuario);
        return redirect()->to(base_url('/usuarios'));
    }




















    public function acceder(){
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $correo = $_POST['correo'];

    $usuarioM = model('UsuarioM');
    $session = session();
    $result = $usuarioM->valida($nombre,$password,$correo);
    if (count($result) > 0) {
        
        if ($result[0]->valido == 1) {
            
            $newdata = [
                'nombre'       => $result[0]->nombre,
                'tipoUsuario'  => $result[0]->tipoUsuario,
                'valido' => $result[0]->valido,
                'logged_in'    => TRUE,
            ];

            $session->set($newdata);
            
            switch ($result[0]->tipoUsuario) {
                case 0:
                    return redirect()->to(base_url('/categorias'));
                case 1:
                    return redirect()->to(base_url('/categorias'));
                case 2:
                    return redirect()->to(base_url('/categorias'));
                default:
                    
                    return redirect()->to(base_url('/login'));
            }
        } elseif ($result[0]->valido == 0) {
            
            $session->setFlashdata('error', 'Su cuenta está en proceso de verificación.'); 
            return redirect()->to(base_url('/login'));
        } elseif ($result[0]->valido == 2) {
           
            $session->setFlashdata('error', 'Su cuenta no ha sido verificada.'); 
            return redirect()->to(base_url('/login'));
        }
    } else {
        
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
    
}


    public function salir(){
        $array_items = ['nombre', 'tipoUsuario', 'valido', 'logged_in'];
        $session = session();
        $session->remove($array_items); 

            return redirect()->to(base_url('/login'));

}

    public function registrar(){   
    return view('head') . 
    view('usuarios/register') .
    view('footer');
}

public function insert() {
    if (! $this->request->is('post')) {
        return redirect()->to(base_url('/usuario')); 
    }

    $rules = [
        'nombre' => 'required|min_length[3]',
        'correo' => 'required|valid_email',
        'telefono' => 'required|regex_match[/^[0-9]{10}$/]', 
        'fechaNacimiento' => 'required|valid_date',
        'contraseña' => 'required|min_length[6]|matches[contraseña2]', 
        'contraseña2' => 'required' 
    ];

    
    $usuarioData = [
        'nombre' => $_POST['nombre'], 
        'correo' => $_POST['correo'], 
        'telefono' => $_POST['telefono'],
        'fechaNacimiento' => $_POST['fechaNacimiento'],
        'tipoUsuario' => 3,
        'password' => $_POST['contraseña'] 
    ];


    if (! $this->validate($rules)) {

        return view('head') . 
                view('menu') . 
                view('usuarios/register', [
                    'validation' => $this->validator
                ]) . 
                view('footer');
    } else {
        
        $usuarioM = model('UsuarioM');
        $usuarioM->insert($usuarioData);
        
        
        return redirect()->to(base_url('/login'));
    }
}


}