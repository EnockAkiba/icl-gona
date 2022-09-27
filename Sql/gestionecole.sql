-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 03 sep. 2022 à 10:45
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `Classe`
--

CREATE TABLE `Classe` (
  `IdCl` int(11) NOT NULL,
  `Designation` varchar(10) NOT NULL,
  `IdSect` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Classe`
--

INSERT INTO `Classe` (`IdCl`, `Designation`, `IdSect`) VALUES
(2, '2 CO', 1),
(4, '3 Scie', 3),
(22, '3 Bio', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Cours`
--

CREATE TABLE `Cours` (
  `IdCours` int(11) NOT NULL,
  `DesigCours` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Cours`
--

INSERT INTO `Cours` (`IdCours`, `DesigCours`) VALUES
(3, 'Anglais  '),
(1, 'Français'),
(4, 'Geographie '),
(8, 'info'),
(6, 'Informatique '),
(2, 'Latin-philo   '),
(5, 'Physique '),
(7, 'psychologie');

-- --------------------------------------------------------

--
-- Structure de la table `Eleve`
--

CREATE TABLE `Eleve` (
  `IdEleve` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `PostNom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Sexe` varchar(15) NOT NULL,
  `NomPere` varchar(70) NOT NULL,
  `NomMere` varchar(70) NOT NULL,
  `LieuNaiss` varchar(30) NOT NULL,
  `DateNaiss` date NOT NULL,
  `Adresse` varchar(70) NOT NULL,
  `NumResp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Eleve`
--

INSERT INTO `Eleve` (`IdEleve`, `Nom`, `PostNom`, `Prenom`, `Sexe`, `NomPere`, `NomMere`, `LieuNaiss`, `DateNaiss`, `Adresse`, `NumResp`) VALUES
(1, 'MWANVUA', 'MWAMINI', 'SARAH', 'M', 'MWANVUA', 'ANNA', 'BUKAVU', '2000-09-24', 'sarahm95@gmail.com', '0991535935'),
(2, 'INNOCENT', 'BARUNGU', 'JOSH', 'F', 'MWANVUA', 'ANNA', 'BUKAVU', '2000-09-24', 'sarahm95@gmail.com', '0991535935'),
(4, 'TOMATALA', 'vanda', 'abukar', 'M', 'kambili', 'kambili', 'kindu', '2022-08-18', 'nicksont99@gmail.com', '024445666'),
(7, 'TOMATALA', 'vanda', 'abukar', 'M', 'PAUL', 'PAUL', 'fgolhll\"Ã§\'85', '2022-08-19', 'nicksont99@gmail.com', '024445666'),
(8, 'lakix  ', 'kanus', 'abukar', 'M', 'kambili', 'kambili', 'fgolhll', '2022-08-19', 'nicksont99@gmail.com', '3733633'),
(9, 'paul', 'bebukya', 'espoir', 'M', 'bebukjya', 'adeline', 'goma', '2022-08-19', 'ndosho', '93308397383'),
(11, 'MWANVUA', 'mpangi', 'abukar', 'F', 'kambili', 'kambili', 'fgolhll\"Ã§\'85', '2022-08-19', 'ndosho', '024445666'),
(12, 'rose', 'NSIMIRE', 'rosette', 'F', 'nsus', 'sd', 'goma', '2022-08-19', 'katoyi', '9038384'),
(13, 'LANGE    ', 'DEBASE', 'Basile', 'M', 'WOTONO', 'WOTONO', 'Kinshasa', '2003-08-08', 'debase99@gmail.com', '977834381');

-- --------------------------------------------------------

--
-- Structure de la table `Evaluer`
--

CREATE TABLE `Evaluer` (
  `IdEvaluer` int(11) NOT NULL,
  `IdInscrip` varchar(20) DEFAULT NULL,
  `IdCours` int(11) DEFAULT NULL,
  `Periode` varchar(30) NOT NULL,
  `Cotes` float NOT NULL,
  `CoteMax` float NOT NULL,
  `DateEv` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Evaluer`
--

INSERT INTO `Evaluer` (`IdEvaluer`, `IdInscrip`, `IdCours`, `Periode`, `Cotes`, `CoteMax`, `DateEv`) VALUES
(1, 'E1', 1, '1', 12, 20, '2022-08-23 00:00:00'),
(2, 'E1', 2, '1', 13, 20, '2022-08-23 00:00:00'),
(3, 'E3', 7, '1', 20, 20, '2022-08-22 00:00:00'),
(4, 'E3', 2, '1', 12, 20, '2022-02-09 00:00:00'),
(5, 'E1', 4, '1', 20, 20, '2022-08-04 00:00:00'),
(6, 'E5', 1, '1', 20, 20, '2022-08-24 00:00:00'),
(7, 'E3', 2, '1', 20, 20, '2022-08-29 00:00:00'),
(8, 'E3', 2, '1', 20, 20, '2022-08-29 00:00:00'),
(9, 'E3', 1, '1', 11, 20, '2022-08-29 00:00:00'),
(10, 'E5', 4, '1', 22, 20, '2022-08-29 00:00:00'),
(11, 'E5', 4, '1', 12, 20, '2022-08-29 00:00:00'),
(12, 'E1', 5, '1', 12, 20, '2022-08-23 00:00:00'),
(13, 'E1', 7, '1', 13, 20, '2022-08-23 00:00:00'),
(14, 'E3', 3, '1', 12, 20, '2022-02-09 00:00:00'),
(15, 'E1', 6, '1', 20, 20, '2022-08-04 00:00:00'),
(16, 'E5', 5, '2', 20, 20, '2022-02-09 00:00:00'),
(17, 'E3', 5, '1', 20, 20, '2022-08-29 00:00:00'),
(18, 'E3', 7, '1', 20, 20, '2022-08-29 00:00:00'),
(19, 'E3', 6, '1', 11, 20, '2022-08-29 00:00:00'),
(20, 'E5', 5, '1', 22, 20, '2022-08-29 00:00:00'),
(21, 'E5', 6, '1', 12, 20, '2022-08-29 00:00:00'),
(22, 'E3', 2, '1', 20, 20, '2022-08-22 00:00:00'),
(24, 'E1', 7, '1', 10, 20, '2022-02-09 00:00:00'),
(25, 'E2', 3, '3', 12, 20, '2022-09-02 00:00:00'),
(26, 'E3', 3, '2', 12, 20, '2022-09-02 00:00:00'),
(27, 'E3', 3, '3', 12, 20, '2022-09-02 00:00:00'),
(28, 'E3', 3, '4', 1, 20, '2022-03-09 00:00:00'),
(29, 'E1', 4, '2', 17, 20, '2022-09-02 00:00:00'),
(34, '11', 3, '1', 20, 20, '2022-03-09 00:00:00'),
(35, '11', 3, '2', 20, 20, '2022-03-09 00:00:00'),
(36, '11', 3, '3', 20, 20, '2022-03-09 00:00:00'),
(37, '11', 3, '4', 20, 20, '2022-03-09 00:00:00'),
(38, '11', 1, '1', 20, 20, '2022-03-09 00:00:00'),
(39, '11', 1, '2', 20, 20, '2022-03-09 00:00:00'),
(40, '11', 1, '3', 20, 20, '2022-03-09 00:00:00'),
(41, '11', 1, '4', 19, 20, '2022-09-03 00:00:00'),
(42, '11', 4, '1', 20, 20, '2022-03-09 00:00:00'),
(43, '11', 4, '2', 20, 20, '2022-03-09 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Inscrire`
--

CREATE TABLE `Inscrire` (
  `IdInscrip` varchar(20) NOT NULL,
  `IdEl` int(11) DEFAULT NULL,
  `IdCl` int(11) DEFAULT NULL,
  `DateInscrip` datetime NOT NULL,
  `AnneeInscrip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Inscrire`
--

INSERT INTO `Inscrire` (`IdInscrip`, `IdEl`, `IdCl`, `DateInscrip`, `AnneeInscrip`) VALUES
('11', 9, 22, '2022-09-02 02:22:00', '2022'),
('E1', 1, 2, '2022-08-19 12:57:00', '2022'),
('E10', 13, 22, '2022-09-03 00:00:00', '2022'),
('E2', 2, 4, '2022-08-19 13:50:00', '2022'),
('E3', 7, 2, '2021-08-19 13:03:00', '2022'),
('E5', 1, 4, '2022-09-03 00:00:00', '2022'),
('E6', 2, 4, '2022-09-03 00:00:00', '2022'),
('E8', 11, 4, '2022-09-03 00:00:00', '2022'),
('E9', 1, 22, '2022-09-01 00:00:00', '2022');

-- --------------------------------------------------------

--
-- Structure de la table `Paiement`
--

CREATE TABLE `Paiement` (
  `IdPaie` int(11) NOT NULL,
  `IdInscrip` varchar(20) NOT NULL,
  `MontChiff` float NOT NULL,
  `MontLett` varchar(100) NOT NULL,
  `MotifPaie` varchar(70) NOT NULL,
  `DatePaie` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Paiement`
--

INSERT INTO `Paiement` (`IdPaie`, `IdInscrip`, `MontChiff`, `MontLett`, `MotifPaie`, `DatePaie`) VALUES
(2, 'E3', 10, 'SEPT DOLLAR', 'frais scolaoire', '2022-09-02 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Section`
--

CREATE TABLE `Section` (
  `IdSection` int(11) NOT NULL,
  `Designation` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Section`
--

INSERT INTO `Section` (`IdSection`, `Designation`) VALUES
(1, 'Pedagogie   '),
(3, 'Commerciale');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idutilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `motdepasse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `nom_utilisateur`, `motdepasse`) VALUES
(1, 'akiba', '129e8435ff9db3ef6643e475c0df1ed1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Classe`
--
ALTER TABLE `Classe`
  ADD PRIMARY KEY (`IdCl`),
  ADD KEY `FKopt` (`IdSect`);

--
-- Index pour la table `Cours`
--
ALTER TABLE `Cours`
  ADD PRIMARY KEY (`IdCours`),
  ADD UNIQUE KEY `DesigCours` (`DesigCours`);

--
-- Index pour la table `Eleve`
--
ALTER TABLE `Eleve`
  ADD PRIMARY KEY (`IdEleve`);

--
-- Index pour la table `Evaluer`
--
ALTER TABLE `Evaluer`
  ADD PRIMARY KEY (`IdEvaluer`),
  ADD KEY `FKiDiNS1` (`IdInscrip`),
  ADD KEY `FKiCours` (`IdCours`);

--
-- Index pour la table `Inscrire`
--
ALTER TABLE `Inscrire`
  ADD PRIMARY KEY (`IdInscrip`),
  ADD KEY `FKEleve` (`IdEl`),
  ADD KEY `FKClass` (`IdCl`);

--
-- Index pour la table `Paiement`
--
ALTER TABLE `Paiement`
  ADD PRIMARY KEY (`IdPaie`),
  ADD KEY `fkpaiement` (`IdInscrip`);

--
-- Index pour la table `Section`
--
ALTER TABLE `Section`
  ADD PRIMARY KEY (`IdSection`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idutilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Classe`
--
ALTER TABLE `Classe`
  MODIFY `IdCl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `Cours`
--
ALTER TABLE `Cours`
  MODIFY `IdCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Eleve`
--
ALTER TABLE `Eleve`
  MODIFY `IdEleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `Evaluer`
--
ALTER TABLE `Evaluer`
  MODIFY `IdEvaluer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `Paiement`
--
ALTER TABLE `Paiement`
  MODIFY `IdPaie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Section`
--
ALTER TABLE `Section`
  MODIFY `IdSection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Classe`
--
ALTER TABLE `Classe`
  ADD CONSTRAINT `FKopt` FOREIGN KEY (`IdSect`) REFERENCES `Section` (`IdSection`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Evaluer`
--
ALTER TABLE `Evaluer`
  ADD CONSTRAINT `FKiCours` FOREIGN KEY (`IdCours`) REFERENCES `Cours` (`IdCours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKiDiNS1` FOREIGN KEY (`IdInscrip`) REFERENCES `Inscrire` (`IdInscrip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Inscrire`
--
ALTER TABLE `Inscrire`
  ADD CONSTRAINT `FKClass` FOREIGN KEY (`IdCl`) REFERENCES `Classe` (`IdCl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKEleve` FOREIGN KEY (`IdEl`) REFERENCES `Eleve` (`IdEleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Paiement`
--
ALTER TABLE `Paiement`
  ADD CONSTRAINT `fkpaiement` FOREIGN KEY (`IdInscrip`) REFERENCES `Inscrire` (`IdInscrip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
