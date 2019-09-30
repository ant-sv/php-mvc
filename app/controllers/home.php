<?

class controllers_home extends core_controller
{
    public function index(...$data)
    {
        $info = $this->get_model()->get_info();
        $this->view(['route' => $this->route, 'info' => $info]);
    }
}
