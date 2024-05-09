<?php

namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class GuardianFilter extends ApiFilter{
    protected $allowedParams = [
        'id' => ['eq','ne','gt','lt'],
        'type' => ['eq','ne'],
        'sectionId' => ['eq','ne'],
        'publishedAt' => ['eq','lt','gt','lte','gte'],
        'createdAt' => ['eq','lt','gt','lte','gte'],
        'updatedAt' => ['eq','lt','gt','lte','gte'],
    ];

    protected $columnMap = [
        'sectionId' => 'section_id',
        'publishedAt' => 'published_at',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>=',
        'ne' => '!='
    ];
}
