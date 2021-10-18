<?php

namespace Media101\WeFactApi\Entities;

use Media101\WeFactApi\Traits\HasAttachments;

class Debtor extends BaseEntity
{
    use HasAttachments;

    public string $controller = 'debtor';


}