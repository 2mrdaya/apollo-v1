<?php

   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'ApolloDelhi@123';
   $dbname = 'apollo-v1';
 
   $backup_file = '/var/www/html/apollo-v1/database/backup/'. $dbname . date("Y-m-d-H-i-s") . '.gz';
   $command = "mysqldump --opt -u $dbuser -p$dbpass ". $dbname ."| gzip > $backup_file";
   echo $command;   
   system($command);
?>
