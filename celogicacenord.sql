-- phpMyAdmin SQL Dump
-- version OVH
-- http://www.phpmyadmin.net
--
-- Client: mysql51-57.perso
-- Généré le : Ven 30 Août 2013 à 12:32
-- Version du serveur: 5.1.49
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `celogicacenord`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` varchar(6) NOT NULL,
  `client` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `state` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `client`, `date`, `state`) VALUES
('XYGONI', 'olivier.duhart@gmail.com', '2012-10-13 18:31:05', 'SAVED'),
('MEHORI', 'olivier.duhart@gmail.com', '2012-10-13 18:33:37', 'SAVED'),
('VYBUXU', 'olivier.duhart@gmail.com', '2012-10-13 18:36:29', 'SAVED'),
('NUDECE', 'olivier.duhart@gmail.com', '2012-10-13 18:38:01', 'SAVED'),
('GOFUNY', 'olivier.duhart@gmail.com', '2013-03-01 15:15:51', 'SAVED'),
('TIBASO', 'olivier.duhart@gmail.com', '2013-03-21 13:15:45', 'SAVED');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` varchar(40) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `rank` tinyint(3) unsigned DEFAULT '0',
  `active` tinyint(3) unsigned DEFAULT '1',
  `annonce` text,
  `content` text,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `description`, `rank`, `active`, `annonce`, `content`, `updated`) VALUES
('billetterie', 'billetterie', 3, 0, NULL, NULL, '2012-11-03 17:20:28'),
('disneyland_paris_a_prix_reduits', 'Disneyland Paris Ã  prix rÃ©duits', 8, 1, NULL, NULL, '2013-03-08 11:55:21'),
('ete_2013_-_groupe_pierre_et_vacances', 'EtÃ© 2013 - Groupe Pierre et Vacances', 9, 1, NULL, NULL, '2013-03-11 11:53:12'),
('le_nouveau_site_de_votre_ce_est_en_ligne', 'Le nouveau site de votre CE est en ligne', 1, 0, NULL, NULL, '2012-07-18 21:23:14'),
('noel_2012', 'NOEL 2012', 2, 0, NULL, NULL, '2012-08-03 12:09:37'),
('noel_2013', 'NoÃ«l 2013', 11, 1, NULL, NULL, '2013-07-27 08:07:03'),
('ouverture_des_dossiers_ancv_2014', 'Ouverture des dossiers ANCV 2014', 10, 1, NULL, NULL, '2013-06-25 15:09:32'),
('parc_asterix_a_prix_reduit', 'Parc AstÃ©rix Ã  prix rÃ©duit', 7, 1, NULL, NULL, '2013-03-07 15:35:41'),
('reductions_optical_center', 'RÃ©ductions Optical Center', 6, 1, NULL, NULL, '2013-02-28 16:04:26'),
('stars80_au_grand_stade_lille_metropole', 'Stars80 au Grand Stade Lille MÃ©tropole', 5, 1, NULL, NULL, '2013-02-28 15:50:11');

-- --------------------------------------------------------

--
-- Structure de la table `lignedecommande`
--

CREATE TABLE IF NOT EXISTS `lignedecommande` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idCommande` varchar(6) NOT NULL,
  `idItem` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=247 ;

--
-- Contenu de la table `lignedecommande`
--

INSERT INTO `lignedecommande` (`id`, `idCommande`, `idItem`, `quantity`) VALUES
(231, 'XYGONI', 2024, 4586),
(232, 'MEHORI', 2023, 5),
(233, 'MEHORI', 2024, 5),
(234, 'MEHORI', 2026, 5),
(235, 'MEHORI', 2027, 5),
(236, 'MEHORI', 2031, 5),
(237, 'VYBUXU', 2024, 4586),
(238, 'NUDECE', 2023, 5),
(239, 'NUDECE', 2024, 5),
(240, 'NUDECE', 2026, 5),
(241, 'NUDECE', 2027, 5),
(242, 'NUDECE', 2031, 5),
(243, 'GOFUNY', 2020, 15),
(244, 'GOFUNY', 1968, 2),
(245, 'TIBASO', 2023, 458),
(246, 'TIBASO', 2024, 457);

-- --------------------------------------------------------

--
-- Structure de la table `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `filecontent` varchar(100) DEFAULT NULL,
  `parent` varchar(150) DEFAULT NULL,
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `expires` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text,
  `keywords` text NOT NULL,
  `mobile` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `node` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `map`
--

