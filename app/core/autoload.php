<?

function __autoload ($class_name) {

    # $path = $_SERVER['DOCUMENT_ROOT'].'/'.str_replace('_', '/', $class_name).'.php';
    $path = './app/'.str_replace('_', '/', $class_name).'.php';

    if (file_exists( $path ))
    {
        include_once( $path );
    }
    else
    {
        header('location: /error');
        die;
    }
}
