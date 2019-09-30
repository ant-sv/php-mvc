<?

class core_controller
{
    public $route;

    public function __construct()
    {
        $this->route = substr(get_class($this), 12); 
    }

    public function index(...$numbers)
    {
        $this->view(['route' => $this->route]);
    }

    protected function get_model()
    {
        $model = 'models_' . $this->route;
        return new $model;
    }

    protected function view($data = [])
    {
        global $CFG;

        # buffering
        ob_start();

        require_once './app/views/header.php';
        require_once './app/views/' . $this->route . '.php';
        require_once './app/views/footer.php';

        # output
        ob_end_flush();
        die;
    }
}
