<?php

namespace SRC\Infrastructure\Repository;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;
use SRC\Domain\Model\Interfaces\ModelBoundery;
use SRC\Domain\Model\Interfaces\ModelCreateRepository;
use SRC\Domain\Model\Interfaces\ModelDeleteRepository;
use SRC\Domain\Model\Interfaces\ModelFindAllRepository;
use SRC\Domain\Model\Interfaces\ModelFindRepository;
use SRC\Domain\Model\Interfaces\ModelUpdateRepository;

/**
 * Class ModelRepository
 * @package SRC\Infrastructure\Repository
 */
class ModelRepository implements
    ModelCreateRepository,
    ModelUpdateRepository,
    ModelFindAllRepository,
    ModelFindRepository,
    ModelDeleteRepository
{
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * ModelRepository constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    /**
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
    public function create(ModelBoundery $modelBoundery): bool
    {
        $stmt = $this->connection->prepare("INSERT INTO model (name, brand_id) VALUE (?, ?)");
        $stmt->bindValue(1, $modelBoundery->getName());
        $stmt->bindValue(2, $modelBoundery->getBrandId());

        return $stmt->execute();
    }

    /**
     * @param string $name
     * @return bool
     */
    public function findByModelName(string $name): bool
    {
        $stmt = $this->connection->prepare("SELECT id FROM model WHERE name = ?");
        $stmt->bindValue(1, $name);
        $stmt->execute();
        return !!$stmt->fetch();
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $sql = 'SELECT id, name, brand_id FROM model';
        $stmt = $this->connection->query($sql);

        return $stmt->execute() ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }

    /**
     * @param $id
     * @return array
     */
    public function findById($id): array
    {
        $sql = 'SELECT id, name, brand_id FROM model WHERE id = ?';
        $stmt = $this->connection->prepare($sql);
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
        $stmt = $this->connection->prepare("DELETE FROM model WHERE id = ?");
        $stmt->bindValue(1, $id);

        return $stmt->execute() ? true : false;
    }

    /**
     * @param int $id
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
    public function update(int $id, ModelBoundery $modelBoundery): bool
    {
        $stmt = $this->connection->prepare("UPDATE
                                                model
                                            SET
                                                name = ?,
                                                brand_id = ?,
                                                updated_at = NOW()
                                            WHERE
                                                id = ?");
        $stmt->bindValue(1, $modelBoundery->getName());
        $stmt->bindValue(2, $modelBoundery->getBrandId());
        $stmt->bindValue(3, $id);

        return $stmt->execute() ? 1 : 0;
    }
}