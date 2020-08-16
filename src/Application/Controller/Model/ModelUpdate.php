<?php

namespace SRC\Application\Controller\Model;

use PlugRoute\Http\Request;
use SRC\Application\Boundery\Model;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Model\Interfaces\ModelUpdateRepository;
use SRC\Domain\Model\Interfaces\ModelValidator;
use SRC\Domain\Model\ModelUpdateHandler;

/**
 * Class ModelUpdate
 * @package SRC\Application\Controller\Model
 */
class ModelUpdate
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var ModelUpdateRepository
     */
    private ModelUpdateRepository $repository;

    /**
     * @var ModelValidator
     */
    private ModelValidator $validator;


    /**
     * ModelUpdate constructor.
     * @param Request $request
     * @param ModelUpdateRepository $modelUpdateRepository
     * @param ModelValidator $modelValidator
     */
    public function __construct(
        Request $request,
        ModelUpdateRepository $modelUpdateRepository,
        ModelValidator $modelValidator
    )
    {
        $this->request                  = $request;
        $this->repository               = $modelUpdateRepository;
        $this->validator                = $modelValidator;
    }

    /**
     * Call class to execute update action and return a json.
     *
     * @see JsonPresenter
     * @see ModelUpdateHandler
     */
    public function handler()
    {
        $id                 = $this->request->parameter('id');
        $name               = $this->request->input('name');
        $brandId            = $this->request->input('brandId');
        $validateException  = new ValidateException();
        $serverException    = new ServerException();
        $jsonPresenter      = new JsonPresenter();

        try {
            $model  = new Model($name, $brandId);
            $domain = new ModelUpdateHandler(
                $this->repository,
                $model,
                $this->validator,
                $validateException,
                $serverException
            );

            $domain->handler($id);

            echo $jsonPresenter->json('', 204);
        } catch (\Exception $exception) {
            echo $jsonPresenter->json($exception->getMessage(), $exception->getCode());
        }
    }
}