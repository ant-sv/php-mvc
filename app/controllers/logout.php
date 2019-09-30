<? class controllers_logout extends core_controller
{
    public function index(...$numbers)
    {
        if ($_SESSION['admin'])
        {
            $_SESSION = array();
            session_destroy();
        }
        
        header('location: /');
    }
}
