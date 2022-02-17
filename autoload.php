<?php

function eva_test_autoload($className)  {
   //list comma separated directory name
  $directory = array('src/classes/', 'src/model/', 'src/controller/', 'src/framework/');
  //list of comma separated file format
  $fileFormat = array('%s.php', '%s.class.php');
  foreach ($directory as $current_dir)
    {
        foreach ($fileFormat as $current_format)
        {

            $path = $current_dir.sprintf($current_format, $className);
            if (file_exists($path))
            {
                fwrite(STDOUT, __METHOD__ . " Loading class path ->".  $path."\r\n");
                include $path;
              
                return ;
            }else{
              //fwrite(STDOUT, __METHOD__ . " Unable to load class path ->".  $path."\r\n");
            }
        }
    }
}

spl_autoload_register('eva_test_autoload');

?>