<?php

namespace SRC\Infrastructure\Repository;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;

/**
 * Class BrandRepository
 * @package SRC\Infrastructure\Repository
 */
class BrandRepository implements
    BrandCreateRepository,
    BrandFindAllRepository,
    BrandFindRepository,
    BrandDeleteRepository,
    BrandUpdateRepository
{
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * BrandRepository constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    /**
     * @param BrandBoundery $brandBoundery
     * @return bool
     */
    public function create(\SRC\Domain\Brand\Interfaces\BrandBoundery $brandBoundery): bool
    {
        $stmt = $this->connection->prepare("INSERT INTO brand (name) VALUE (?)");
        $stmt->bindValue(1, $brandBoundery->getName());

        return $stmt->execute();
    }

    /**
     * @param string $name
     * @return bool
     */
    public function findByBrandName(string $name): bool
    {
        $stmt = $this->connection->prepare("SELECT id FROM brand WHERE name = ?");
        $stmt->bindValue(1, $name);
        $stmt->execute();
        return !!$stmt->fetch();
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $stmt = $this->connection->query("SELECT
                                            name,
                                            id
                                        FROM
                                            brand");


        return $stmt->execute() ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }

    /**
     * @param $id
     * @return array
     */
    public function findById($id): array
    {
        $stmt = $this->connection->prepare("SELECT
                                            name,
                                            id
                                        FROM
                                            brand
                                        WHERE
                                            id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        $stmt = $this->connection->prepare("DELETE FROM brand WHERE id = ?");
        $stmt->bindValue(1, $id);

        return $stmt->execute() ? true : false;
    }

    /**
     * @param int $id
     * @param BrandBoundery $brandBoundery
     * @return bool
     */
    public function update(int $id, BrandBoundery $brandBoundery): bool
    {
        $stmt = $this->connection->prepare("UPDATE
                                                brand
                                            SET
                                                name = ?,
                                                updated_at = NOW()
                                            WHERE
                                                id = ?");
        $stmt->bindValue(1, $brandBoundery->getName());
        $stmt->bindValue(2, $id);

        return $stmt->execute() ? 1 : 0;
    }
}