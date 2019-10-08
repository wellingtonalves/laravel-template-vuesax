<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class InvoicesCriteria.
 *
 * @package namespace App\Criteria;
 */
class InvoicesCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $this->isAdmin($model);

        return $model;
    }

    /**
     * @param $model
     * @return mixed
     */
    public function isAdmin($model)
    {
        $user = request()->user();
        if ($user->is_admin) {
            if (request()->has('status') && request()->get('status') == 2) {
                $model = $model->whereIn('status_id', [2]);
                return $model;
            }

            $model = $model->whereNotIn('status_id', ['7', '8', '3', '6', '4', '2'])
                ->orderByRaw("FIELD(status_id, '5') DESC")
                ->orderByRaw("FIELD(status_id, '1') DESC")
                ->orderByRaw("FIELD(priority, 'alto') DESC")
                ->limit(1);

            return $model;
        }

        if (request()->has('status') && request()->get('status') == 2) {
            $model = $model->whereIn('status_id', [4]);
            return $model;
        }

        return $model->where('company_id', $user->company_id)
            ->where('user_id', $user->id)
            ->whereNotIn('status_id', ['7', '8', '4'])
            ->orderByRaw("FIELD(status_id, '6') DESC")
            ->orderByRaw("FIELD(status_id, '3') DESC")
            ->orderByRaw("FIELD(priority, 'alto') DESC");
    }
}
