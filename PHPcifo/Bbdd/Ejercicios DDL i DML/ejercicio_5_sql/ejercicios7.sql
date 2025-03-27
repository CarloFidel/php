-- Active: 1742312937282@@127.0.0.1@3306@plantas
SELECT nom_popular FROM planta WHERE floracio='estiu'

SELECT DISTINCT nom_planta, tipus_planta FROM planta_exterior, planta WHERE nom_cientific = nom_planta AND floracio='primavera'; 
/* 44 */
SELECT nom_planta, tipus plan
/* 
Exercici 45:
Mostra el nom científic de les plantes d’exterior que utilitzen adobs de la firma comercial CIRSADOB. Mostra 
també l’adob que utilitzen. */

SELECT  planta_exterior.nom_planta, adob.nom_adob FROM plaplanta_exterior, dosi_adob, adob WHERE plaplanta_exterior.nom_planta=adob.nom_planta AND adob.nom_adob=adob.nom_abob AND firma_comercial='CIRSADOB';

/* Exercici 46********:
Mostra els mètodes de reproducció de les plantes que tenim exemplars */
SELECT DISTINCT met_reproducc 
FROM reproduccio JOIN  exemplars_plantes
ON reproduccio.nom_planta=exemplars_plantes.nom_planta

/* Exercici 47:
De les plantes que utilitzen adobs de la firma UOCADOB, mostra el nom popular i entre parèntesi la quantitat 
d’adob utilitzat (el resultat l'ha de mostrar en un sol camp). */

SELECT CONCAT(nom_popular,'(',quantitat_adob')')
FROM adob JOIN dosi_adob JOIN planta
ON dosi_adob.nonm_adob=adob.nom_adob AND dosi_adob.nom_planta=nom_cientific AND nom_firma='UOCADOB';


/* 50 */
SELECT DISTINCT nom_popular, floracio
FROM planta Join dosi_adob da 
ON nom_cientific=da.nom_planta
GROUP BY nom_popular
HAVING SUM(quantitat_adob)>40;

/* 50b */
SELECT DISTINCT nom_popular, floracio
FROM planta Join dosi_adob da 
ON nom_cientific=da.nom_planta
/* GROUP BY nom_popular */
WHERE 
HAVING SUM(quantitat_adob)>40;

/* Exercici 51:
Mostra el nom popular de les plantes d’interior que necessiten llum indirecta i les plantes d’exterior que són de 
temporada */