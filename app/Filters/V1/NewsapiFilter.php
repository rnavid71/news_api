<?php

namespace App\Filters\V1;
use App\Filters\ApiFilter;

class NewsapiFilter extends ApiFilter{
    protected $allowedParams = [
        'id' => ['eq','ne','gt','lt'],
        'title' => ['eq'],
        'description' => ['gt','lt'],
        'author' => ['eq','ne'],
        'source' => ['eq','ne'],
        'publishedAt' => ['eq','lt','gt','lte','gte'],
        'createdAt' => ['eq','lt','gt','lte','gte'],
        'updatedAt' => ['eq','lt','gt','lte','gte'],
    ];

    protected $columnMap = [
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
