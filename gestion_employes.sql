-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 30 nov. 2020 à 08:38
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_employes`
--

-- --------------------------------------------------------

--
-- Structure de la table `emp`
--

CREATE TABLE `emp` (
  `noemp` int(4) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `emploi` varchar(20) DEFAULT NULL,
  `sup` int(4) DEFAULT NULL,
  `embauche` date DEFAULT NULL,
  `sal` float(9,2) DEFAULT NULL,
  `comm` float(9,2) DEFAULT NULL,
  `noserv` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emp`
--

INSERT INTO `emp` (`noemp`, `nom`, `prenom`, `emploi`, `sup`, `embauche`, `sal`, `comm`, `noserv`) VALUES
(1000, 'LEROY', 'PAUL', 'PRESIDENT', NULL, '1988-12-12', 5500.00, NULL, 1),
(1100, 'DELPIERRE', 'DOROTHEE', 'SECRETAIRE', 1000, '1987-10-25', 12351.24, NULL, 1),
(1101, 'DUMONT', 'LOUIS', 'VENDEUR', 1300, '1987-10-25', 9047.90, 0.00, 1),
(1102, 'MINET', 'MARC', 'VENDEUR', 1300, '1987-10-25', 8085.81, 17230.00, 1),
(1104, 'NYS', 'ETIENNE', 'TECHNICIEN', 1200, '1987-10-25', 12342.23, NULL, 1),
(1105, 'DENIMAL', 'JEROME', 'COMPTABLE', 1600, '1987-10-25', 15746.57, NULL, 1),
(1200, 'LEMAIRE', 'GUY', 'DIRECTEUR', 1000, '1987-03-11', 36303.63, NULL, 2),
(1201, 'MARTIN', 'JEAN', 'TECHNICIEN', 1200, '1987-06-25', 11235.12, NULL, 2),
(1202, 'DUPONT', 'JACQUES', 'TECHNICIEN', 1200, '1988-10-30', 10313.03, NULL, 2),
(1300, 'LENOIR', 'GERARD', 'DIRECTEUR', 1000, '1987-04-02', 31353.14, 13071.00, 3),
(1301, 'GERARD', 'ROBERT', 'VENDEUR', 1300, '1999-04-16', 7694.77, 12430.00, 3),
(1303, 'MASURE', 'EMILE', 'TECHNICIEN', 1200, '1988-06-17', 10451.05, NULL, 3),
(1500, 'DUPONT', 'JEAN', 'DIRECTEUR', 1000, '1987-10-23', 28434.84, NULL, 5),
(1501, 'DUPIRE', 'PIERRE', 'ANALYSTE', 1500, '1984-10-24', 23102.31, NULL, 5),
(1502, 'DURAND', 'BERNARD', 'PROGRAMMEUR', 1500, '1987-07-30', 13201.32, NULL, 5),
(1503, 'DELNATTE', 'LUC', 'PUPITREUR', 1500, '1999-01-15', 8801.01, NULL, 5),
(1600, 'LAVARE', 'PAUL', 'DIRECTEUR', 1000, '1991-12-13', 31238.12, NULL, 6),
(1601, 'CARON', 'ALAIN', 'COMPTABLE', 1600, '1985-09-16', 33003.30, NULL, 6),
(1602, 'DUBOIS', 'JULES', 'VENDEUR', 1300, '1990-12-20', 9520.95, 35535.00, 6),
(1603, 'MOREL', 'ROBERT', 'COMPTABLE', 1600, '1985-07-18', 33003.30, NULL, 6),
(1604, 'HAVET', 'ALAIN', 'VENDEUR', 1300, '1991-01-01', 9388.94, 33415.00, 6),
(1605, 'RICHARD', 'JULES', 'COMPTABLE', 1600, '1985-10-22', 33503.35, NULL, 5),
(1615, 'DUPREZ', 'JEAN', 'BALAYEUR', 1000, '1998-10-22', 6000.60, NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `serv`
--

CREATE TABLE `serv` (
  `noserv` int(2) NOT NULL,
  `serv` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `serv`
--

INSERT INTO `serv` (`noserv`, `serv`, `ville`) VALUES
(1, 'DIRECTION', 'PARIS'),
(2, 'LOGISTIQUE', 'SECLIN'),
(3, 'VENTES', 'ROUBAIX'),
(4, 'FORMATION', 'VILLENEUVE D\'ASCQ'),
(5, 'INFORMATIQUE', 'LILLE'),
(6, 'COMPTABILITE', 'LILLE'),
(9, 'MAINTENANCE', 'LENS');

-- --------------------------------------------------------

--
-- Structure de la table `user_oop`
--

CREATE TABLE `user_oop` (
  `id` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_oop`
--

INSERT INTO `user_oop` (`id`, `email`, `mdp`, `profil`) VALUES
(6, 'blablo@gmoal.com', '$2y$10$IuEIy.79cCnVctMpOOcSL.i3GEYX0x6bqL5G/h/3s4yA6RtxCDKgO', 'utilisateur'),
(10, 'firto@ldko.com', '$2y$10$kJN9vuUbJfzsML6hUMp6zu/1w2LHHLdujESCMVcAeTo/QRqKgv5rS', 'utilisateur'),
(11, 'hduye', '$2y$10$WTRF6c2.lD.t8mJ054vPfOL.hsL/JlAiIwMvZ9oq1Ei2WOAzpzc7O', 'utilisateur'),
(12, 'bonjour@gmail.com', '$2y$10$cFdAY8M2D70Gt726wpsv/.nDDwI5vYTks5BwhxxMOFystY2csVGdW', 'utilisateur'),
(14, 'perrine.leguai@laposte.net', '$2y$10$LllKbGZJsujumhkVsOEca.M7ONrmacRJJZ/Qrp79fqaH0g8L1LLNO', 'utilisateur'),
(24, 'perrine.leguai@gmail.com', '$2y$10$C.212U3oPgbJ7BFcOFL4ce6ljRv/HdyQ8RywEZgmhLFJDcIuylXc.', 'utilisateur'),
(25, 'aruelien@connecte.coco', '$2y$10$tmM..CBM7CTHCFzN0WNzfeAP5D2mloMkkgrdpvcVefNN0bv4ESwje', 'utilisateur'),
(29, 'aruelien@connecte.co', '$2y$10$1xPxkpoqCHzsRKYEDHwtg.iSHlNDm/oV8jwdWEcGhGFptGVHqlF2K', 'utilisateur'),
(30, 'aruelien@help.com', '$2y$10$MPrN0UewVFQkSGqW26wdhe8ZG48zcmT8E6rpi7YkYNlcb3E5dd87O', 'utilisateur'),
(31, 'aurelien@help.fr', '$2y$10$Zl2dO13H25aHbLCYxKc5Se3.QeBH3Zad378MPYWu8ds.bSERJt.o6', 'utilisateur'),
(32, 'lagalere@ll.com', '$2y$10$ioXjSPS3vh2h8iB7ifWSteTpLLAojQ/8sxOV/sDY0QOJsQz3HE1PG', 'administrateur'),
(36, 'perrine@mail.com', '$2y$10$OXQOQR5zmHto4RBoe0bCoeW4SgQ1SwM6bwbnvFv5RRinKC0mbtx4i', 'utilisateur'),
(37, 'pl@mail.com', '$2y$10$G9b4.mpLOHTHQmdeoQGxRONR4n3rG4KFfEp/aUqbx.1iOzidTUIcG', 'utilisateur'),
(38, 'marion@marion.fr', '$2y$10$Y3Yfz3Pzq.jp6USnEX8d5eKnaC6bNP1tVEEPg1gfGHQD1fdham/ee', 'utilisateur'),
(39, 'mdp@1234.com', '$2y$10$X3YhD/LqoE.0IuWQwlD65.LOUArcy4B8n0vRibjXd.m3uERCtmTaO', 'utilisateur'),
(42, 'mdp@1235.com', '$2y$10$kmmKiwz2Y0RIgndZCPIX4OAN8r.3iiHY8l/MI3wie.xmzxYPtdjWe', 'utilisateur'),
(43, 'mdp@1236.com', '$2y$10$k6LEib/mnHdD89FY8ywQpub9wJUp8hJ9gg3AzdFxJocmEmEfYYBPu', 'utilisateur'),
(44, 'mdp@1237.com', '$2y$10$X5KWRLXAF9SMMjRSmJQB7e80ZAeO0Gl4DdHeilnuVWYxzuRVnYynG', 'utilisateur'),
(45, 'ruben@ruru.com', '$2y$10$OQ.CqYiy8PUuLEnmNiRZturFc8Pjp7e2J/ItLxAfa/0QNvuEJNwEe', 'utilisateur'),
(46, 'pp@pp.pp', '$2y$10$E/hzJ9AEb.aCJRJsyaJOMuA7upjknawtq6fcK.S47dAEeXKWFNa4q', 'administrateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`noemp`),
  ADD KEY `SECONDARY` (`noserv`);

--
-- Index pour la table `serv`
--
ALTER TABLE `serv`
  ADD PRIMARY KEY (`noserv`);

--
-- Index pour la table `user_oop`
--
ALTER TABLE `user_oop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user_oop`
--
ALTER TABLE `user_oop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
