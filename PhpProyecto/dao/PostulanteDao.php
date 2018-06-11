<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostulanteDao
 *
 * @author CETECOM
 */
include_once 'BaseDao.php';

abstract class PostulanteDao implements BaseDao {

    //put your code here
    //registrar postulante
    public abstract static function agregarObjeto($dto);

    public abstract static function ActulizarObjeto($id);

    public abstract static function EliminarObjeto($id);

    public abstract static function LeerObjeto($id);

    public abstract static function RecuperarUltimoid();
}
