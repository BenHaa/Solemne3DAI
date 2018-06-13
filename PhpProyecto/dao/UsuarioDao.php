<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDao
 *
 * @author CETECOM
 */
include_once 'BaseDao.php';
include_once 'ConversionDao.php';

interface UsuarioDao extends BaseDao, ConversionDao {
    public static function ComprobarUsuario($rut, $pass);
}
