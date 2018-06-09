INSERT INTO postulante 
(est_civil, hijos, telefono, email, direccion, comuna, nivel_educacion, renta, sueldo_liq, Emfermedad_cronica, rut_postulante)
 VALUES (1,2,"123456789","ASD@ASD.CL","123ASD",5,2,1,123456,"NO POSEE","123456789-1");

UPDATE postulante 
(est_civil, hijos, telefono, email, direccion, comuna, nivel_educacion, renta, sueldo_liq, Enfermedad_cronica, rut_postulante)
 VALUES (?,?,?,?,?,?,?,?,?,?,?) ;

INSERT INTO persona 
(rut, nombre, ap_paterno, ap_materno, sexo, fecha_nac)
VALUES("123456789-1", "nombre", "ap1","ap2",2, "1995-11-27");
