<?php

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class BaseModel extends Model
{
    use ValidatingTrait;

    /**
     * Forces a saveOrFail() using Walson Validation
     *
     * Whether the model should throw a ValidationException if it
     * fails validation. If not set, it will default to false.
     *
     * @var boolean
     */
    protected $throwValidationExceptions = true;
}
