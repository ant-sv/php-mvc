<?

class controllers_error extends core_controller
{
    public function index(...$numbers)
    {
        http_response_code(404);
        parent::index($numbers);
    }
}
