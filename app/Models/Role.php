<?php

namespace App\Models;


use Ramsey\Uuid\Uuid;

class Role extends AbstractModel
{

    /**
     * @throws \Exception
     */
    public function setUuidAttribute()
    {
        $this->attributes['uuid'] = Uuid::uuid4();
    }
}
