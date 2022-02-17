<?php
/**
 *  Eva custom exception class. A User defined Exception class can be defined by extending the built-in Exception class. 
 *
 * @package    eve.utils
 * @subpackage exception
 * @author     Eva Developer Team
 * @access     public  
 * @version    1.0
 * @since      2022
 *
 */

require_once('bootstrap.php');

class EvaException extends Exception
{
   
    /** 
    * Redefine the exception __construct so message isn't optional
    * @param string $message The Exception message to throw. The message is NOT binary safe.
    * @param int $code The Exception code.
    * @param class $previous The previous exception used for the exception chaining.
    * @access public 
    */
    public function __construct($message, $code = 0, Throwable $previous = null) {
        // some code
    
        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }


    /** 
    * Custom string representation of Eva Exception object
    * @access public 
    * @return Returns the string representation of the exception.
    */
    public function __toString() {
        //return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
        return get_class($this) . " {$this->code} '{$this->message}' #--IN--# '{$this->file}' #--LINE NUMBER--# ({$this->line})\n"
        . "{$this->getTraceAsString()}";
    }

    /** 
    * General Eva Exception Logging to File based system.
    * @param class $aEvaException is the custome Eva exception class.
    * @param string $level is the level of the error message. 
    * @access public 
    */
    public function logEvaException($aEvaException, $aLogLevel ) {
        $logger = new EvaLogger();
        $logger->loggingEvaException($aEvaException->__toString(),  $aLogLevel, $aEvaException->getFile());
    }
}

?>