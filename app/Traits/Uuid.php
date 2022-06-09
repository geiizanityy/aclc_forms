<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    protected static function boot()
    {
        // Boot other traits on the Model
        parent::boot();

        /**
         * Listen for the 'creating' event on the Track Model.
         * Sets the 'id' to a UUID using Str::uuid() on the instance being created
        */
        static::creating(function ($model) {
            // Check if the primary key doesn't have a value
            if (!$model->getKey()) {
                $genrateduuid = Str::uuid()->toString();
                $id = substr($genrateduuid,0,18);
                // Dynamically set the primary key
                $model->setAttribute($model->getKeyName(), $id);
            }
        });
    }

    // Tells Eloquent Model not to auto-increment this field
    public function getIncrementing()
    {
        return false;
    }

    // Tells that the IDs on the table should be stored as strings
    public function getKeyType()
    {
        return 'string';
    }
}
