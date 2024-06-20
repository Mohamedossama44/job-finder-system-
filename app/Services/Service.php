<?php

namespace App\Services;

use App\Traits\HasLazyInitializedProperties;

/**
 * Base Service.
 * 
 * By default, the dependencies of the classes descending from this base Service
 * will be injected via the HasLazyInitializedProperties trait instead of
 * the class's constructor, provided that, they are marked as
 * lazily-initialized properties.
 * 
 * @internal
 * @abstract
 */
abstract class Service {

    use HasLazyInitializedProperties;
}
