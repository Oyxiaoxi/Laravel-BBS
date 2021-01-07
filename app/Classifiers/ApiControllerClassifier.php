<?php

namespace App\Classifiers;

use Wnx\LaravelStats\ReflectionClass;
use Wnx\LaravelStats\Contracts\Classifier;
use App\Http\Controllers\Api\Controller;

class ApiControllerClassifier implements Classifier
{
    public function name(): string
    {
        return 'ApiController';
    }

    public function satisfies(ReflectionClass $class): bool
    {
        return $class->isSubclassOf(Controller::class);
    }

    public function countsTowardsApplicationCode(): bool
    {
        return true;
    }

    public function countsTowardsTests(): bool
    {
        return false;
    }
}
