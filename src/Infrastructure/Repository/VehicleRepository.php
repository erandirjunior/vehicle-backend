<?php

namespace SRC\Infrastructure\Repository;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleBoundery;
use SRC\Domain\Vehicle\Interfaces\VehicleCreateRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleDeleteRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleFindAllByModel;
use SRC\Domain\Vehicle\Interfaces\VehicleFindAllRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleFindRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleUpdateRepository;

/**
 * Class BrandRepository
 * @package SRC\Infrastructure\Repository
 */
class VehicleRepository implements
    VehicleCreateRepository,
    VehicleDeleteRepository,
    VehicleFindRepository,
    VehicleUpdateRepository,
    VehicleFindAllByModel
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

    public function create(VehicleBoundery $vehicleBoundery): bool
    {
        $sql = "INSERT INTO vehicle (value, model_id, brand_id, year_model, fuel) VALUE (?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $vehicleBoundery->getValue());
        $stmt->bindValue(2, $vehicleBoundery->getModelId());
        $stmt->bindValue(3, $vehicleBoundery->getBrandId());
        $stmt->bindValue(4, $vehicleBoundery->getYearModel());
        $stmt->bindValue(5, $vehicleBoundery->getFuel());

        return $stmt->execute();
    }

    /**
     * @param $id
     * @return array
     */
    public function findById($id): array
    {
        $stmt = $this->connection->prepare("SELECT
                                            id,
                                            value,
                                            model_id,
                                            brand_id,
                                            year_model,
                                            fuel
                                        FROM
                                            vehicle
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
        $stmt = $this->connection->prepare("DELETE FROM vehicle WHERE id = ?");
        $stmt->bindValue(1, $id);

        return $stmt->execute() ? true : false;
    }

    public function update(int $id, VehicleBoundery $vehicleBoundery): bool
    {
        $stmt = $this->connection->prepare("UPDATE
                                                vehicle
                                            SET
                                                value = ?,
                                                brand_id = ?,
                                                model_id = ?,
                                                year_model = ?,
                                                fuel = ?
                                            WHERE
                                                id = ?");
        $stmt->bindValue(1, $vehicleBoundery->getValue());
        $stmt->bindValue(2, $vehicleBoundery->getBrandId());
        $stmt->bindValue(3, $vehicleBoundery->getModelId());
        $stmt->bindValue(4, $vehicleBoundery->getYearModel());
        $stmt->bindValue(5, $vehicleBoundery->getFuel());
        $stmt->bindValue(6, $id);

        return $stmt->execute() ? 1 : 0;
    }

    public function findAllByModel($id): array
    {
        $stmt = $this->connection->prepare("SELECT
                                            V.id,
                                            V.value,
                                            M.name as model,
                                            B.name as brand,
                                            V.year_model,
                                            V.fuel
                                        FROM
                                            vehicle V
                                            INNER JOIN brand B ON B.id = V.brand_id
                                            INNER JOIN model M ON M.id = V.model_id 
                                        WHERE
                                            M.id = ?
                                        ORDER BY value ASC");
        $stmt->bindValue(1, $id);

        return $stmt->execute() ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }
}