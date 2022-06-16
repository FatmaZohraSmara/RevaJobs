<?php
class strings_lib 
{
    public static $ip_local        = 'localhost';
    public static $dbname_local    = 'eva_db';
    public static $account_local   = 'root';
    public static $password_local  = '';

    public static $ip_online       = '?????????';
    public static $dbname_online   = '?????????';
    public static $account_online  = '?????????';
    public static $password_online = '?????????';

    public static function display_message($opstate)
    {
        $msg = '';
        $cd = 0;

        try 
        {
            $msg = $opstate ? 'OPERATION TERMINEE AVEC SUCCES' : 'ECHEC DE L\'OPERATION';
            $cd  = $opstate ? 1 : 0;
            header('location: ../../../message.php?cd='.$cd.'&msg='.$msg);
        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }
        
        return $msg;
    }

    public static function generate_number()
    {
        $number = '';

        try 
        {
            $number = substr(md5(sha1(date("Y-m-d H:i:s.u"))), 7, 8);
        } 
        catch (Exception $exception) 
        {
            exception_lib::treat_exception($exception);
        }

        return $number;
    }
}