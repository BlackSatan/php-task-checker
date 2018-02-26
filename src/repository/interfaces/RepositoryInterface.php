<?php
namespace src\repository\interfaces;

use src\repository\interfaces\RepositoryErrorInterface;

interface RepositoryInterface {

    /**
     * Finds entity by primary key, returns entity assoc array presentation,
     * or null, in case if entity don't found.
     *
     * @param string|int $id
     * @return array|null
     */
    public function findByPk($id): ?array;

    /**
     * Saves entity assoc array presentation in data storage
     *
     * @param array $data
     * @throws RepositoryErrorInterface
     */
    public function save(array $data);


}
