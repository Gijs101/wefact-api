<?php

namespace Media101\WeFactApi\Entities;

use Media101\WeFactApi\Traits\HasAttachments;

class Creditor extends BaseEntity
{
    use HasAttachments;

    public string $controller = 'creditor';
}