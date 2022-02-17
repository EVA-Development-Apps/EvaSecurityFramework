<?php declare(strict_types=1);

require_once('bootstrap.php'); 


/**
 * @testdox EvaExceptionTest
 * 
 */

class EvaExceptionTest extends EvaUnitBase
{   
    /**
    * @expectedException EvaException
    * @covers
    */   
	public function testLogEvaCustomeException()
	{   
        $logger = new EvaLogger();
        $logger->loggingWarnings("EvaExceptionTest.php", "Trying to call THROW_CUSTOM");
        try {
            $myEvaCustomeException = new EvaCustomeException(EvaCustomeException::THROW_CUSTOM);
            $this->assertTrue(false, "Test failed");
        } catch (EvaException $evaExc) {      // Doesn't match this type
            //echo "Caught my Custom exception\n", $e;
            $logger->loggingWarnings("EvaExceptionTest.php" , "1");
            $evaExc->logEvaException($evaExc, "e");
        }  catch (Exception $e) {        // Skipped
            $logger->loggingWarnings("EvaExceptionTest.php" , "2");
            // echo "Caught Default Exception \n", $e;
            $logger->loggingDefaultException($e);  
        }
        $this->assertFalse(false, "Test failed");
        
    }

   /**
    * @expectedException Exception
    * @covers
    */  
    public function testCaughtDefaultException()
	{   
        $logger = new EvaLogger();
        $logger->loggingWarnings("EvaExceptionTest.php", "Trying to call THROW_DEFAULT");
        try {
            $myEvaCustomeException = new EvaCustomeException(EvaCustomeException::THROW_DEFAULT);
        } catch (EvaException $evaExc) {      // Doesn't match this type
            //echo "Caught my Custom exception\n", $e;
           // $this->assertType('Exception', $evaExc);
            $evaExc->logEvaException($evaExc, "e");
        }  catch (Exception $e) {        // Skipped
            // echo "Caught Default Exception \n", $e;
            $logger->loggingDefaultException($e);  
        }
        $this->assertFalse(false, "Test failed");
       
    }

    /**
    * @expectedException EvaException
    * @covers
    */ 
    public function testLogDefaultException()
	{   
        $this->expectException(EvaException::class);
        $logger = new EvaLogger();
        $logger->loggingWarnings("EvaExceptionTest.php", "Trying to call THROW_CUSTOM but catch Default");
       
        try {
            $myEvaCustomeException = new EvaCustomeException(EvaCustomeException::THROW_CUSTOM);
            $this->assertTrue(true);
          } catch (Exception $evaExc) {        // Will be caught
            //echo "Default Exception caught\n", $e;
            $logger->loggingDefaultException($evaExc);
          }
        $this->assertFalse(false, "Test failed");
        
    }

    /**
    * @covers
    */ 
    public function testNoException()
	{
        $logger = new EvaLogger();
        $logger->loggingWarnings("EvaExceptionTest.php", "Trying to call THROW_NONE");
        try {
            $myEvaCustomeException = new EvaCustomeException(EvaCustomeException::THROW_NONE);
          } catch (Exception $evaExc) {        // Will be caught
            //echo "Default Exception caught\n", $e;
            $logger->loggingDefaultException($evaExc);
          }
        $this->assertTrue(true);
    }

     
}

