<?php

namespace App\Classes;
use Carbon\Carbon;

class WhatsAppFormatting {

    public static function formatWhatsAppFile($file)
    {
        $tmpfileName = explode(".",$file)[0].'_'.strval(rand()).'_whatsapp.csv';
        $tmpfile = fopen($tmpfileName, 'w');
        $line = "date_time, mobile, message";
        fwrite($tmpfile,$line.PHP_EOL);
        $originalFile = fopen($file, "r") or die("Unable to open file!");
        // Output one line until end-of-file
        $p_str = fgets($originalFile);
        $i = 0;
        while(!feof($originalFile)) {
            $str =  fgets($originalFile);
            if(empty(SELF::getDate1($str)))
            {
                $i = 0;
                while(empty(SELF::getDate1($str))) {
                    $p_str .= " ".$str;
                    if(!feof($originalFile))
                        $str = fgets($originalFile);
                    else
                        break;
                    $i++;
                }
            }

            $final = $p_str;
            $line = SELF::getDate1($final).','.SELF::getName($final).',"'.SELF::getComments($final).'"';
            $search = 'pt|patient';

            if(preg_match("/{$search}/i", $line)) {
                fwrite($tmpfile,$line.PHP_EOL);
            }

            $p_str = $str;
        }
        fclose($originalFile);
        fclose($tmpfile);
        $fileNameTokenArr = explode("/",$tmpfileName);
        return end($fileNameTokenArr);
    }

    public static function getDate1($str = "")
    {
        if(!empty($str))
        {
            preg_match('/\[[^\]]*\]/', $str, $matches);

            if(!empty($matches[0]) && is_numeric($matches[0][1]) && substr_count($matches[0],'/')==2)
            {
                $msg_date = str_replace(',','',substr($matches[0], 1, -1));
                //echo substr_count($matches[0],'/');//die();
                $msg_date = Carbon::createFromFormat('d/m/y h:s:i A', $msg_date)->format('Y-m-d h:i:s');
                //var_dump($msg_date);
                //echo "<br>.$msg_date";
                return $msg_date;
            }
            else
            {
                return "";
            }
        }
    }

    public static function getName($str = "")
    {
        if(!empty($str))
        {

            $tmpstr = strstr($str,"]");

            $end = strpos($tmpstr,":");

            $str = preg_replace("/[^ \w]+/", "", substr($tmpstr, 1, $end - 1));

            return $str;
        }
    }

    public static function getComments($str = "")
    {
        if(!empty($str))
        {
            $str = strstr($str,"]");
            $str = strstr($str,":");
            $str = preg_replace("/[^a-zA-Z0-9 .,-]/", "", $str);

            return $str;
        }
    }
}
