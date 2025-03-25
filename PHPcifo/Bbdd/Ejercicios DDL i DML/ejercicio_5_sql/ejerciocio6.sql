/* Exercici 23 */
SELECT nom_cientific, nom_popular FROM planta;

/* Exercici 24 */
SELECT DISTINCT nom_planta FROM dosi_adob WHERE nom_adob='Casadob';

/* Exercici 25 */
SELECT nom_adob, tipus_adob FROM adob WHERE firma_comercial='PRISADOB'

/* Exercici 26 */
SELECT nom_planta FROM planta_interior WHERE temperatura>=16;

/* Exercici 27 */
SELECT nom_planta FROM planta_interior WHERE temperatura>=16;

/* Exercici 28 */
SELECT SUM(quantitat_adob) AS total_adob FROM dosi_adob;

/* Exercici 29 */
SELECT nom_planta 
FROM dosi_adob 
WHERE estacio IN ('ivern', 'Tardor');

/* Exercici 30 */
SELECT AVG(quantitat_adob) AS valor_medio FROM dosi_adob 
WHERE nom_adob='Casadob';

/* Exercici 31 */
SELECT nom_cientific, nom_popular FROM planta WHERE nom_popular LIKE '%i%';

/* Exercici 32 */
SELECT AVG(temperatura) AS temp_media FROM planta_interior 

/* Exercici 33 */
SELECT nom_adob, firma_comercial FROM adob WHERE firma_comercial IN('CIRSADOB', 'TIRSADOB');

/* Exercici 34 */
SELECT SUM (num_examplar) AS total_exemplars FROM exemplars_plantes 

/* Exercici 35 */
SELECT SUM (num_examplar) AS total_exemplars FROM exemplars_plantes 

/* Exercici 36 */
SELECT MIN(quantitat_adob) AS quantitat_adob_minima,
MAX(quantitat_adob) AS quantitat_adob_maxima
FROM dosi_adob;

/* Exercici 37 */
SELECT MAX(temperatura) FROM planta_interior


/* Exercici 38 */
SELECT DISTINCT nom_planta FROM dosi_adob WHERE quantitat_adob>=40


/* Exercici 39 */
SELECT nom_planta FROM exemplars_plantes WHERE num_examplar>4


/* Exercici 40 */
SELECT SUM(quantitat_adob) FROM dosi_adob WHERE nom_planta='Euphorbia'


/* Exercici 41 */
SELECT nom_planta FROM dosi_adob WHERE estacio='primavera' OR nom_adob='Sanexplant'

/* Exercici 42 */
SELECT nom_planta FROM reproduccio WHERE met_reproducc='Esqueix' AND grau_exit='Alt'

/* Exercici 43 */
SELECT COUNT(*) FROM reproduccio WHERE grau_exit='Mitjà'