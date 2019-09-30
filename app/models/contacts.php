<?

class models_contacts
{
    public function get_all_contacts()
    {
        return core_db::run('SELECT `id`, `title`, `value` FROM `contacts` WHERE `deleted` = 0 ORDER BY `id`;')->fetchAll();
    }

    public function delete($data)
    {
        core_db::run('UPDATE `contacts` SET `deleted` = 1 WHERE `id` = :id;', $data);
    }

    public function edit($data)
    {
        core_db::run('UPDATE `contacts` SET `title` = :title, `value` = :value WHERE `id` = :id;', $data);
    }

    public function add($data)
    {
        core_db::run('INSERT IGNORE INTO `contacts` (`title`, `value`) VALUES (:title, :value);', $data);
    }
}
