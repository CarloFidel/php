SELECT nom_popular FROM planta WHERE floracio='estiu'

SELECT DISTINCT nom_planta, tipus_planta FROM planta_exterior, planta WHERE floracio='primavera'; 
/* 
Exercici 45:
Mostra el nom científic de les plantes d’exterior que utilitzen adobs de la firma comercial CIRSADOB. Mostra 
també l’adob que utilitzen. */
SELECT DISTINCT nom_planta FROM planta_exterior, adob WHERE firma_comercial='CIRSADOB'

/* Exercici 46********:
Mostra els mètodes de reproducció de les plantes que tenim exemplars */
SELECT DISTINCT nom_metode FROM exemplars_plantes, metodes_reproduccio

/* Exercici 47:
De les plantes que utilitzen adobs de la firma UOCADOB, mostra el nom popular i entre parèntesi la quantitat 
d’adob utilitzat (el resultat l'ha de mostrar en un sol camp). */

SELECT nom_planta
FROM dosi_adob
UNION
SELECT firma_comercial
FROM adob
WHERE nom_adob='CIRSADOB';
