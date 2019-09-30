<?

class models_info extends core_model
{
    public function get_info()
    {
        return core_db::run('SELECT id, title, value, parent_id FROM info WHERE deleted = 0 ORDER BY COALESCE(parent_id, id), updated;')->fetchAll();
    }

    public function add($data)
    {
        core_db::run('INSERT IGNORE INTO info (title, value, parent_id) VALUES (:title, :value, :parent_id);', $data);
    }

    public function edit($data)
    {
        core_db::run('UPDATE info SET title = :title, value = :value WHERE `id` = :id;', $data);
    }

    public function delete($data)
    {
        core_db::run('SET @id = :id;', $data);
        core_db::query('UPDATE info SET deleted = 1 WHERE id = @id OR parent_id = @id;');
    }
}