INSERT INTO `map` (`id`, `description`, `filecontent`, `parent`, `depth`, `rank`, `expires`, `content`, `keywords`, `mobile`, `node`, `active`) VALUES
('actobi', 'ACTOBI', 'actobi.html', 'sport_et_detente', 2, 0, '0000-00-00 00:00:00', '﻿<p>                                      <img width="229" height="78" src="http://cenord.free.fr/cmsmadesimple/uploads/images/actobi.jpg" alt=""/></p>\r\n<p>ACTOBI c''est le nom de l''oganisme qui nous propose des chèques sport et détente  d''une valeur de 6 euros et que le CE vous vend à 5 euros.</p>\r\n<p>Comment cela fonctionne ? Vous achetez des chèques  et vous vous en servez pour payer vos différentes activités chez les  partenaires dont vous trouverez la lliste et les tarifs ici :</p>\r\n<p><a href="http://cenord.free.fr/cmsmadesimple/uploads/file/Actobi sept 2009.pdf">cenord.free.fr/cmsmadesimple/uploads/file/Actobi sept 2009.pdf</a></p>\r\n\r\n<p>Plus de 150 clubs de sports, loisirs et détente. Il y en a pour tous les goûts !</p>\r\n<p>Pour commander des chéques sports appeler votre CE ou envoyez un mail !</p>\r\n<p>Pour en savoir plus : <a href="http://www.actobi.com">www.actobi.com</a></p>', '', 1, 0, 1),
('association_apace', 'Association APACE ', 'apace.html', 'sorties_voyages_et_sejours', 2, 0, '0000-00-00 00:00:00', '<p>Le CE fait appel au partenaire A.P.A.C.E. pour vous fournir des sorties &agrave; tarifs pr&eacute;f&eacute;rentiels, vous pouvez donc&nbsp;&nbsp;b&eacute;n&eacute;ficier de leurs offres.</p>\r\n<p><strong>Attention</strong>, pour commander, veuillez nous contacter car le CE partcipe financi&egrave;rement aux sorties. Le CE vous communiquera alors le tarif propos&eacute;.</p>\r\n<p>A.P.A.C.E est aussi un agent de voyages, il peut vous proposer des s&eacute;jours et circuits&nbsp;&agrave; des prix r&eacute;duits (en moyenne -5%).</p>\r\n<p><img src="media/apace.jpg" alt="" /></p>\r\n<p>Pour une information toujours &agrave; jour et compl&egrave;te, vous pouvez consulter leur site : <a href="http://www.apaceloisirs.com/"><font color="#0000ff">www.apaceloisirs.com</font></a>&nbsp; .</p>\r\n<p>D''autres s&eacute;jours, d''autres possibilit&eacute;s de d&eacute;tente voir la suite sur notre site</p>', '', 1, 0, 1),
('autres', 'Autres', 'autres.html', 'les_offres', 1, 4, '0000-00-00 00:00:00', '<p>Tout ce qui n''est pas culture, sport, voyages.</p>', '', 1, 0, 0),
('billeterie', 'Billetterie', 'billetterie.html', 'culture', 2, 0, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('cheques_vacances', 'ChÃ¨ques vacances', 'chequeVacance.html', 'les_offres', 1, 3, '0000-00-00 00:00:00', '<p>Cette ann&eacute;e le CE vous propose de commander des ch&eacute;ques vacances qui seront d&eacute;livr&eacute;s en juin&nbsp;2012 apr&eacute;s une &eacute;pargne&nbsp;pendant 10 mois en 2011.</p>\r\n<p>Les principes d''abondements sont les suivants :</p>\r\n<p>\r\n<table width="523" cellspacing="0" cellpadding="0" border="0" style="width: 393pt; border-collapse: collapse">\r\n    <colgroup><col width="80" style="width: 60pt"></col><col width="89" style="width: 67pt"></col><col width="109" style="width: 82pt"></col><col width="116" style="width: 87pt"></col><col width="129" style="width: 97pt"></col></colgroup>\r\n    <tbody>\r\n        <tr height="48" style="height: 36pt">\r\n            <td width="80" height="48" style="border-bottom: windowtext 0.5pt solid; border-left: windowtext 0.5pt solid; background-color: transparent; width: 60pt; height: 36pt; border-top: windowtext 0.5pt solid; border-right: windowtext 0.5pt solid"><strong><font size="2">Coefficient</font></strong></td>\r\n            <td width="89" style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; width: 67pt; border-top: windowtext 0.5pt solid; border-right: windowtext 0.5pt solid"><strong><font size="2">10 pr&eacute;l&eacute;vements de&nbsp;</font></strong></td>\r\n            <td width="109" style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; width: 82pt; border-top: windowtext 0.5pt solid; border-right: windowtext 0.5pt solid"><strong><font size="2">Epargne totale personnelle</font></strong></td>\r\n            <td width="116" style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; width: 87pt; border-top: windowtext 0.5pt solid; border-right: windowtext 0.5pt solid"><strong><font size="2">Abondement CE en fin d''&eacute;pargne (mai 2012)</font></strong></td>\r\n            <td width="129" style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; width: 97pt; border-top: windowtext 0.5pt solid; border-right: windowtext 0.5pt solid"><strong><font size="2">Montant total ch&egrave;ques vacances d&eacute;livr&eacute;s en juin 2012</font></strong></td>\r\n        </tr>\r\n        <tr height="24" style="height: 18pt">\r\n            <td height="24" style="border-bottom: windowtext 0.5pt solid; border-left: windowtext 0.5pt solid; background-color: transparent; height: 18pt; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">ETAM et 95</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">15 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">150 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">80 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">230 &euro;</font></td>\r\n        </tr>\r\n        <tr height="24" style="height: 18pt">\r\n            <td height="24" style="border-bottom: windowtext 0.5pt solid; border-left: windowtext 0.5pt solid; background-color: transparent; height: 18pt; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">&gt; 95 &agrave; 120</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">20 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">200 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">70 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">270 &euro;</font></td>\r\n        </tr>\r\n        <tr height="24" style="height: 18pt">\r\n            <td height="24" style="border-bottom: windowtext 0.5pt solid; border-left: windowtext 0.5pt solid; background-color: transparent; height: 18pt; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">&gt;120 &agrave; 170</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">25 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">250 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">60 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">310 &euro;</font></td>\r\n        </tr>\r\n        <tr height="24" style="height: 18pt">\r\n            <td height="24" style="border-bottom: windowtext 0.5pt solid; border-left: windowtext 0.5pt solid; background-color: transparent; height: 18pt; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">+ 170</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">30 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">300 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">50 &euro;</font></td>\r\n            <td style="border-bottom: windowtext 0.5pt solid; border-left: windowtext; background-color: transparent; border-top: windowtext; border-right: windowtext 0.5pt solid"><font size="2">350 &euro;</font></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>\r\n<p>&nbsp;</p>\r\n<p>Vous pouvez t&eacute;l&eacute;charger les formulaires ici :</p>\r\n<p><strong><em><u><a href="media/1 Notice.doc">Notice&nbsp;</a></u></em></strong>&nbsp;&nbsp;&nbsp; (&agrave; observer scrupuleusement)</p>\r\n<p><strong><em><u><a href="media/6 autorisation prelevement.pdf">Autorisation de pr&eacute;l&eacute;vement&nbsp;&nbsp;</a></u></em></strong></p>\r\n<p><u><em><strong><a href="media/2 ANCV ETAM &amp; 95.doc">Coefficient agent de maitrise + cadre 95 : </a></strong></em></u></p>\r\n<p><strong><em><u><a href="media/3 ANCV  95  120.doc">Coefficient &gt; 95 et &gt;= 120 :</a>&nbsp; </u></em></strong></p>\r\n<p><strong><em><u><a href="media/4 ANCV  120  170.doc">Coefficient &gt; 120 et &lt; 170 :&nbsp; &nbsp;</a></u></em></strong></p>\r\n<p><strong><em><u><a href="media/5 ANCV  170.doc">Coeffcient = et &gt;&nbsp;170 : </a></u></em></strong></p>\r\n<p>Merci de les transmettre au CE nord, n''h&eacute;sitez pas &agrave; vous renseigner aupr&eacute;s des membres du CE.</p>\r\n<p>&nbsp;</p>', '', 1, 0, 1),
('culture', 'Culture', NULL, 'les_offres', 1, 5, '0000-00-00 00:00:00', NULL, '', 1, 1, 1),
('disneyland_paris_a_prix_reduits', 'Disneyland Paris Ã  prix rÃ©duits', NULL, 'events', 1, 0, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('ete_2013_-_groupe_pierre_et_vacances', 'EtÃ© 2013 - Groupe Pierre et Vacances', NULL, 'events', 1, 0, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('evenements_familiaux', 'EvÃ©nements familiaux', 'familyEvents.html', 'participation_du_ce', 1, 0, '0000-00-00 00:00:00', '﻿<h2>Evénements familiaux</h2>\r\n         <p>Mariage, naissances  ?  Félicitations !</p>\r\n<p><img width="77" height="88" src="media/alliances.jpg" alt="" style="width: 77px; height: 60px;"/>                          <img width="77" height="70" src="media/bebe_155.jpg" alt=""/></p>\r\n<p>Vous aimez les cadeaux ? N''oubliez pas le CE dans la liste des personnes à prévenir de votre PACS, mariage ou de la naissance de votre petit dernier. Nous nous ferons une joie de vous envoyer un bon d''achat pour fêter l''évènement !</p>\r\n<p>Pour cela, nous vous remercions de nous fournir un justificatif officiel (extrait de mariage ou de naissance, photocopie du livret de famille) et de prévoir un certain délai pour la réception du bon d''achat.</p>\r\n<p> </p>\r\n\r\n<p>PS : En cas de mariage aprés un PACS, il n''y aura pas de BA en double !!</p>', '', 1, 0, 1),
('events', 'EvÃ©nements', '', '', 0, 2, '0000-00-00 00:00:00', '', '', 1, 1, 1),
('futuroscope', 'Futuroscope', NULL, 'sorties_voyages_et_sejours', 2, 3, '0000-00-00 00:00:00', NULL, '', 1, 0, 0),
('home', 'Accueil', 'home.php', '', 0, 0, '0000-00-00 00:00:00', '&nbsp;', '', 0, 0, 1),
('infos_pratiques', 'Infos pratiques', 'infos.html', '', 0, 5, '0000-00-00 00:00:00', '<p>&nbsp;</p>\r\n<h2>Info pratiques</h2>\r\n<p>&nbsp;</p>\r\n<p><strong>Dans cette rubrique, vous trouverez en vrac des informations sur le fonctionnement de votre CE.</strong></p>\r\n<p><span style="text-decoration: underline;"><span style="color: #ff0000;">Justificatifs pour b&eacute;n&eacute;ficier remboursement spectacle</span></span> : Billet original (justificatifs de paiement ne sont pas valides)</p>\r\n<p><span style="text-decoration: underline;"><span style="color: #ff0000;">Justificatifs pour b&eacute;n&eacute;ficier remboursement club de sport</span></span> : Facture ou attestation dat&eacute;e, tamponn&eacute;e du club avec le nom du b&eacute;n&eacute;ficiaire et le montant.</p>\r\n<p><span style="color: #ff0000;"><span style="text-decoration: underline;">Carte CE</span></span> : Vous pouvez obtenir, pour vous ou vous ayant-droit, des cartes d''identit&eacute; CE en faisant une demande par mail &agrave; <a href="mailto:ce-nrd@logica.com">ce-nrd@logica.com</a> (n''oubliez pas d''envoyer une photo d''identit&eacute; format jpg). Celle-ci peut &ecirc;tre utils&eacute;e pour obtenir des remises chez certains commer&ccedil;ants. N''h&eacute;sitez pas &agrave; vous renseigner.</p>\r\n<p><span style="color: #ff0000;"><span style="text-decoration: underline;">Ev&eacute;nements familiaux</span></span> : Fournir un acte officiel.</p>\r\n<p>&nbsp;</p>\r\n<p><a href="tel://0362599343">03.62.59.93.43</a></p>', '', 1, 0, 1),
('les_moyens_du_ce', 'Les moyens du CE', 'moyens.html', 'votre_ce', 1, 2, '0000-00-00 00:00:00', '﻿<h2>Les moyens du CE</h2>\r\n         <div style="border-width: 1.5pt medium medium; border-style: solid none none; border-color: windowtext -moz-use-text-color -moz-use-text-color; padding: 5pt 0cm 0cm;">\r\n<div><a name="_Toc154399249"><font size="2" face="Arial">LES MOYENS MIS A DISPOSITION DE VOTRE CE.</font></a></div>\r\n</div>\r\n<div><font size="2" face="Arial"> </font></div>\r\n<div style="margin-left: 0cm;"><strong><a name="_Toc154399250"><span style="font-size: 11pt;"><font size="2" face="Arial">Le crédit d’heures.</font></span></a><span style="font-size: 11pt;"><font size="2" face="Arial"> </font></span></strong></div>\r\n\r\n<p style="margin-top: 6pt;"><span style="font-size: 11pt;"><font size="2" face="Arial">Afin d’accomplir leur mission, les membres titulaires du CE disposent d’un crédit de 20 heures par mois qui n’est pas amputé du temps passé à la réunion plénière mensuelle. Le temps de délégation est considéré comme du travail effectif et, par conséquent, payé comme tel.</font></span></p>\r\n<p style="margin-top: 6pt;"><span style="font-size: 11pt;"><font size="2" face="Arial">Les suppléants, eux, disposent de 10% des heures totales déléguées aux titulaires. Celles-ci sont à se partager entre les différents suppléants. Pour Nord il s’agit donc de 10 heures par mois.</font></span></p>\r\n<div style="margin-top: 6pt;"><font size="2" face="Arial"> </font></div>\r\n<div style="margin-left: 0cm;"><strong><a name="_Toc154399251"><span style="font-size: 11pt;"><font size="2" face="Arial">Les budgets.</font></span></a><span style="font-size: 11pt;"><font size="2" face="Arial"> </font></span></strong></div>\r\n<div><font size="2" face="Arial"> </font></div>\r\n<div style="text-indent: -35.45pt; margin-left: 35.45pt;"><strong><a name="_Toc417446394"><span><span><span><span><span><span><span><span><font size="2" face="Arial">* Le budget de fonctionnement</font></span></span></span></span></span></span></span></span></a><span><span><font size="2" face="Arial">.</font></span></span></strong></div>\r\n<p style="margin-top: 6pt;"><span style="font-size: 11pt;"><font size="2" face="Arial">La subvention de fonctionnement, versée au cours de l’année sous forme d’acomptes, doit assurer, comme son nom l’indique, les moyens de fonctionnement administratif du comité (papeterie, documentation, personnel, courrier, photocopies, objets publicitaires....). Le montant annuel de cette subvention fixée par le code du travail représente 0,2% de la masse salariale brute de l’année en cours.</font></span></p>\r\n<div><font size="2" face="Arial"> </font></div>\r\n\r\n<div style="text-indent: -35.45pt; margin-left: 35.45pt;"><strong><font size="2" face="Arial"><a name="_Toc154399253">* Le budget social.</a></font></strong></div>\r\n<p style="margin-top: 6pt;"><span style="font-size: 11pt;"><font size="2" face="Arial">Pour assurer le financement des activités sociales et culturelles qu’il gère, le CE dispose d’une subvention destinée à cet effet. Le chef d’entreprise n’a pas à respecter de minimum légal comme pour la subvention de fonctionnement. Chez LOGICA cette contribution représente 0,43% de la masse salariale brute de l’année en cours.</font></span></p>\r\n<div style="margin-left: 0cm;"><strong><font size="2" face="Arial"><a name="_Toc154399254"> </a></font></strong></div>\r\n<div style="margin-left: 0cm;"><strong><font face="Arial"><font size="2"><span style="font-size: 11pt;">Les commissions.</span><span style="font-size: 11pt;"> </span></font></font></strong></div>\r\n<p style="margin-top: 6pt;"><span style="font-size: 11pt;"><font size="2" face="Arial">Pour mener à bien ses missions, le CE peut s’entourer de commissions. Il faut distinguer les commissions obligatoires et les commissions facultatives. Certaines de ces commissions siégent aux CCE.</font></span></p>\r\n<div><font size="2" face="Arial"> </font></div>\r\n<div style="margin-left: 0cm;"><strong><a name="_Toc417446397"><span><span><span><span><span><span><span><span><font size="2" face="Arial">* Les commissions obligatoires</font></span></span></span></span></span></span></span></span></a><span><span><font size="2" face="Arial">.</font></span></span></strong></div>\r\n<div><font size="2" face="Arial"> </font></div>\r\n\r\n<div style="margin-left: 1cm;"><strong><a name="_Toc417537808"><span><span><span><span><span><span style="color: windowtext; font-size: 10pt;"><font face="Arial">La commission de la formation professionnelle </font></span></span></span></span></span></span></a><span style="color: windowtext; font-size: 10pt;"><font face="Arial">. </font></span></strong></div>\r\n<div style="margin-left: 1cm;"><strong><a name="_Toc417537809"><span><span><span><span><span><span style="color: windowtext; font-size: 10pt;"><font face="Arial">La commission économique </font></span></span></span></span></span></span></a><span style="color: windowtext; font-size: 10pt;"><font face="Arial"> (CCE). </font></span></strong></div>\r\n<div style="margin-left: 1cm;"><strong><a name="_Toc417537809"><span><span><span><span><span><span style="color: windowtext; font-size: 10pt;"><font face="Arial">La commission d’information et d’aide au logement </font></span></span></span></span></span></span></a><span style="color: windowtext; font-size: 10pt;"><font face="Arial"> (CCE). </font></span></strong></div>\r\n<div style="margin-left: 1cm;"><strong><a name="_Toc417537809"><span><span><span><span><span><span style="color: windowtext; font-size: 10pt;"><font face="Arial">La commission égalité professionnelle </font></span></span></span></span></span></span></a><span style="color: windowtext; font-size: 10pt;"><font face="Arial">. </font></span></strong></div>\r\n<div><font size="2" face="Arial"> </font></div>\r\n<div style="margin-left: 0cm;"><strong><a name="_Toc417446398"><span><span><span><span><span><span><span><span><font size="2" face="Arial">* Les commissions facultatives</font></span></span></span></span></span></span></span></span></a><span><span><font size="2" face="Arial">.</font></span></span></strong></div>\r\n\r\n<div style="margin-left: 1cm;"><strong><font face="Arial"><span style="color: windowtext; font-size: 10pt;">La commission de suivi RTT .</span></font></strong></div>\r\n<div style="margin-left: 1cm;"> </div> <br/>', '', 1, 0, 1),
('les_offres', 'Les offres', '', '', 0, 4, '0000-00-00 00:00:00', '', '', 1, 1, 1),
('le_nouveau_site_de_votre_ce_est_en_ligne', 'Le nouveau site de votre CE est en ligne', NULL, 'events', 1, 0, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('location_de_vehicules', 'Location de vÃ©hicules', NULL, 'sorties_voyages_et_sejours', 2, 2, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('mmv', 'MMV', NULL, 'sorties_voyages_et_sejours', 2, 4, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('noel_2012', 'NOEL 2012', NULL, 'events', 1, 0, '0000-00-00 00:00:00', NULL, 'NOEL', 1, 0, 1),
('noel_2013', 'NoÃ«l 2013', NULL, 'events', 1, 0, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('nous_nous_presentons', 'Nous nous prÃ©sentons', 'presentation.html', 'votre_ce', 1, 1, '0000-00-00 00:00:00', '﻿<h2>Nous voilà</h2>\r\n         <p class="MsoNormal" style="margin: 0cm 0cm 0pt;"><strong style=""><span lang="FR" style="font-family: Arial; font-size: 10pt;"><o:p><font color="#000000"> </font></o:p></span></strong></p>\r\n<p class="MsoNormal" style="margin: 0cm 0cm 0pt;"><span lang="FR" style="font-family: Arial; font-size: 10pt;"><a href="media/ce nord 2011.doc">Votre CE en 2011</a></span></p> ', '', 1, 0, 1),
('ouverture_des_dossiers_ancv_2014', 'Ouverture des dossiers ANCV 2014', NULL, 'events', 1, 0, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('parc_asterix_a_prix_reduit', 'Parc AstÃ©rix Ã  prix rÃ©duit', NULL, 'events', 1, 0, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('participation_du_ce', 'Participation du CE', '', '', 0, 3, '0000-00-00 00:00:00', '', '', 1, 1, 1),
('participation_sport-loisir-culture', 'Participation Sport-Loisir-Culture', 'participationSLC.html', 'participation_du_ce', 1, 1, '0000-00-00 00:00:00', '﻿<h2>Les participations sports, loisirs et culture</h2>\r\n         <h3><u><em>Les concerts et spectacles.</em></u> </h3>\r\n<p>Le CE rembourse, à hauteur de 50%  par billet, les places de concert ou de spectacle; Le remboursement total sur l''année est fixé à <strong><u><em>75 euros par an</em></u></strong> et par collaborateur.</p>\r\n<p>Exemple :  2 places à 50€, le CE rembourse 2x25€, soit 50€                          <img width="30" height="107" src="media/concert.jpg" alt="" style="width: 78px; height: 95px;"/><br/>\r\n\r\n                2 places à 8€, le CE rembourse 2x4€, soit 8€</p>\r\n<p>NB : Merci de nous fournir le billet <u>original</u> comme justificatif. La date du spectacle doit être situé dans l''année en cours. Date limite de remboursement pour une année : 31 janvier de l''année suivante</p>\r\n<h3><u><em>Abonnement sportif/culturel.</em></u></h3>\r\n<h3> </h3>\r\n<p>Le CE participe à l''abonnement dans un club de sport et/ou à un abonnement culturel. Le CE rembourse 50 % de l''abonnement avec un <strong><em><u>plafond annuel de 75 euros</u></em></strong>.</p>\r\n<p>NB: Merci de nous fournir un justificatif faisant apparaître : la période d''abonnement (dont le début devra être dans l''année en cours), le montant de l''abonnement et le cachet de l''organisme.</p>\r\n\r\n<p><img src="media/courir.jpg" alt=""/> <img src="media/courir.jpg" alt=""/><img src="media/courir.jpg" alt=""/><img src="media/courir.jpg" alt=""/><img src="media/courir.jpg" alt=""/><img src="media/courir.jpg" alt=""/><img src="media/courir.jpg" alt=""/></p>\r\n<p> </p>\r\n<h3><u><em>Achats livres</em></u></h3>\r\n<h3> </h3>\r\n<p>Le CE participe désormais à l''achat de culture literraire !  Le CE rembourse 50 % de vos achat en livres avec un <strong><em><u>plafond annuel de 75 euros</u></em></strong>.</p>\r\n<p>NB: Merci de nous fournir une facture faisant apparaître : la date d''achat, votre nom, le montant</p>\r\n<p><em><u><strong><font size="4">Remarque importante.</font></strong></u></em></p>\r\n<p>Le plafond annuel de 75 euros est calculé en cumulant tous les types d''activités : concert, spectacle, abonnement sportifs, etc ...</p>\r\n\r\n<p>Exemple : si vous avez obtenu un remboursement d''un abonnement "activité sportive" à hauteur de 50 euros, vous n''aurez plus droit qu''à 25 euros de remboursement spectacle(s).</p>\r\n<h3><em><u>Modalités.</u></em></h3>\r\n<p>Un chéque vous sera transmis par le trésorier du CE. Prévoir un petit délai.</p>', '', 1, 0, 1),
('passeport_gourmand', 'Passeport gourmand', 'gourmand.html', 'sport_et_detente', 2, 2, '0000-00-00 00:00:00', '<p>Le passeport Gourmand du Nord propose une r&eacute;duction sur le prix public aux membres de Nord.</p>\r\n<p>C''est par ici <a href="media/docinfosPGnord-logica.pdf">--&gt;</a> &nbsp;Apr&eacute;s identification saisir le code promotion : &nbsp;LOGICA</p>', '', 1, 0, 1),
('qu_est_ce_qu_un_ce', 'Qu\\''est ce qu\\''un CE ?', 'keskunce.html', 'votre_ce', 1, 0, '0000-00-00 00:00:00', '﻿<p> </p>\r\n<p><span><font size="2" face="Arial"> <strong><a name="_Toc154399248"><span style="font-size: 11pt;"> QU''EST CE QU''UN CE ? </span></a></strong></font></span></p>\r\n<p> </p>\r\n\r\n<p><span style="font-size: 11pt;"><font size="2" face="Arial">Un CE est un certain nombre de membres du personnel (hors direction) élus périodiquement par leurs collégues (tous les deux ans chez LOGICA). Il se réunit 1 fois par mois et parfois même de façon exceptionnelle. Un procés verbal est fait à chacune de ces réunions par le secrétaire. Il est ensuite mis à disposition de tous les membres qui souhaitent le consulter (voir sur le web-rh).</font></span></p>\r\n<p><span style="font-size: 11pt;"><font size="2" face="Arial">Un CE doit mener deux actions fondamentales, l’une sur un plan économique et professionnel et l’autre sur un plan culturel et social pour cela il a :  </font></span></p>\r\n\r\n<li><font size="2" face="Arial"><strong><span style="font-weight: normal; font-size: 11pt;">Des attributions économiques et professionnelles. </span></strong></li>\r\n<li><strong><font size="2" face="Arial"><span style="font-weight: normal; font-size: 11pt;">Des attributions sociales et culturelles. </span></font></strong></li>\r\n<p style="margin-top: 6pt;"><span style="font-size: 11pt;"><font size="2" face="Arial">Le CE doit chercher à améliorer les conditions d’emploi et de vie dans l’entreprise de l’ensemble des salariés, sans discrimination. Les actions menées doivent bénéficier au personnel ou à leur famille. </font></span></p>\r\n<p><font size="2" face="Arial">L’équipe actuelle de Nord :</font></p>\r\n<p>\r\n</p><p> </p>\r\n<p> </p>\r\n\r\n<p><font face="Arial"><font size="2"> <strong><a name="_Toc154399248"><span style="font-size: 11pt;">Le comité Central d’Entreprise (CCE.).</span></a></strong></font></font></p>\r\n<div><font size="2" face="Arial"> </font></div>\r\n<p style="margin-left: 0cm;"><span style="font-size: 11pt;"><font size="2" face="Arial">LOGICA est une société qui dispose de plusieurs établissements aussi bien en Régions qu’à Paris. La loi oblige les employeurs à mettre en place un CE dès que les effectifs atteignent le seuil de 50 salariés. Chaque CE a au moins un représentant au sein du Comité Central d’Entreprise qui regroupe tous les CE des régions.</font></span></p>\r\n<p style="margin-left: 0cm;"><span style="font-size: 11pt;"><font size="2" face="Arial">Le CCE « exerce les attributions économiques qui concernent la marche générale de l’entreprise et qui excèdent les limites des pouvoirs des établissements. (Art. L. 435-3 Code du Travail) ».</font></span></p>\r\n<ul type="disc" style="margin-top: 0cm;">\r\n    <li> </li>\r\n</ul>\r\n<p/>\r\n<ul>\r\n    <li><font size="2" face="Arial"><strong>Daniel LECERF,</strong> Président</font></li>\r\n\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n    <li><font size="2" face="Arial"><strong>Denis BOLLINGER, </strong>titulaire, secrétaire </font></li>\r\n    <li><font size="2" face="Arial"><strong>Julien SCHWARSHAUPT, </strong>titulaire, trésorier  </font></li>\r\n    <li><font size="2" face="Arial"><strong>Catherine VERMEIL, </strong>titulaire  </font></li>\r\n    <li><font size="2" face="Arial"><strong>Frédéric HENNIART, </strong>titulaire, représentant titulaire au CCE  </font></li>\r\n\r\n    <li><strong><font size="2" face="Arial">Elise TERRIER</font>, </strong>titulaire </li>\r\n    <li><font size="2" face="Arial"><strong>Alexandre MALNOE</strong>, suppléant</font></li>\r\n    <li><font size="2" face="Arial"><strong>Jerome MALARD</strong>, suppléant</font></li>\r\n    <li><font size="2" face="Arial"><strong>Nathalie LEBEUL</strong>, suppléante </font></li>\r\n\r\n</ul>\r\n<p> </p>\r\n<ul>\r\n    <li><font size="2" face="Arial"><strong>Sandrine DANIAU,</strong> RRH invitée permanente aux réunions</font></li>\r\n</ul>\r\n<p>\r\n</p><p> </p>\r\n<p>Nous contacter :</p>\r\n<p/>\r\n<div><font size="2" face="Arial"> </font></div>\r\n\r\n<div>\r\n<p><font size="2" face="Arial">Par téléphone : 0362599343, par mail : <a href="mailto:ce-nrd@logica.com">ce-nrd@logica.com</a>', '', 1, 0, 1),
('reductions_optical_center', 'RÃ©ductions Optical Center', NULL, 'events', 1, 0, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('saut_tandem_en_parachute', 'Saut tandem en parachute', 'parachute.html', 'sport_et_detente', 2, 1, '0000-00-00 00:00:00', '<p>Venez d&eacute;couvrir le parachutisme &agrave; travers un saut en tandem &agrave; 4000 m !!!</p>\r\n<p><a href="media/affiche (2).pdf">affiche (2).pdf</a></p>', '', 1, 0, 1),
('search', 'search', NULL, NULL, 0, 0, '0000-00-00 00:00:00', '&nbsp;', 'abc', 0, 0, 1),
('sejours_a_center_park', 'SÃ©jours Ã  CenterParcs', 'centerpark.html', 'sorties_voyages_et_sejours', 2, 1, '0000-00-00 00:00:00', '<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR">Le <strong><em><u>C</u></em></strong>omit&eacute; d&rsquo;<strong><em><u>E</u></em></strong>ntreprise vous propose de passer des s&eacute;jours &agrave;^prix r&eacute;duits au CenterParcs du Lac d&rsquo;Ailette dans l&rsquo;Aisne.<o:p></o:p></span></p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR">De 10 &agrave; 15 % sous le tarif public. CONTACTEZ NOUS !</span></p>\r\n<p style="margin: 0cm 0cm 0pt" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR"><o:p>&nbsp;</o:p></span></p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR">Les tarifs propos&eacute;s comprennent la location du cottage et l&rsquo;acc&egrave;s permanent &agrave; l&rsquo;Aqua Mundo<o:p></o:p></span></p>\r\n<p style="margin: 0cm 0cm 0pt" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR"><o:p><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR"><o:p><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR">&nbsp;</span></o:p></span></o:p></span></p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR">&nbsp;</span></p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal">&nbsp;</p>\r\n<p><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR"><o:p></o:p></span></p>\r\n<p>&nbsp;</p>\r\n<p align="center"><img src="media/cp.JPG" alt="" /></p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal">&nbsp;</p>\r\n<p><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR"><strong>Ouvert sur un lac de 140 hectares, le Domaine du Lac d&rsquo;Ailette se niche au coeur d&rsquo;un vallon verdoyant. Son architecture inspir&eacute;e des villages traditionnels canadiens fleure bon la douceur de vivre.<o:p></o:p></strong></span></p>\r\n<p style="margin: 0cm 0cm 0pt" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR"><strong>Le site se pr&ecirc;te aux activit&eacute;s nautiques, de plein air ou d&rsquo;int&eacute;rieur. <o:p></o:p></strong></span></p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR"><strong>Plongez dans le d&eacute;cor unique de l&rsquo;Aqua Mundo o&ugrave; les toboggans serpentent entre les rochers et la piscine &agrave; d&eacute;bordement offre une vue imprenable sur le lac.</strong></span></p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal">&nbsp;</p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal">&nbsp;</p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR"><u><strong><em>Nouveaut&eacute; : Disponibles aussi&nbsp; :&nbsp;S&eacute;jours en Normandie (Domaine des Bois-francs) et en Sologne (domaine des hauts de bruy&egrave;res)</em></strong></u></span></p>\r\n<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal"><span lang="FR" style="color: black; font-family: Arial; mso-ansi-language: FR"><strong><o:p></o:p></strong></span></p>\r\n<p>&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>', '', 1, 0, 1),
('sorties_voyages_et_sejours', 'Sorties voyages et sÃ©jours', '', 'les_offres', 1, 1, '0000-00-00 00:00:00', '', '', 1, 1, 1),
('sport_et_detente', 'Sport et dÃ©tente', '', 'les_offres', 1, 2, '0000-00-00 00:00:00', '', '', 1, 1, 1),
('stars80_au_grand_stade_lille_metropole', 'Stars80 au Grand Stade Lille MÃ©tropole', NULL, 'events', 1, 0, '0000-00-00 00:00:00', NULL, '', 1, 0, 1),
('votre_ce', 'Votre CE', '', '', 0, 1, '0000-00-00 00:00:00', '', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  `info` varchar(100) DEFAULT NULL,
  `price` double NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2265 ;

--
-- Contenu de la table `price`
--

INSERT INTO `price` (`id`, `label`, `info`, `price`, `category`) VALUES
(2184, 'Â Kinepolis (unitÃ© - 6mois)', 'Â Lomme', 5.5, 'CinÃ©mas'),
(2185, 'Â UGC (6mois-1 an)', 'Â Lille/Villeneuve d''ascq', 5, 'CinÃ©mas'),
(2186, 'Â UGC (6mois-1 an)', 'Â autres villes', 6, 'CinÃ©mas'),
(2187, ' OcinÃ© (6 mois)', 'Â Dunkerque', 6, 'CinÃ©mas'),
(2188, 'Â Cineville', 'Â HÃ©nin-Beaumont', 5.5, 'CinÃ©mas'),
(2189, ' OCINE', ' Maubeuge St Omer', 5.5, 'CinÃ©mas'),
(2190, 'Â ColisÃ©e LumiÃ¨re', 'Â Marcq-en-Bl', 4, 'CinÃ©mas'),
(2191, 'Â Duplex CinÃ©ma', 'Â Roubaix', 5, 'CinÃ©mas'),
(2192, 'Â Palace', 'Â Cambrai', 5, 'CinÃ©mas'),
(2193, ' Majestic', ' Lille', 5.5, 'CinÃ©mas'),
(2194, ' Metropole', ' Lille', 5.5, 'CinÃ©mas'),
(2195, 'Â Gaumont', 'Â Valenciennes', 6, 'CinÃ©mas'),
(2196, 'Â Gaumont et PathÃ©', 'Â Toutes', 6.5, 'CinÃ©mas'),
(2197, 'Â Majestic', 'Â Douai', 5.5, 'CinÃ©mas'),
(2198, 'Â MÃ©ga-CGR', 'Â Bruay', 5, 'CinÃ©mas'),
(2199, 'Â PathÃ©', 'Â LiÃ©vin', 5.5, 'CinÃ©mas'),
(2200, 'Â Planet Bowling', 'Lomme', 3.5, 'Sports'),
(2201, ' PaintBall Concept', 'Tournai', 20.5, 'Sports'),
(2202, 'Â Ice Mountain - 1 heure', 'Â avec matÃ©riel', 12.5, 'Sports'),
(2203, 'Â Nauticaa - lievin', 'Â Adultes', 2.5, 'Sports'),
(2204, 'Â Nauticaa - lievin', 'Â Enfants (3-15 ans)', 2, 'Sports'),
(2205, 'Â Lille Karting Indoor - Englos', 'Bon achat de 5 euros', 4, 'Sports'),
(2206, 'Patinoire de Wasquehal', ' Wasquehal', 3.5, 'Sports'),
(2207, 'Â Bowling Van Gogh (sauf sam et veille fÃªte)', ' Villeneuve d''Ascq', 3.5, 'Sports'),
(2208, 'Â Bad-Squash-Foot 3*3 Le WAM (hors apace)', ' Wambrechies', 5, 'Sports'),
(2209, 'Â Disneyland Paris (1 parc au choix)', 'Â Adultes', 50, 'Parcs de loisirs'),
(2210, 'Â Disneyland Paris (1 parc au choix)', 'Â Enfants (3-11 ans)', 44.5, 'Parcs de loisirs'),
(2211, 'Â Disneyland Paris (les deux parcs)', 'Â Adultes', 61.5, 'Parcs de loisirs'),
(2212, 'Â Disneyland Paris (les deux parcs)', 'Â Enfants (3-11 ans)', 54, 'Parcs de loisirs'),
(2213, ' Parc AstÃ©rix ***', 'Â Adultes', 32, 'Parcs de loisirs'),
(2214, ' Parc AstÃ©rix ***', 'Â Enfants (3-11 ans)', 32, 'Parcs de loisirs'),
(2215, 'Â Bagatelle (10/04-25/09)', 'Â Adultes & Enfants', 15, 'Parcs de loisirs'),
(2216, 'Â Aqualud (09/04-13/11)***', 'Adultes', 14, 'Parcs de loisirs'),
(2217, 'Â Aqualud (09/04-13/11)***', 'Enfants (+1m)', 14, 'Parcs de loisirs'),
(2218, 'Aqualibi', 'Adultes', 13, 'Parcs de loisirs'),
(2219, 'Aqualibi', 'Enfants (3-5ans)', 4.5, 'Parcs de loisirs'),
(2220, 'Â Plopslaland (4/4-3/1)', 'Â Adultes & Enfants', 19.5, 'Parcs de loisirs'),
(2221, 'Â BobbeJaanland ', 'Â Adultes & Enfants (>1m)', 21.5, 'Parcs de loisirs'),
(2222, 'Â Bellewaerde (3/4-7/11)***', 'Â Adultes & Enfants (> 1m)', 21, 'Parcs de loisirs'),
(2223, 'Â Dennlys Park (16/4 25/9)', 'Â Adultes', 12, 'Parcs de loisirs'),
(2224, 'Â Dennlys Park (16/4 25/9)', 'Â Enfants (3-11 ans)', 10, 'Parcs de loisirs'),
(2225, 'Â Walibi Belgique (3/4-7/11)***', 'Â Adultes & Enfants (>3 ans)', 22, 'Parcs de loisirs'),
(2226, 'Â MusÃ©e GrÃ©vin', 'Â Adultes', 13, 'Parcs de loisirs'),
(2227, 'Â MusÃ©e GrÃ©vin', 'Â Enfants (6-14 ans)', 13, 'Parcs de loisirs'),
(2228, 'Â Futuroscope', 'Â Adultes', 32, 'Parcs de loisirs'),
(2229, 'Â Futuroscope', 'Â Enfants (5-16 ans)', 24.5, 'Parcs de loisirs'),
(2230, 'Â Mer de sable***', 'Adultes et >3 ans', 16.5, 'Parcs de loisirs'),
(2231, 'Â Nausicaa', 'Â Adultes', 15, 'Parcs de loisirs'),
(2232, 'Â Nausicaa', 'Â Enfants (3-12 ans)', 9.5, 'Parcs de loisirs'),
(2233, 'Â Centre historique minier de Lewarde', 'Â Adultes', 9, 'Parcs de loisirs'),
(2234, 'Â Centre historique minier de Lewarde', 'Â Enfants (5-18 ans)', 5, 'Parcs de loisirs'),
(2235, 'Â Thoiry', 'Â Adultes', 21, 'Parcs de loisirs'),
(2236, 'Â Thoiry', 'Â Enfants (3-14 ans)', 17, 'Parcs de loisirs'),
(2237, 'Â La coupole (St-Omer)', 'Â Adultes', 7, 'Parcs de loisirs'),
(2238, 'Â La coupole (St-Omer)', 'Â Enfants (5-16 ans)', 4, 'Parcs de loisirs'),
(2239, 'Â Chateau Vaux-le-Vicomte (14/3 18/11)***', ' Adultes & Enfants (> 6 ans)', 9.5, 'Parcs de loisirs'),
(2240, 'Parc les poussins lille citadelle (06/02-11/11)', 'tour manÃ©ge', 1, 'Parcs de loisirs'),
(2241, 'Â Kidzy (mer-sam-dim-J fÃ©riÃ©s)', ' Enfants (2-12) ', 7, 'Parcs de loisirs'),
(2242, 'Â Recreakid Englos (mer-sam-dim-J fÃ©riÃ©s)', 'Â Enfants', 8.5, 'Parcs de loisirs'),
(2243, 'Â Grand parc du Puy du Fou (07/04-30/9) - 1 jour', 'Â Adultes', 24.5, 'Parcs de loisirs'),
(2244, 'Â Grand parc du Puy du Fou (07/04-30/9) - 1 jour', 'Â Enfants (5-13 ans)', 17, 'Parcs de loisirs'),
(2245, 'Â Grand parc du Puy du Fou (07/4-30/9) - 2 jours', 'Â Adultes', 36.5, 'Parcs de loisirs'),
(2246, 'Â Grand parc du Puy du Fou (07/4-30/9) - 2 jours', 'Â Enfants (5-13 ans)', 24.5, 'Parcs de loisirs'),
(2247, 'Gd parc Puy du Fou+CinÃ©scenie (07/4-30/9) - 1 j', 'Â Adultes', 40.5, 'Parcs de loisirs'),
(2248, '(prÃ©ciser les dates)', 'Â Enfants (5-13 ans)', 24.5, 'Parcs de loisirs'),
(2249, 'Gd parc Puy du Fou+CinÃ©scenie (07/4-30/9) - 2 j', 'Â Adultes', 51, 'Parcs de loisirs'),
(2250, '(prÃ©ciser les dates)', 'Â Enfants (5-13 ans)', 31, 'Parcs de loisirs'),
(2251, ' Eco MusÃ©e Avesnois', ' Adultes', 3.5, 'Parcs de loisirs'),
(2252, ' Eco MusÃ©e Avesnois', ' Enfants (8-17 ans)', 2.5, 'Parcs de loisirs'),
(2253, ' Bateaux Parisiens (1h)', ' Adultes & Enfants (> 3 ans)', 5, 'Parcs de loisirs'),
(2254, ' Zoo d''Anvers', ' Adultes', 18, 'Parcs de loisirs'),
(2255, ' Zoo d''Anvers', ' Enfants (3-17 ans)', 14.5, 'Parcs de loisirs'),
(2256, ' Zooparc Beauval', ' Adultes', 18, 'Parcs de loisirs'),
(2257, ' Zooparc Beauval', ' Enfants (3-10 ans)', 12, 'Parcs de loisirs'),
(2258, 'MarÃ©is Etaples', ' Adultes', 4.5, 'Parcs de loisirs'),
(2259, 'MarÃ©is Etaples', ' Enfants (4-12 ans)', 3.5, 'Parcs de loisirs'),
(2260, 'Pairi daiza', ' Adultes', 19, 'Parcs de loisirs'),
(2261, 'Pairi daiza', ' Enfants (3-11 ans)', 14.5, 'Parcs de loisirs'),
(2262, 'Tour Montparnasse', ' Adultes & Enfants > 6ans', 6, 'Parcs de loisirs'),
(2263, 'Domaine de Chantilly', ' Adultes', 16.5, 'Parcs de loisirs'),
(2264, 'Domaine de Chantilly', ' Enfants (4-17 ans)', 8.5, 'Parcs de loisirs');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` varchar(10) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`iduser`, `pwd`) VALUES
('admin', '24f3e38f003e58664247ac4d8c4af880');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
