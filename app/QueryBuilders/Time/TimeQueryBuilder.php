<?php

declare(strict_types=1);

namespace App\QueryBuilders\Time;

use App\Models\Time;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModelClass of Model
 *
 * @extends Builder<Time>
 */
class TimeQueryBuilder extends Builder
{
    /**
     * @return TimeQueryBuilder<TModelClass>
     */
    public function latestTimes(?int $limit = 50): TimeQueryBuilder
    {
        return $this->orderByDesc('created_at')->limit($limit);
    }
}
