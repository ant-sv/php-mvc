<? class controllers_auth extends core_controller
{
    public function index(...$numbers)
    {
        if (isset($_POST['pass']))
        {
            if (md5($_POST['pass']) === md5('****'))
                $_SESSION['admin'] = true;
        }
        else
        {
            # destroy session, send 401 and redirect to home with fail message
        }
        
        header('location: /');
        die;
    }
}
