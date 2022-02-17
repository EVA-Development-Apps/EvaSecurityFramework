<?php

/**
 *  Eva custom Unit class which every Unit test must Extends
 *
 * @package    src
 * @subpackage framework
 * @author     Eva Developer Team
 * @access     public  
 * @version    1.0
 * @since      2022
 *
 */
use PHPUnit\Framework\TestCase;


class EvaUnitBase extends TestCase
{   
    /** 
    *  Template methods are called before the first test of the test case class is run
    * Ex. Connect to the database before the test case class’ first test
    * @access protected 
    */
    public static function setUpBeforeClass(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    /** 
    * where you create the objects against which you will test.
    * @access protected 
    */
    protected function setUp(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");

    }

    /** 
    * Performs assertions shared by all tests of a test case.
    * This method is called before the execution of a test starts and after setUp() is called.
    * @access protected 
    */
    protected function assertPreConditions(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

   
    /** 
    * Performs assertions shared by all tests of a test case.
    * This method is called before the execution of a test ends and before tearDown() is called.
    * @access protected 
    */
    protected function assertPostConditions(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    /** 
    * where you clean up the objects against which you tested.
    * @access protected 
    */
    protected function tearDown(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }
    
    /** 
    * Template methods are called after the last test of the test case class is run.
    * Ex. disconnect from the database after the last test of the test case.
    * @access protected 
    */
    public static function tearDownAfterClass(): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    /** 
    * Runs after each failed test.
    * @access protected 
    */
    protected function onNotSuccessfulTest(Throwable $t): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        throw $t;
    }


}