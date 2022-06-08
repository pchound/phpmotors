INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword, clientLevel, comment)
VALUES ('Tony', 'Stark', 'tony@starknet', 'IamIronm@n', 1, 'I am the real Ironman');

UPDATE clients
SET clientLevel = 3
WHERE clientFirstname = 'Tony';

UPDATE inventory
SET invDescription = REPLACE(invDescription, 'small', 'spacious')
WHERE invId = 12;

SELECT 
	i.invModel
FROM inventory i;

DELETE FROM inventory
WHERE invId = 1;
	
SELECT i.invModel
FROM inventory i
INNER JOIN carclassification c
ON i.invModel = c.classificationName
WHERE i.invModel = 'SUV';

UPDATE inventory SET invImage = CONCAT("/phpmotors",invImage),
invThumbnail = CONCAT("/phpmotors",invThumbnail);

