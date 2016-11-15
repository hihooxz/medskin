<?php
    class MY_Controller extends CI_Controller {

        public function __construct(){
                parent::__construct();
        }
        public function viewDefault($view, $data = []){
            if($view){
                if(!$this->session->userdata('currency-converter')){
                    $array = array(
                        'currency-converter' => 'IDR'
                    );
                    $this->session->set_userdata($array);
                }
                $view = preg_replace('/\s+/', '', $view);
                $viewData = [
                    'viewFile' => $this->router->directory . '/' . $view,
                    'activeMenu'  => [
                        $view => 'active'
                    ]
                ];
                $viewData = array_merge($viewData, $data);

                $this->load->view('default/index', $viewData);
            }
        }
    }

?>
