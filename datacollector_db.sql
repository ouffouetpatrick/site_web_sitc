-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 25 Octobre 2022 à 09:16
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `datacollector_db`
--
CREATE DATABASE IF NOT EXISTS `datacollector_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `datacollector_db`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_art` int(100) NOT NULL AUTO_INCREMENT,
  `idrub_art` int(50) NOT NULL,
  `libelle_art` varchar(50) DEFAULT NULL,
  `contenu1_art` varchar(255) DEFAULT NULL,
  `contenu2_art` varchar(255) DEFAULT NULL,
  `contenu3_art` varchar(255) DEFAULT NULL,
  `texte_art` text,
  `description_art` text,
  `texte_lien_art` varchar(255) DEFAULT NULL,
  `image1_art` varchar(255) DEFAULT NULL,
  `image2_art` varchar(255) DEFAULT NULL,
  `image3_art` varchar(255) DEFAULT NULL,
  `image_lien_art` varchar(255) DEFAULT NULL,
  `empty1_art` text,
  `empty2_art` text,
  `empty3_art` varchar(255) DEFAULT NULL,
  `geler_art` int(1) NOT NULL,
  `dateusercreation_art` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduscreation_art` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_art`),
  KEY `geler_art` (`geler_art`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=55 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_art`, `idrub_art`, `libelle_art`, `contenu1_art`, `contenu2_art`, `contenu3_art`, `texte_art`, `description_art`, `texte_lien_art`, `image1_art`, `image2_art`, `image3_art`, `image_lien_art`, `empty1_art`, `empty2_art`, `empty3_art`, `geler_art`, `dateusercreation_art`, `iduscreation_art`) VALUES
(1, 1, 'Nous sommes Southern It Consulting', 'Expertise et conseils technologiques', 'En savoir plus', NULL, NULL, NULL, NULL, 'caroussel1.jpg', '', '', NULL, '', '0', '', 0, '0000-00-00 00:00:00', 1),
(2, 1, 'Nous sommes Southern It Consulting', 'Expertise et conseils technologiques', 'En savoir plus', NULL, NULL, NULL, NULL, 'caroussel2.jpg', '', '', NULL, '1', '0', '', 0, '2022-08-10 07:00:00', 1),
(3, 1, 'Nous sommes Southern It Consulting', 'Expertise et conseils technologiques', 'En savoir plus', NULL, NULL, '', NULL, 'caroussel3.jpg', '', '', NULL, '1', '0', '', 0, '2022-08-10 07:00:00', 1),
(4, 1, 'Notre mission', NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.                         Excepturi asperiores pariatur aspernatur, laboriosam vitae veniam officia? Iste odit,                         atque voluptatem distinctio facere commodi dolor, magni eos necessitatibus,                         voluptas quas sit nostrum? Excepturi, error! Quia, vitae? Ratione,                         ullam tempora atque quo voluptates delectus obcaecati officia                         officiis dignissimos nihil optio, architecto rem.                        ullam tempora atque quo voluptates delectus obcaecati officia                         officiis dignissimos nihil optio, architecto rem.', NULL, '', '', '', NULL, '1', '0', '', 0, '2022-08-10 07:00:00', 1),
(5, 1, 'Nos domaines de competences', 'Développement d''Application <br> web et mobile', 'En savoir plus', NULL, 'uil uil-desktop', NULL, NULL, '', '', '', '', '1', '0', '', 0, '2022-08-10 07:00:00', 1),
(6, 2, 'Qui sommes nous', 'Nous somme la transformation technologique', NULL, NULL, NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.                                 Voluptas quaerat quis totam reprehenderit laborum? Eligendi                                 nostrum adipisci non dolorum! Quos est fugiat delectus,                                 beatae maiores explicabo quia numquam ab illo ipsum asperiores                                 accusamus distinctio similique aperiam culpa itaque incidunt eveniet!', NULL, 'innov.jpg', '', '', NULL, '', '0', '', 0, '2022-08-10 07:00:00', 1),
(7, 3, 'Ils font confiance à nos services', '', '', '', '', '', '', 'partenaire1.jpg', '', '', '', '', '0', '', 0, '2022-08-10 07:00:00', 1),
(8, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'partenaire2.jpg', '', '', NULL, '', '0', '', 0, '2022-08-10 07:00:00', 1),
(9, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'partenaire3.jpg', '', '', NULL, '', '0', '', 0, '2022-08-10 07:00:00', 1),
(10, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'partenaire4.jpg', '', '', NULL, '', '0', '', 0, '2022-08-10 23:19:51', 1),
(11, 4, 'Nos realisations', 'Nous accompagnons aux mieux nos clients dans l''élaboration de leurs projets digitaux. <br>                    Voici une liste non exhaustive de nos réalisations.', 'Siénea', NULL, NULL, NULL, 'sienea', 'projet-sitc1.png', 'tel2.png', '', NULL, '', '0', '', 0, '2022-08-10 07:00:00', 1),
(12, 5, 'titreprojet', 'Nos projets', '', '', '', '', '', 'divider', '', '', '', '', '0', '', 0, '2022-08-10 07:00:00', 1),
(13, 5, 'projetagriculture', ' AGRICULTURE', '', '', '', ' Lorem ipsum dolor sit amet. Ab rerum voluptatem ut quidem\r\n                      modi sit eveniet illum ea autem laborum et recusandae\r\n                      voluptas. Id repellat debitis ea iste quod ut similique\r\n                      voluptatem id earum aperiam et velit minus!', '', 'agriculture.jpg', '', '', '', '1', '0', '', 0, '2022-08-10 07:00:00', 1),
(14, 5, 'projetfoncier', 'FONCIER', '', '', '', ' Lorem ipsum dolor sit amet. Ab rerum voluptatem ut quidem\r\n                      modi sit eveniet illum ea autem laborum et recusandae\r\n                      voluptas. Id repellat debitis ea iste quod ut similique\r\n                      voluptatem id earum aperiam et velit minus!', '', 'urbanistique_3.jpg', '', '', '', '1', '0', '', 0, '2022-08-10 07:00:00', 1),
(15, 5, 'projetinfra', 'INFRASTRUCTURES TECHNIQUES', '', '', '', ' Lorem ipsum dolor sit amet. Ab rerum voluptatem ut quidem\r\n                      modi sit eveniet illum ea autem laborum et recusandae\r\n                      voluptas. Id repellat debitis ea iste quod ut similique\r\n                      voluptatem id earum aperiam et velit minus!', '', 'MG_0192.jpg', '', '', '', '1', '0', '', 0, '2022-08-10 07:00:00', 1),
(16, 5, 'projetsocioeconomique', 'SOCIO-ECONOMIQUES', '', '', '', 'Lorem ipsum dolor sit amet. Ab rerum voluptatem ut quidem\r\n                      modi sit eveniet illum ea autem laborum et recusandae\r\n                      voluptas. Id repellat debitis ea iste quod ut similique\r\n                      voluptatem id earum aperiam et velit minus!', '', 'infrastructures-economique.jpg', '', '', '', '1', '0', '', 0, '2022-08-10 07:00:00', 1),
(17, 11, 'partenaire', '', '', '', '', '', '', 'logo_DGI.jpg', '', '', '', '', '0', '', 0, '2022-08-11 07:00:00', 1),
(18, 11, 'partenaire', '', '', '', '', '', '', 'CIE.jpg', '', '', '', '', '0', '', 0, '2022-08-11 07:00:00', 1),
(19, 11, 'partenaire', '', '', '', '', '', '', 'BNET.png', '', '', '', '', '0', '', 0, '2022-08-11 07:00:00', 1),
(20, 11, 'partenaire', '', '', '', '', '', '', 'LOGO_SITC.png', '', '', '', '', '0', '', 0, '2022-08-11 07:00:00', 1),
(21, 11, 'partenaire', '', '', '', '', '', '', 'AIPH.png', '', '', '', '', '0', '', 0, '2022-08-11 07:00:00', 1),
(22, 11, 'partenaire', '', '', '', '', '', '', 'MBPE.png', '', '', '', '', '0', '', 0, '2022-08-11 07:00:00', 1),
(23, 10, 'Contactez-nous', 'Contactez-nous en remplissant ce formulaire ou à travers nos coordonées ci-dessous', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '', '0', '', 0, '2022-08-11 07:00:00', 1),
(24, 6, 'AIPH', 'Association Inter-professionnelle de la filière palmier à huile (AIPH)', '', '', '', '<p class="text-justify">\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\n                            elit. Maecenas in pulvinar neque. Nulla finibus\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\n                            posuere sapien vitae lectus suscipit, et pulvinar\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\n                            convallis fringilla diam sed aliquam. Sed tempor\n                            iaculis massa faucibus feugiat. In fermentum\n                            facilisis massa.\n                          </p>\n                          <p class="text-justify">\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\n                            elit. Maecenas in pulvinar neque. Nulla finibus\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\n                            posuere sapien vitae lectus suscipit, et pulvinar\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\n                            convallis fringilla diam sed aliquam. Sed tempor\n                            iaculis massa faucibus feugiat. In fermentum\n                            facilisis massa.\n                          </p>\n                          <p class="text-justify">\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\n                            elit. Maecenas in pulvinar neque. Nulla finibus\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\n                            posuere sapien vitae lectus suscipit, et pulvinar\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\n                            convallis fringilla diam sed aliquam. Sed tempor\n                            iaculis massa faucibus feugiat. In fermentum\n                            facilisis massa.\n                          </p>', '', 'palmier_a_huile.jpg', '', '', '', NULL, '0', '', 0, '2022-08-12 07:00:00', 1),
(25, 7, 'CORIF', 'Comité d’Optimisation du Rendement de l’Impôt foncier (CORIF)', '', '', '', '<p class="text-justify">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                            elit. Maecenas in pulvinar neque. Nulla finibus\r\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\r\n                            posuere sapien vitae lectus suscipit, et pulvinar\r\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\r\n                            convallis fringilla diam sed aliquam. Sed tempor\r\n                            iaculis massa faucibus feugiat. In fermentum\r\n                            facilisis massa.\r\n                          </p>\r\n                          <p class="text-justify">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                            elit. Maecenas in pulvinar neque. Nulla finibus\r\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\r\n                            posuere sapien vitae lectus suscipit, et pulvinar\r\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\r\n                            convallis fringilla diam sed aliquam. Sed tempor\r\n                            iaculis massa faucibus feugiat. In fermentum\r\n                            facilisis massa.\r\n                          </p>\r\n                          <p class="text-justify">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                            elit. Maecenas in pulvinar neque. Nulla finibus\r\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\r\n                            posuere sapien vitae lectus suscipit, et pulvinar\r\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\r\n                            convallis fringilla diam sed aliquam. Sed tempor\r\n                            iaculis massa faucibus feugiat. In fermentum\r\n                            facilisis massa.\r\n                          </p>', '', 'foncier.jpg', '', '', '', NULL, '0', '', 0, '2022-08-11 07:00:00', 1),
(26, 8, 'CIE', ' Comité d’Optimisation du Rendement de l’Impôt\r\n                            foncier- Compagnie Ivoirienne d''Electricité\r\n                            (CORIF-CIE)', '', '', '', '<p class="text-justify">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                            elit. Maecenas in pulvinar neque. Nulla finibus\r\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\r\n                            posuere sapien vitae lectus suscipit, et pulvinar\r\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\r\n                            convallis fringilla diam sed aliquam. Sed tempor\r\n                            iaculis massa faucibus feugiat. In fermentum\r\n                            facilisis massa.\r\n                          </p>\r\n                          <p class="text-justify">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                            elit. Maecenas in pulvinar neque. Nulla finibus\r\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\r\n                            posuere sapien vitae lectus suscipit, et pulvinar\r\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\r\n                            convallis fringilla diam sed aliquam. Sed tempor\r\n                            iaculis massa faucibus feugiat. In fermentum\r\n                            facilisis massa.\r\n                          </p>\r\n                          <p class="text-justify">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                            elit. Maecenas in pulvinar neque. Nulla finibus\r\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\r\n                            posuere sapien vitae lectus suscipit, et pulvinar\r\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\r\n                            convallis fringilla diam sed aliquam. Sed tempor\r\n                            iaculis massa faucibus feugiat. In fermentum\r\n                            facilisis massa.\r\n                          </p>', '', 'courant.jpg', '', '', '', '', '0', '', 0, '2022-08-12 07:00:00', 1),
(27, 8, 'COM-PUB', 'Récensement des panneaux publicitaires (COM-PUB)', '', '', '', '<p class="text-justify">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                            elit. Maecenas in pulvinar neque. Nulla finibus\r\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\r\n                            posuere sapien vitae lectus suscipit, et pulvinar\r\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\r\n                            convallis fringilla diam sed aliquam. Sed tempor\r\n                            iaculis massa faucibus feugiat. In fermentum\r\n                            facilisis massa.\r\n                          </p>\r\n                          <p class="text-justify">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                            elit. Maecenas in pulvinar neque. Nulla finibus\r\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\r\n                            posuere sapien vitae lectus suscipit, et pulvinar\r\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\r\n                            convallis fringilla diam sed aliquam. Sed tempor\r\n                            iaculis massa faucibus feugiat. In fermentum\r\n                            facilisis massa.\r\n                          </p>\r\n                          <p class="text-justify">\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing\r\n                            elit. Maecenas in pulvinar neque. Nulla finibus\r\n                            lobortis pulvinar. Donec a consectetur nulla. Nulla\r\n                            posuere sapien vitae lectus suscipit, et pulvinar\r\n                            nisi tincidunt. Aliquam erat volutpat. Curabitur\r\n                            convallis fringilla diam sed aliquam. Sed tempor\r\n                            iaculis massa faucibus feugiat. In fermentum\r\n                            facilisis massa.\r\n                          </p>', '', 'pub1.png', '', '', '', '', '0', '', 0, '2022-08-12 07:00:00', 1),
(28, 9, 'BAFING', 'Système d’information géographique pour les                            infrastructures rurales de la région du bafing.                            (BAFING)', '', '', '', '<p class="text-justify">                            Lorem ipsum dolor sit amet, consectetur adipiscing                            elit. Maecenas in pulvinar neque. Nulla finibus                            lobortis pulvinar. Donec a consectetur nulla. Nulla                            posuere sapien vitae lectus suscipit, et pulvinar                            nisi tincidunt. Aliquam erat volutpat. Curabitur                            convallis fringilla diam sed aliquam. Sed tempor                            iaculis massa faucibus feugiat. In fermentum                            facilisis massa.                          </p>                          <p class="text-justify">                            Lorem ipsum dolor sit amet, consectetur adipiscing                            elit. Maecenas in pulvinar neque. Nulla finibus                            lobortis pulvinar. Donec a consectetur nulla. Nulla                            posuere sapien vitae lectus suscipit, et pulvinar                            nisi tincidunt. Aliquam erat volutpat. Curabitur                            convallis fringilla diam sed aliquam. Sed tempor                            iaculis massa faucibus feugiat. In fermentum                            facilisis massa.                          </p>                          <p class="text-justify">                            Lorem ipsum dolor sit amet, consectetur adipiscing                            elit. Maecenas in pulvinar neque. Nulla finibus                            lobortis pulvinar. Donec a consectetur nulla. Nulla                            posuere sapien vitae lectus suscipit, et pulvinar                            nisi tincidunt. Aliquam erat volutpat. Curabitur                            convallis fringilla diam sed aliquam. Sed tempor                            iaculis massa faucibus feugiat. In fermentum                            facilisis massa.                          </p>', '', 'bafing-image2.jpg', '', '', '', NULL, '0', '', 0, '2022-08-12 07:00:00', 1),
(29, 8, 'test test', 'azertyuioazertyuioazertyuio azertyuio azertyhujk azertyui ', 'azertyuio azertyuio azertyu azertyuj azertyuio sdfghj ', NULL, NULL, 'zertyghuijopqesfdcgfvhbjnkhgfdtsrq esrdtfyguhijlkbjvhcgdts(zdfhgjk treazertyuj opiuytrezaesdfghb iuytresqsdxfcgvhb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-28 00:19:05', 1),
(30, 1, NULL, 'Système d''information Géographique', 'En savoir plus', NULL, 'uil uil-map-marker', '', NULL, '', '', NULL, '', NULL, '0', NULL, 0, '2022-10-22 14:40:10', NULL),
(31, 1, NULL, 'Qualité logiciel Testing', 'En savoir plus', NULL, ' uil uil-search-alt', NULL, NULL, '', '', NULL, '', NULL, '0', NULL, 0, '2022-10-22 14:50:37', NULL),
(33, 1, 'test', 'test', 'test', NULL, NULL, NULL, NULL, 'partenaire1.jpg', '', NULL, NULL, NULL, '0', NULL, 0, '2022-10-22 14:55:19', NULL),
(35, 1, 'lorem', 'lorem2', 'lorem3', NULL, NULL, '', NULL, 'img-caroussel.jpg', '', NULL, NULL, NULL, '0', NULL, 1, '2022-10-22 15:05:36', NULL),
(36, 2, 'Notre Histoire', NULL, NULL, NULL, NULL, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. \r\n                        Non assumenda corporis veritatis similique eaque laudantium atque ullam architecto \r\n                        recusandae nemo earum in, qui blanditiis facilis, tenetur labore illum hic laboriosam.\r\n                        qui blanditiis facilis, tenetur labore illum hic laboriosam. qui blanditiis facilis, tenetur labore illum hic laboriosam.\r\n                        qui blanditiis facilis, tenetur labore illum hic laboriosam.\r\n                        qui blanditiis facilis, tenetur labore illum hic laboriosam.', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-22 19:22:49', 1),
(37, 3, 'Nos services', 'Nous mettons nos compétences et notre expertise à votre disposition', 'Développement d''Application', 'En savoir plus', NULL, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 'serviceapp', 'dev1.webp', '', '', NULL, '', '0', '', 0, '2022-10-23 21:39:56', 1),
(38, 3, NULL, NULL, 'Système d''Information Géographique', 'En savoir plus', NULL, 'This card has supporting text below as a natural lead-in to additional content.                                This card has supporting text below as a natural lead-in to additional content', 'servicesig', 'SIG.jpg', '', '', NULL, '', '0', '', 0, '2022-10-23 22:03:54', 1),
(39, 3, NULL, NULL, 'Qualité Logiciel', 'En savoir plus', NULL, 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.', 'serviceqa', 'Test-case.jpg', '', '', NULL, '', '0', '', 0, '2022-10-23 22:08:52', 1),
(40, 4, NULL, NULL, 'Site web ministère du budget', NULL, NULL, NULL, 'ministere', 'projet-sitc2.PNG', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-23 23:04:33', 1),
(41, 4, NULL, NULL, 'Site web data collector', NULL, NULL, NULL, 'dcweb', 'projet-sitc4.jpg', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-23 23:07:07', 1),
(42, 4, NULL, NULL, 'Matox', NULL, NULL, NULL, 'matox', 'projet-sitc2.PNG', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-23 23:09:45', 1),
(43, 4, NULL, NULL, 'Ubercare', NULL, NULL, NULL, 'ubercare', 'projet-sitc1.png', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-23 23:09:45', 1),
(44, 4, NULL, NULL, 'Application Data collector', NULL, NULL, NULL, 'dcmobile', 'projet-sitc2.PNG', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-23 23:11:29', 1),
(45, 4, 'Date du projet', 'Client', 'Lien du projet', '2022', NULL, 'Siénea', 'htpp/www', 'projet-sitc1.png', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:22:22', 1),
(46, 4, 'Le Client', NULL, NULL, NULL, NULL, '1Lorem ipsum dolor, sit amet consectetur adipisicing elit. \n                    Nisi voluptatem qui iusto voluptas aperiam. Unde accusamus quos, \n                    nostrum assumenda excepturi quas expedita consectetur amet \n                    enim optio voluptas. Doloremque aut \n                    velit numquam itaque illo natus consectetur, deserunt reprehenderit, \n                    eos cum explicabo.', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:29:06', 1),
(47, 4, 'Le Projet', NULL, NULL, NULL, NULL, '1Lorem ipsum dolor, sit amet consectetur adipisicing elit. \n                    Nisi voluptatem qui iusto voluptas aperiam. Unde accusamus quos, \n                    nostrum assumenda excepturi quas expedita consectetur amet \n                    enim optio voluptas. Doloremque aut \n                    velit numquam itaque illo natus consectetur, deserunt reprehenderit, \n                    eos cum explicabo. deserunt reprehenderit, \n                    eos cum explicabo.', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:29:06', 1),
(48, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'projet1.PNG', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:35:43', 1),
(49, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'projet-sitc3.jpg', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:35:43', 1),
(50, 4, 'Date du projet', 'Client', 'Lien du projet', '2022', NULL, 'Ministère du Budget et du portefeuille de l''Etat de Côte d''Ivoire', 'https://budget.gouv.ci', 'projet-sitc1.png', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:22:22', 1),
(51, 4, 'Le Client', NULL, NULL, NULL, NULL, '2Lorem ipsum dolor, sit amet consectetur adipisicing elit. \r\n                    Nisi voluptatem qui iusto voluptas aperiam. Unde accusamus quos, \r\n                    nostrum assumenda excepturi quas expedita consectetur amet \r\n                    enim optio voluptas. Doloremque aut \r\n                    velit numquam itaque illo natus consectetur, deserunt reprehenderit, \r\n                    eos cum explicabo.', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:29:06', 1),
(52, 4, 'Le Projet', NULL, NULL, NULL, NULL, '2Lorem ipsum dolor, sit amet consectetur adipisicing elit. \r\n                    Nisi voluptatem qui iusto voluptas aperiam. Unde accusamus quos, \r\n                    nostrum assumenda excepturi quas expedita consectetur amet \r\n                    enim optio voluptas. Doloremque aut \r\n                    velit numquam itaque illo natus consectetur, deserunt reprehenderit, \r\n                    eos cum explicabo. deserunt reprehenderit, \r\n                    eos cum explicabo.', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:29:06', 1),
(53, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'projet1.PNG', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:35:43', 1),
(54, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'projet-sitc3.jpg', NULL, NULL, NULL, NULL, '0', NULL, 0, '2022-10-24 10:35:43', 1);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pro` varchar(255) NOT NULL,
  `empty_1` varchar(100) NOT NULL,
  `empty_2` varchar(100) NOT NULL,
  `empty_3` varchar(100) NOT NULL,
  `geler_pro` int(11) NOT NULL,
  `datecreation_pro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idusrcreation_pro` int(11) NOT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id_pro`, `nom_pro`, `empty_1`, `empty_2`, `empty_3`, `geler_pro`, `datecreation_pro`, `idusrcreation_pro`) VALUES
(1, 'Administrateur', '', '', '', 0, '2022-10-21 10:09:05', 1),
(2, 'Moderateur', '', '', '', 0, '2022-10-21 10:09:05', 1);

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

CREATE TABLE IF NOT EXISTS `rubrique` (
  `id_rub` int(11) NOT NULL AUTO_INCREMENT,
  `idrub_rub` int(11) DEFAULT NULL,
  `libelle_rub` varchar(255) NOT NULL,
  `image_rub` varchar(100) DEFAULT NULL,
  `description_rub` text,
  `empty1_rub` text,
  `empty2_rub` text,
  `empty3_rub` text,
  `geler_rub` int(1) NOT NULL,
  `datecreation_rub` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idusrcreation_rub` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rub`),
  KEY `geler_rub` (`geler_rub`),
  KEY `idusrcreation_rub` (`idusrcreation_rub`),
  KEY `idrub_rub` (`idrub_rub`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `rubrique`
--

INSERT INTO `rubrique` (`id_rub`, `idrub_rub`, `libelle_rub`, `image_rub`, `description_rub`, `empty1_rub`, `empty2_rub`, `empty3_rub`, `geler_rub`, `datecreation_rub`, `idusrcreation_rub`) VALUES
(1, NULL, 'Accueil', NULL, NULL, NULL, NULL, NULL, 0, '2022-06-10 07:00:00', 1),
(2, NULL, 'A propos de nous', NULL, NULL, NULL, NULL, NULL, 0, '2022-06-10 07:00:00', 1),
(3, NULL, 'Nos services', NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 1),
(4, NULL, 'Nos réalisations', NULL, NULL, NULL, NULL, NULL, 0, '2022-06-10 07:00:00', 1),
(5, NULL, 'Projet', NULL, NULL, NULL, NULL, NULL, 0, '2022-06-10 07:00:00', 1),
(6, 5, 'Agriculture', 'app.jpg', 'Ken ipsum dolor sit amet. Ab rerum voluptatem ut quidem modi sit eveniet illum ea autem laborum et recusandae voluptas. Id repellat debitis ea iste quod ut similique voluptatem id earum aperiam et velit minus!', NULL, '0', NULL, 0, NULL, NULL),
(7, 5, 'Foncier', 'urbanistique_3.jpg', '  Lorem ipsum dolor sit amet. Ab rerum voluptatem ut quidem                      modi sit eveniet illum ea autem laborum et recusandae                      voluptas. Id repellat debitis ea iste quod ut similique                      voluptatem id earum aperiam et velit minus! ', NULL, '0', NULL, 0, NULL, NULL),
(8, 5, 'Infrastructures techniques', 'MG_0192.jpg', '  Lorem ipsum dolor sit amet. Ab rerum voluptatem ut quidem\n                      modi sit eveniet illum ea autem laborum et recusandae\n                      voluptas. Id repellat debitis ea iste quod ut similique\n                      voluptatem id earum aperiam et velit minus! ', NULL, '0', NULL, 0, '2022-08-10 07:00:00', 1),
(9, 5, 'Socio-economiques', 'infrastructures-economique.jpg', '  Lorem ipsum dolor sit amet. Ab rerum voluptatem ut quidem\n                      modi sit eveniet illum ea autem laborum et recusandae\n                      voluptas. Id repellat debitis ea iste quod ut similique\n                      voluptatem id earum aperiam et velit minus! ', NULL, '0', NULL, 0, '2022-08-10 07:00:00', 1),
(10, NULL, 'Nous contacter', NULL, NULL, NULL, NULL, NULL, 0, '2022-08-10 07:00:00', 1),
(11, NULL, 'partenaire', NULL, NULL, NULL, NULL, NULL, 0, '2022-08-11 07:00:00', 1),
(12, 5, 'ENERGIE', 'mobile-dev.jpg', 'lorem', NULL, '0', NULL, 0, '2022-08-16 07:00:00', 1),
(18, 5, 'ESSAI RUBRIQUE 1', '2_1.png', 'description description description', '1', NULL, NULL, 0, NULL, NULL),
(19, 5, 'ESSAI RUBRIQUE 1', '1_1.png', 'description description description', '1', NULL, NULL, 1, NULL, NULL),
(20, 5, 'ESSAI RUBRIQUE 1', 'CIE_1.jpg', 'description description description', '1', NULL, NULL, 1, NULL, NULL),
(21, 5, 'ESSAI RUBRIQUE 1', 'compteur-1_1.jpg', '	Lorem ipsum dolor sit amet. Ab rerum voluptatem ut quidem modi sit eveniet illum ea autem laborum et recusandae voluptas. Id repellat debitis ea iste quod ut similique voluptatem id earum aperiam et velit minus!', '1', NULL, NULL, 1, NULL, NULL),
(22, 5, 'ESSAI RUBRIQUE 1', 'contenu2.png', 'description description description', '1', NULL, NULL, 1, NULL, NULL),
(23, 5, 'ESSAI RUBRIQUE 1', 'contenu1.png', '	Lorem ipsum dolor sit amet. Ab rerum voluptatem ut quidem modi sit eveniet illum ea autem laborum et recusandae voluptas. Id repellat debitis ea iste quod ut similique voluptatem id earum aperiam et velit minus!', '1', NULL, NULL, 1, NULL, NULL),
(24, 5, 'ESSAI RUBRIQUE 1', 'contenu2_1.png', 'description description description', '1', NULL, NULL, 1, NULL, NULL),
(25, 5, 'test rubrique', '21-216766_free-vector-backgrounds-png-vector-clipart-psd-graphic_1.png', '<p>zertyuiopsdfghjklmdfghjk,;</p>', '1', NULL, NULL, 0, NULL, NULL),
(26, 5, 'Agriculture500', '', 'lorem', NULL, '0', NULL, 0, '2022-10-22 14:44:23', 1),
(27, 5, 'hffdhtyu', '', 'rtyrtuyt', NULL, '0', NULL, 0, '2022-10-24 14:20:03', 1),
(28, 5, 'LOREMLR', '', 'lorem', NULL, '0', NULL, 0, '2022-10-24 14:21:03', 1),
(29, 5, 'luui', '', '11111', NULL, '0', NULL, 0, '2022-10-24 14:24:24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_usr`
--

CREATE TABLE IF NOT EXISTS `utilisateur_usr` (
  `id_usr` int(11) NOT NULL AUTO_INCREMENT,
  `idusr_pro` int(11) NOT NULL,
  `nom_usr` varchar(100) NOT NULL,
  `prenom_usr` varchar(100) DEFAULT NULL,
  `pseudo_usr` varchar(100) DEFAULT NULL,
  `email_usr` varchar(100) DEFAULT NULL,
  `mot_passe_usr` varchar(100) DEFAULT NULL,
  `contact_usr` varchar(100) DEFAULT NULL,
  `empty1_usr` varchar(100) DEFAULT NULL,
  `empty2_usr` varchar(100) DEFAULT NULL,
  `empty3_usr` varchar(100) DEFAULT NULL,
  `geler_usr` int(11) NOT NULL,
  `date_creation_usr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idusrcreation_usr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateur_usr`
--

INSERT INTO `utilisateur_usr` (`id_usr`, `idusr_pro`, `nom_usr`, `prenom_usr`, `pseudo_usr`, `email_usr`, `mot_passe_usr`, `contact_usr`, `empty1_usr`, `empty2_usr`, `empty3_usr`, `geler_usr`, `date_creation_usr`, `idusrcreation_usr`) VALUES
(1, 1, 'timite', 'mariam', 'maria', 'maria@gmail.com', 'tim789@', NULL, NULL, NULL, NULL, 0, '2022-10-21 17:09:41', 1),
(2, 2, 'kouadio', 'mory', 'kouamo', 'morykouadio@gmail.com', 'kouame564', '0789631145', NULL, NULL, NULL, 0, '2022-10-21 17:09:54', 2),
(3, 1, 'ouffouet', 'patrick', 'patko', 'patrick@gmail.com', 'patko79@', '07797979', NULL, NULL, NULL, 0, '2022-10-21 17:09:49', 2),
(4, 0, '', NULL, 'utilisateur', NULL, 'sitc@2022', NULL, NULL, NULL, NULL, 0, '2022-09-20 23:04:57', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
