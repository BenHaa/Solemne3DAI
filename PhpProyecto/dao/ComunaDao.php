<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComunaDao
 *
 * @author Ignacio
 */
include_once 'ConversionDao.php';

interface ComunaDao extends ConversionDao {

   static function AutoCompletadoComuna($string);
    
    
}
