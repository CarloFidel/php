-- Active: 1742225238351@@127.0.0.1@3306@plantas
USE Plantas;

/* Exercici 2 */
SELECT planta.nom_popular, adob.nom_adob, dosi_adob.quantitat_adob + 10 
FROM planta, dosi_adob, adob
WHERE planta.nom_cientific = dosi_adob.nom_planta
AND dosi_adob.nom_adob = adob.nom_adob
AND (adob.firma_comercial = 'PRISADOB' OR dosi_adob.quantitat_adob <= 30);

/* Exercici 3 */
SELECT DISTINCT planta.nom_popular
FROM planta
JOIN dosi_adob ON planta.nom_cientific = dosi_adob.nom_planta
JOIN adob ON adob.nom_adob = dosi_adob.nom_adob
WHERE adob.tipus_adob = 'AI'
AND floracio = 'Primavera'

/* Exercici 4 */
SELECT planta.nom_cientific, reproduccio.met_reproducc
FROM planta
JOIN reproduccio ON reproduccio.nom_planta = planta.nom_cientific
JOIN dosi_adob ON dosi_adob.nom_planta = reproduccio.nom_planta
WHERE dosi_adob.nom_adob != 'Casadob'

/* Exercici 5 */
SELECT DISTINCT planta.floracio
FROM planta 
JOIN exemplars_plantes ON exemplars_plantes.nom_planta = planta.nom_cientific

/* Exercici 6 */
SELECT planta.nom_popular, reproduccio.met_reproducc, LEFT(reproduccio.grau_exit, 1) AS Grau_exit
FROM planta
JOIN reproduccio ON reproduccio.nom_planta = planta.nom_cientific
WHERE reproduccio.grau_exit != 'Alt'

/* Exercici 7 */
SELECT DISTINCT planta.nom_popular
FROM planta
JOIN dosi_adob ON dosi_adob.nom_planta = planta.nom_cientific
WHERE dosi_adob.estacio = planta.floracio

/* Exercici 8 */
SELECT LOWER(planta.nom_cientific)
FROM planta
JOIN planta_exterior ON planta_exterior.nom_planta = planta.nom_cientific
JOIN dosi_adob ON dosi_adob.nom_planta = planta_exterior.nom_planta
JOIN adob ON adob.nom_adob = dosi_adob.nom_adob
WHERE adob.firma_comercial = 'CIRSADOB'
UNION
SELECT planta.nom_cientific
FROM planta
JOIN planta_interior ON planta_interior.nom_planta = planta.nom_cientific
JOIN reproduccio ON reproduccio.nom_planta = planta_interior.nom_planta
WHERE reproduccio.met_reproducc ='Capficats'

/* Exercici 9 */
SELECT DISTINCT UPPER(planta.nom_popular)
FROM planta
JOIN exemplars_plantes ON exemplars_plantes.nom_planta = planta.nom_cientific
JOIN dosi_adob ON dosi_adob.nom_planta = exemplars_plantes.nom_planta
JOIN adob ON adob.nom_adob = dosi_adob.nom_adob
WHERE tipus_adob = 'AI'

/* Exercici 10 */
SELECT DISTINCT LOWER(planta.nom_popular)
FROM planta
JOIN planta_exterior ON planta_exterior.nom_planta = planta.nom_cientific 
JOIN dosi_adob ON dosi_adob.nom_planta = planta_exterior.nom_planta
JOIN adob ON adob.nom_adob = dosi_adob.nom_adob
WHERE adob.firma_comercial = 'CIRSADOB'
UNION
SELECT DISTINCT LOWER(planta.nom_cientific)
FROM planta
JOIN planta_interior ON planta.nom_cientific = planta_interior.nom_planta
JOIN reproduccio ON planta_interior.nom_planta = reproduccio.nom_planta
WHERE reproduccio.met_reproducc = 'Capficats';
