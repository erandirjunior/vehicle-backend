<?php

namespace SRC\Infrastructure\Repository;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;

class BrandRepository implements
    BrandCreateRepository,
    BrandFindAllRepository,
    BrandFindRepository,
    BrandDeleteRepository,
    BrandUpdateRepository
{
    private $connection;

    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function create(\SRC\Domain\Brand\Interfaces\BrandBoundery $BrandBoundery): bool
    {
        $stmt = $this->connection->prepare("INSERT INTO brand (name) VALUE (?)");
        $stmt->bindValue(1, $BrandBoundery->getName());

        return $stmt->execute();
    }

    public function findByBrandName(string $name): bool
    {
        $stmt = $this->connection->prepare("SELECT id FROM brand WHERE name = ? AND deleted_at IS NULL");
        $stmt->bindValue(1, $name);
        $stmt->execute();
        return !!$stmt->fetch();
    }

    public function findAll(): array
    {
        $stmt = $this->connection->query("SELECT
                                            name,
                                            id
                                        FROM
                                            brand
                                        WHERE
                                            deleted_at IS NULL");


        return $stmt->execute() ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }

    public function findById($id): array
    {
        $stmt = $this->connection->prepare("SELECT
                                            name,
                                            id
                                        FROM
                                            brand
                                        WHERE
                                            deleted_at IS NULL AND
                                            id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($id): bool
    {
        $stmt = $this->connection->prepare("UPDATE brand SET deleted_at = NOW() WHERE id = ?");
        $stmt->bindValue(1, $id);

        return $stmt->execute() ? true : false;
    }

    public function update(int $id, BrandBoundery $BrandBoundery): bool
    {
        $stmt = $this->connection->prepare("UPDATE
                                                brand
                                            SET
                                                name = ?,
                                                updated_at = NOW()
                                            WHERE
                                                id = ?");
        $stmt->bindValue(1, $BrandBoundery->getName());
        $stmt->bindValue(2, $id);

        return $stmt->execute() ? 1 : 0;
    }

    public function checkIfHasOtherBrandWithTheSameName(int $id, string $name): bool
    {
        $stmt = $this->connection->prepare("SELECT id FROM brand WHERE name = ? AND id != ? AND deleted_at IS NULL");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $id);
        $stmt->execute();
        return !!$stmt->fetch();
    }
}