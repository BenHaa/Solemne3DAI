<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author CETECOM
 */
interface BaseDao {

    public static function agregarObjeto($dto);

    public static function LeerObjeto($id);

    public static function EliminarObjeto($id);

    public static function ActulizarObjeto($id);
    
}
