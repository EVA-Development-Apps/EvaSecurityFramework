<?php
/**
 *  Eva File Logging framework
 *
 * @package    eve.utils
 * @subpackage logging
 * @author     Eva Developer Team
 * @access     public  
 * @version    1.0
 * @since      2022
 *
 */

class EvaLogger {

  const EVA_USER_ERROR_LOGS = 'var\log\EvaLogger.log';


    
    /** 
    * General Eva Exception Logging to File based system.
    * @param string $text is the exception message, in case of Eva Exception this is formated by __toString() for display
    * @param string $level is the level of the error message. 
    * @param string $fileName is the name of the file from where the error is coming.
    * @access public 
    */
    public static function loggingEvaException($text, $level='i',$fileName ) {
      $destinationFile=self::EVA_USER_ERROR_LOGS;
      switch (strtolower($level)) {
          case 'e':
          case 'error':
              $level='ERROR';
              break;
          case 'i':
          case 'info':
              $level='INFO';
              break;
          case 'd':
          case 'debug':
              $level='DEBUG';
              break;
          case 'w':
          case 'Warning ':
              $level='WARNING';
              break;
          default:
              $level='INFO';
      }

      error_log(date("[Y-m-d H:i:s]")."\t[".$level."]\t[".basename($fileName)."]\t".$text."\n", 3, $destinationFile);
    }

    /** 
    * Default Exception class Logging to File based system.
    * @param class  $aException is the default exception class.
    * @access public 
    */
    public static function loggingDefaultException($aException) {
      $destinationFile=self::EVA_USER_ERROR_LOGS;
      $level='DEFAULT';
      error_log(date("[Y-m-d H:i:s]")."\t[".$level."]\t[".basename($aException->getFile())."]\t".$aException."\n", 3, $destinationFile);
    }


    /** 
    * General Eva warnnings Logging to File based system.
    * @param string $fileName is the name of the file from where the warnning is comming.
    * @param string $aWarnMEssage is the warn message. 
    * @access public 
    */
    public static function loggingWarnings($fileName, $aWarnMEssage) {
      $destinationFile=self::EVA_USER_ERROR_LOGS;
      $level='WARNING';
      error_log(date("[Y-m-d H:i:s]")."\t[".$level."]\t[".basename($fileName)."]\t".$aWarnMEssage."\n", 3, $destinationFile);
    }


}


?>