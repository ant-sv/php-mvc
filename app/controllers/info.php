<?

class controllers_info extends core_controller
{
    public function index(...$data)
    {
        $info = $this->get_model()->get_info();
        $this->view(['route' => $this->route, 'info' => $info]);
    }

    public function add(...$data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin'])
        {
            $this->get_model()->add(['title' => $_POST['title'], 'value' => $_POST['value'], 'parent_id' => $_POST['id']]);
        }

        die;
    }

    public function edit(...$data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin'])
        {
            switch ($_POST['action'])
            {
                case 'delete':

                    $this->get_model()->delete(['id' => $_POST['id']]);
                    break;

                case 'edit':

                    $this->get_model()->edit(['id' => $_POST['id'], 'title' => $_POST['title'], 'value' => $_POST['value']]);
                    break;

                default: break;
            }
        }

        die;
    }
}
