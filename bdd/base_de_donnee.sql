-- Suppression de la base de données si elle existe
DROP DATABASE IF EXISTS tournois;

-- Création de la base de données
CREATE DATABASE tournois;
USE tournois;

-- Suppression des tables si elles existent déjà
DROP TABLE IF EXISTS matchs;
DROP TABLE IF EXISTS equipes;
DROP TABLE IF EXISTS championnats;

-- Création de la table championnats
CREATE TABLE championnats (
    id INT PRIMARY KEY AUTO_INCREMENT,
    niveau VARCHAR(20) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    saison VARCHAR(255) NOT NULL
);

-- Création de la table equipes
CREATE TABLE equipes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    url_logo VARCHAR(255) NOT NULL
);

-- Création de la table matchs avec la colonne championnat_id
CREATE TABLE matchs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    domicile INT NOT NULL,
    exterieur INT NOT NULL,
    dom_score INT NOT NULL,
    ext_score INT NOT NULL,
    championnat_id INT NOT NULL,
    FOREIGN KEY (domicile) REFERENCES equipes(id),
    FOREIGN KEY (exterieur) REFERENCES equipes(id),
    FOREIGN KEY (championnat_id) REFERENCES championnats(id)
);

-- Insertion de données dans la table championnats
INSERT INTO championnats (niveau, nom, saison) VALUES
('D1', 'Championnat National', '2023-2024'),
('D2', 'Championnat Régional', '2023-2024');

-- Insertion de données dans la table equipes avec des noms d'équipes réalistes
INSERT INTO equipes (nom, url_logo) VALUES
('Les Aigles de Bordeaux', 'medias/logo_aigles.png'),
('Lions de Marseille', 'medias/logo_lions.png'),
('Tigres de Lyon', 'medias/logo_tigres.png'),
('Dragons de Nantes', 'medias/logo_dragons.png'),
('Panthères de Toulouse', 'medias/logo_pantheres.png'),
('Requins de Nice', 'medias/logo_requins.png'),
('Phoenix de Lille', 'medias/logo_phoenix.png'),
('Hurricanes de Strasbourg', 'medias/logo_hurricanes.png'),
('Grizzlies de Grenoble', 'medias/logo_grizzlies.png'),
('Falcons de Montpellier', 'medias/logo_falcons.png'),
('Wolves de Rennes', 'medias/logo_wolves.png'),
('Pirates de Rouen', 'medias/logo_pirates.png');

-- Insertion de données dans la table matchs avec la colonne championnat_id
INSERT INTO matchs (domicile, exterieur, dom_score, ext_score, championnat_id) VALUES
(1, 2, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 1),
(1, 3, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 1),
(1, 4, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 1),
(1, 5, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 1),
(2, 6, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 1),
(2, 7, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 1),
(3, 8, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 1),
(3, 9, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 2),
(4, 10, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 2),
(4, 11, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 2),
(5, 12, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 2),
(6, 1, FLOOR(RAND() * 5), FLOOR(RAND() * 5), 2);
