<?php

namespace PSkordilakis\BladeClassDirective;

class ClassNames
{

    /**
     * If instance is called as a function
     * just forward to process
     */
    public function __invoke(...$classes)
    {
        return $this->process(...$classes);
    }

    /**
     * Process mandatory and optional classes
     *
     * @param string|array $classes
     *
     * @return string
     */
    public function process(...$classes): string
    {
        $processed = array_reduce($classes, function ($acc, $class) {
            if (is_string($class)) {
                return array_merge($acc, [$this->processString($class)]);
            } elseif (is_array($class)) {
                return array_merge($acc, [$this->processArray($class)]);
            }
        }, []);

        return implode(' ', $processed);
    }

    /**
     * Process class passed as string
     *
     * @param string $classes
     *
     * @return string
     */
    private function processString(string $classes): string
    {
        // We just return the value
        return $classes;
    }

    /**
     * Process classes as array.
     *
     * @param array $classes
     *
     * @return string
     */
    private function processArray(array $classes): string
    {
        // filter based on value
        $filtered = array_filter($classes, function ($class) {
            return $class;
        });

        $keys = array_keys($filtered);

        return implode(' ', $keys);
    }
}
