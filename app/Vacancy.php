<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use ElasticquentTrait;

    protected $fillable = [
        'title',
        'description'
    ];

    protected $mappingProperties = [
        'title' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
        'description' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
    ];
}
