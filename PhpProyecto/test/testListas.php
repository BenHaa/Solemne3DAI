<?php
include_once '../dao/ListasPostulanteDaoImp.php';

foreach (ListasPostulanteDaoImp::listarRenta() as $value) {
    echo "<h1>".$value."</h1>";
}