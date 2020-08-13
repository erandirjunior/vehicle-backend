<?php

namespace SRC\Infrastructure\Repository;

use SRC\Domain\Brand\Interfaces\ContactCreateRepository;
use SRC\Domain\Brand\Interfaces\ContactDeleteRepository;
use SRC\Domain\Brand\Interfaces\ContactFindRepository;
use SRC\Domain\Brand\Interfaces\ContactUpdateRepository;

class ContactRepository implements ContactCreateRepository,
    ContactUpdateRepository,
    ContactDeleteRepository,
    ContactFindRepository
{
    private $connection;

    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function create($BrandId, $data): int
    {
        $stmt = $this->connection->prepare("INSERT INTO contact (Brand_id, type, contact) VALUE (?, ?, ?)");
        $stmt->bindValue(1, $BrandId);
        $stmt->bindValue(2, $data['type']);
        $stmt->bindValue(3, $data['contact']);

        return $stmt->execute() ? $this->connection->lastInsertId() : 0;
    }

    public function findByBrandIdentifier(string $identifier): bool
    {
        $stmt = $this->connection->prepare("SELECT id FROM Brand WHERE identifier = ? AND deleted_at IS NULL");
        $stmt->bindValue(1, $identifier);
        $stmt->execute();
        return !!$stmt->fetch();
    }

    public function findAll(): array
    {
        $stmt = $this->connection->query("SELECT name, id, name, type, identifier FROM Brand WHERE deleted_at IS NULL");


        return $stmt->execute() ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }

    public function findById($id): array
    {
        $stmt = $this->connection->prepare("SELECT
                                                contact,
                                                id
                                            FROM
                                                contact
                                            WHERE
                                                deleted_at IS NULL AND
                                                id = ?");
        $stmt->bindValue(1, $id);

        return $stmt->execute() ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }

    public function delete(int $BrandId, string $ids): bool
    {
        $stmt = $this->connection->prepare("UPDATE
                                                contact
                                            SET
                                                deleted_at = NOW()
                                            WHERE
                                                id NOT IN ({$ids}) AND
                                                Brand_id = ?");
        $stmt->bindValue(1, $BrandId);

        return $stmt->execute() ? 1 : 0;
    }

    public function update($BrandId, array $data): bool
    {
        $stmt = $this->connection->prepare("UPDATE contact SET type = ?, contact = ?, updated_at = NOW() WHERE id = ? AND Brand_id = ?");
        $stmt->bindValue(1, $data['type']);
        $stmt->bindValue(2, $data['contact']);
        $stmt->bindValue(3, $data['id']);
        $stmt->bindValue(4, $BrandId);

        return $stmt->execute() ? 1 : 0;
    }

    public function findByBrandId($BrandId): array
    {
        $stmt = $this->connection->prepare("SELECT
                                                contact,
                                                id,
                                                type
                                            FROM
                                                contact
                                            WHERE
                                                deleted_at IS NULL AND
                                                Brand_id = ?");
        $stmt->bindValue(1, $BrandId);
        $stmt->execute();

        return $stmt->execute() ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }
}