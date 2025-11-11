<?php 
class Pages extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
        // Obtener los usuarios desde el modelo
        $users = $this->userModel->getUsers();

        $data = [
            'titulo' => 'Página Principal',
            'usuarios' => $users
        ];

        $this->view('pages/index', $data);
    }

    public function about() {
        $this->view('pages/about');
    }
}
?>
