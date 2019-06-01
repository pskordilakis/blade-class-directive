<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PSkordilakis\BladeClassDirective\ClassNames;

class ClassNamesTest extends TestCase
{
    public function test_processWithNoArguments()
    {
        $classNames = new ClassNames();

        $classes = $classNames->process();

        $this->assertEquals($classes, '');
    }

    public function test_processStringArgument()
    {
        $classNames = new ClassNames();

        $fixedClasses = 'someClass anotherClass';

        $classes = $classNames->process($fixedClasses);

        $this->assertEquals($classes, $fixedClasses);
    }

    public function test_processArrayArguments()
    {
        $classNames = new ClassNames();

        $optionalClasses = [
            'someClass' => true,
            'anotherClass' => false,
            'thirdClass' => true,
        ];

        $classes = $classNames->process($optionalClasses);

        $this->assertEquals($classes, 'someClass thirdClass');
    }

    public function test_processMixedArguments()
    {
        $classNames = new ClassNames();

        $fixedClasses = 'someClass anotherClass';
        $optionalClasses = [
            'includedClass' => true,
            'excludedClass' => false,
        ];

        $classes = $classNames->process($fixedClasses, $optionalClasses);

        $this->assertEquals($classes, 'someClass anotherClass includedClass');
    }

    public function test_withProcessMethod()
    {
        $classNames = new ClassNames();

        $fixedClasses = 'someClass anotherClass';
        $optionalClasses = [
            'includedClass' => true,
            'excludedClass' => false,
        ];

        $classes = $classNames->process($fixedClasses, $optionalClasses);

        $this->assertEquals($classes, 'someClass anotherClass includedClass');
    }

    public function test_invokeInstance()
    {
        $classNames = new ClassNames();

        $fixedClasses = 'someClass anotherClass';
        $optionalClasses = [
            'includedClass' => true,
            'excludedClass' => false,
        ];

        $classes = $classNames($fixedClasses, $optionalClasses);

        $this->assertEquals($classes, 'someClass anotherClass includedClass');
    }

    public function test_helperFunction()
    {
        $classNames = new ClassNames();

        $fixedClasses = 'someClass anotherClass';
        $optionalClasses = [
            'includedClass' => true,
            'excludedClass' => false,
        ];

        $classes = classNames($fixedClasses, $optionalClasses);

        $this->assertEquals($classes, 'someClass anotherClass includedClass');
    }
}
