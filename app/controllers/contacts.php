<?

class controllers_contacts extends core_controller
{
    public function index(...$data)
    {
        $contacts = $this->get_model()->get_all_contacts();
        $this->view(['route' => $this->route, 'contacts' => $contacts]);
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

    public function add(...$data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin'])
        {
            $this->get_model()->add(['title' => $_POST['title'], 'value' => $_POST['value']]);
        }

        die;
    }
}
