<?

class models_home
{
    private function get_houses()
    {
        return core_db::run('SELECT COUNT(*) FROM addresses WHERE deleted = 0;')->fetchColumn();
    }

    private function get_area()
    {
        return core_db::run('SELECT value FROM info WHERE title LIKE "Площадь домов%";')->fetchColumn();
    }

    private function get_stuff()
    {
        return core_db::run('SELECT value FROM info WHERE title LIKE "Штатная численность%" AND parent_id IS NULL;')->fetchColumn();
    }

    public function get_info()
    {
        $info = [];

        $info['houses'] = $this->get_houses();
        $info['area'] = number_format(round(floatval(str_replace(' ', '', $this->get_area()))), 0, '.', ' ');
        $info['stuff'] = $this->get_stuff();

        return $info;
    }
}
