<?php

namespace App\Traits;

use ReflectionProperty;

/**
 * This trait marks a class's properties as lazily-initialized.
 * The classes using this trait shouldn't inject the lazily-initialized
 * properties via constructors, they should use the makeLazyProperty() method instead.
 * 
 * @internal
 * @version 1.0.0
 */
trait HasLazyInitializedProperties {
    
    /**
     * Marks lazily-initialized properies as uninitialized.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     */
    public final function __construct() {

        foreach ((new \ReflectionClass(static::class))->getProperties() as $property) {

            if ($this->isLazyProperty($property)) {

                unset($this->{$property->getName()});
            }
        }
    }

    /**
     * Initialized a lazily-initialized property.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     *
     * @param string $name
     * @return mixed
     */
    public final function __get($name) {

        try {

            if ($this->isLazyProperty($property = (new \ReflectionClass(static::class))->getProperty($name))) {

                return $this->$name = $this->makeLazyProperty($name, $property->getType()->getName());
            }

        } catch (\Throwable $_) {}

        user_error("Undefined property: " . static::class . "::$name");
    }

    /**
     * Checks whether the specified property is a lazily-initialized or not.
     * 
     * @internal
     * @since 1.0.0
     * @version 1.0.0
     *
     * @param ReflectionProperty $property
     * @return boolean
     */
    protected function isLazyProperty(ReflectionProperty $property): bool {

        return $property->hasType() && !$property->isStatic() && !$property->isPrivate();
    }

    /**
     * Creates the value to be assigned to the specified lazily-initialized property.
     * 
     * @internal
     * @since 1.0.0
     * @version 1.0.0
     *
     * @param string $name
     * @param string $type
     * @return mixed
     */
    protected function makeLazyProperty(string $name, string $type) {

        return app()->make($type);
    }
}
