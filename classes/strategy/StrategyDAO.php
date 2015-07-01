<?php
namespace strategy;
use PDO,utils\Conn;
class StrategyDAO {
    public static function getStrategies(){/**GET ACTIVE STRATEGIES WITH FUTURES NAMES - RETURNS ARRAY OF OBJECTS**/
        $db= Conn::getConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
        try{
            $res = $db->prepare("SELECT id_strategy, strategy_name, GROUP_CONCAT(futures_name ORDER BY futures_name ASC SEPARATOR ',') AS futures_name "
                    . "FROM strategy "
                    . "LEFT JOIN futures_cont ON id_strategy=fk_strategy "
                    . "WHERE strategy.status = 1 "
                    . "GROUP BY strategy_name");
            $res->execute();
            $tr = $res->fetchAll(PDO::FETCH_CLASS, "strategy\Strategy");
            return $tr;
        }catch(\PDOException $e){
            return FALSE;
            //echo "error". $e->getMessage();
        }
    }
    public static function newStrategy($strategy){
        $db= Conn::getConnection();        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        try{
            $res = $db->prepare("INSERT INTO strategy "
                . "(id_strategy,strategy_name) "
                . "VALUES ('',:strategy_name)");
            $res->bindParam(':strategy_name',$strategy['strategy_name']);
            $res->execute();
            return TRUE;
        }catch(\PDOException $e){
            return FALSE;
            //echo "error". $e->getMessage();
        }
    }
    public static function updateStrategy($strategy){
        $db= Conn::getConnection();       
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);         
        try{
            $res = $db->prepare("UPDATE strategy "
                . "SET strategy_name=:strategy_name "
                . "WHERE id_strategy=:id_strategy");
            $res->bindParam(':id_strategy',$strategy['id_strategy']);
            $res->bindParam(':strategy_name',$strategy['strategy_name']);
            $res->execute();
            return TRUE;
        }catch(\PDOException $e){
            return FALSE;
            //echo "error". $e->getMessage();
        }
    }
    public static function removeStrategy($strategy){
        $db= Conn::getConnection();           
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
        try{
            $res = $db->prepare("UPDATE strategy "
                . "SET status=0 "
                . "WHERE id_strategy=:id_strategy");
            $res->bindParam(':id_strategy',$strategy['id_strategy']);
            $res->execute();
            return TRUE;
        }catch(\PDOException $e){
            return FALSE;
            //echo "error". $e->getMessage();
        }
    }
}