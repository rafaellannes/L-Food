<?php

namespace App\Services;

use App\Repositories\EvaluationRepository;
use App\Repositories\OrderRepository;

class EvaluationService
{
    protected $evaluationRepository, $orderRepository;

    public function __construct(
        EvaluationRepository $evaluationRepository,
        OrderRepository $orderRepository
    ) {
        $this->evaluationRepository = $evaluationRepository;
        $this->orderRepository = $orderRepository;
    }

    public function createNewEvaluation(string $identifyOrder, array $evaluation)
    {
        $clientId = $this->getIdClient();
        $order = $this->orderRepository->getOrderByIdentify($identifyOrder);

        return $this->evaluationRepository->newEvaluationOrder($order->id, $clientId, $evaluation);
    }

    private function getIdClient()
    {
        return auth()->user()->id;
    }
}
