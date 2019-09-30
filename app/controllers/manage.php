<?

class controllers_manage extends core_controller
{
    public function index(...$data)
    {
        $model = $this->get_model();
        $addresses = $model->get_all_addresses();
        $files = $model->get_all_files();

        $this->view(['route' => $this->route, 'addresses' => $addresses, 'files' => $files]);
    }

    public function set_address(...$data)
    {
        if ($_SESSION['admin'] && isset($_POST['address']))
        {
            $this->get_model()->set_address(trim($_POST['address']));
        }

        header('location: /manage');
        die;
    }

    public function del_address(...$data)
    {
        if ($_SESSION['admin'])
        {
            $this->get_model()->del_address(trim($data[0]));
        }

        header('location: /manage');
        die;
    }

    public function upload(...$data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin'])
        {
            if ( $_FILES['file']['error'] == UPLOAD_ERR_OK )
            {
                $tmp_name = $_FILES['file']['tmp_name'];
                $ext = strtolower(end(explode('.', $_FILES['file']['name'])));

                $file_info = [];

                $file_info['address_id']  = $_POST['id'];
                $file_info['description'] = $_POST['description'];
                $file_info['guid']        = core_helper::guid();
                $file_info['path']        = "/public/files/{$file_info['guid']}.$ext";

                if (move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . $file_info['path']))
                {
                    $this->get_model()->register_file($file_info);
                }
            }
        }

        die;
    }

    public function del_file(...$data)
    {
        if ($_SESSION['admin'])
        {
            $this->get_model()->del_file(trim($data[0]));
        }

        header('location: /manage');
        die;
    }
}
