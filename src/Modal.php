<?php

namespace Ctrlweb\VoyagerModals;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    /**
     * Statuses.
     */
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';

    /**
     * List of statuses.
     *
     * @var array
     */
    public static $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];
}
