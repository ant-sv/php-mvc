<?

class models_manage extends core_model
{
    public function get_all_addresses()
    {
        return core_db::run('SELECT `id`, `address` FROM `addresses` WHERE `deleted` = 0;')->fetchAll(PDO::FETCH_KEY_PAIR);
    }

    public function get_all_files()
    {
        return core_db::run('SELECT `id`, `address_id`, `description`, `path` FROM `files` WHERE `deleted` = 0;')->fetchAll();
    }

    public function set_address($address)
    {
        core_db::run('INSERT IGNORE INTO `addresses` SET `address` = ?;', [$address]);
    }

    public function del_address($id)
    {
        core_db::run('UPDATE `addresses` SET `deleted` = 1 WHERE `id` = ?;', [$id]);
    }

    public function register_file($file_info)
    {
        core_db::run('INSERT INTO `files` SET `address_id` = :address_id, `description` = :description, `guid` = :guid, `path` = :path;', $file_info);
    }

    public function del_file($id)
    {
        core_db::run('UPDATE `files` SET `deleted` = 1 WHERE `id` = ?;', [$id]);
    }
}
