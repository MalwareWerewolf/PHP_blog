-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 09:02 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `its_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `categoria`) VALUES
(8, 'Debian'),
(9, 'Ubuntu'),
(11, 'VideogamesOnLinux'),
(12, 'tails');

-- --------------------------------------------------------

--
-- Table structure for table `commenti`
--

CREATE TABLE `commenti` (
  `id` int(11) NOT NULL,
  `testoCom` text NOT NULL,
  `approvato` varchar(20) NOT NULL,
  `dataCommento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commenti`
--

INSERT INTO `commenti` (`id`, `testoCom`, `approvato`, `dataCommento`) VALUES
(41, 'Nice tutorial bruh!', 'true', '2018-11-13 07:48:23'),
(42, 'My tutorial is better, this one is stupid -.-', 'true', '2018-11-13 07:52:40'),
(43, 'YOOOOOOO', 'true', '2018-11-13 08:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titolo` varchar(200) NOT NULL,
  `sottotitolo` varchar(200) DEFAULT NULL,
  `testo` text,
  `id_autore` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `titolo`, `sottotitolo`, `testo`, `id_autore`, `data`) VALUES
(29, 'How To Install Kali Linux Tools In Ubuntu', 'I am going to teach how to install the main k', 'Let''s Begin<br />\r\nTo make things easier, there is already a python script out there on GitHub called katoolin. It is a terminal-based program that provides an interactive menu that lets the user decide which tools to install. All of the tools can be installed if desired. Don''t forget to make sure that python (2.7) is installed on your system first.<br />\r\n<br />\r\nYou can download this script via its page on GitHub, or (if you have git installed) run ''git clone'' to clone the repository via the command-line.<br />\r\n$ git clone https://github.com/LionSec/katoolin<br />\r\nâ€‹The following screenshot was how I installed the script so that it can be used system-wide.<br />\r\nkatoolin install<br />\r\nI simply made the script executable with ''chmod +x katoolin.py'', and copied the script into the ''/usr/bin'' directory. That way, I can run the script from anywhere with root privileges using ''sudo''. It requires root privileges because it will use apt to install most of the software.<br />\r\n$ sudo katoolin<br />\r\nThis script will bring up a list of options of what to do next.â€‹<br />\r\nkatoolin categories<br />\r\nWhen I first ran the program, I greeted with the main menu where you can manage repositories, view categories, get help, etc. Entering ''2'' brings up a list of categories to browse through to choose which tools you wish to install.<br />\r\nâ€‹<br />\r\nEntering ''5'' will list two commands to use for navigation: ''back'' and ''home. Enter ''back'' to go the previous menu and ''gohome'' for the main menu.<br />\r\nkatoolin navigation help<br />\r\nAlso, when launching the program, it stresses that any Kali repositories that may have been added be removed before updating the system. Katoolin will either use apt to install any programs selected. Some require git as the sources are downloaded. Git will automatically be installed if it isn''t already via apt. Some programs listed do come from the official Ubuntu repositories. However, not all of them do. If you try to install a program like ''wordlist'' under password attacks, you will get this from apt:<br />\r\nkatoolin cannot find program<br />\r\nThis is because it doesn''t exist in the Ubuntu repositories.<br />\r\nInstalling Programs<br />\r\nSo, before doing anything with this script, it is recommended that you add the Kali repositories to the sources list. Katoolin already provides an interface to do this in two easy steps. First, enter ''1'' into the prompt to add the repositories, then enter ''2'' to update the package list for apt.<br />\r\nâ€‹<br />\r\nkatoolin add repos and update<br />\r\nOnce the software list has been updated, we will then proceed to install ''wordlists'' again.<br />\r\nkatoolin installing wordlist<br />\r\nIf you really want to install all of the programs available either in a single category or from all of them, you can enter 0 in the appropriate menu. See the above screenshots.<br />\r\nCategories<br />\r\nIf we go through just some of the categories in the menu we can see that there a numerous tools available for Kali Linux that we can download and install onto our Ubuntu machine. Let''s go through a few of them.<br />\r\nkatoolin password attacks menu<br />\r\nEntering ''11'' in the categories menu will bring up a list of tools for password attacking. Here I am about to install John the Ripper. This is a program that attempts to crack the passwords of the users on your system. The more insecure the password, the quicker it will be cracked.<br />\r\nkatoolin vulnerability menu<br />\r\nSee there are numerous programs available under the Vulnerability analysis tools. You may find that some programs are listed under more than one category.<br />\r\nFinishing Up<br />\r\nOnce you have finished installing the programs you want, you should remove the Kali repositories from the sources list. Do this to prevent major errors when updating the system. In the start menu, go to the "Add Kali Linux repositories & Update" menu (1), remove the Kali repos (3), and update the package list (2).<br />\r\nPicture<br />\r\nUsing this script makes installing these security tools on Ubuntu much easier. Anything can be installed using one central interface. A few programs can be installed, or all of them can be installed, depending on what you want to do.', 3, '2018-11-13 07:43:10'),
(30, 'Ubuntu 19.04 Daily Builds Available to Download', 'Prep a partition because Ubuntu 19.04 daily builds are now available to download.', 'Prep a partition because Ubuntu 19.04 daily builds are now available to download.<br />\r\n<br />\r\nA new â€œDisco Dingoâ€ daily build will be produced each and every day from now until the Ubuntu 19.04 release date in April 2019.<br />\r\n<br />\r\nFor dedicated Ubuntu developers, testers, and community enthusiasts the arrival of daily builds is the horn blare that declares the development cycle well and truly open.<br />\r\n<br />\r\nFurthermore, these images are the only way to sample the upcoming release before a solitary beta release pops out sometime in late March.<br />\r\n<br />\r\nDo remember that Ubuntu daily build ISOs are intended for testing and development purposes only. Donâ€™t run these images as the primary OS on mission critical machines â€” and yes, that includes your brotherâ€™s laptop â€” unless you really know what youâ€™re doing and (more importantly) how you can undo it.<br />\r\n<br />\r\nDownload Ubuntu 19.04 Daily Build<br />\r\nYou can download Ubuntu 19.04 daily builds from the official Ubuntu release server, which weâ€™ve linked to below.<br />\r\n<br />\r\nRemember: you wonâ€™t find 32-bit Ubuntu images available to download, only 64-bit ones. This is because Ubuntu dropped 32-bit desktop builds during the 17.10 development cycle.', 9, '2018-11-13 07:50:01'),
(31, 'Unreal Engine 4.21 is out, now defaults to the Vulkan API on Linux', 'Epic Games have released Unreal Engine 4.21 and it includes some interesting stuff on the Linux side of things.', 'From now, Unreal Engine will default to using the Vulkan API on Linux and fallback to OpenGL when that can''t be used. This is going to be good for the future of Linux games, since it should help developers get better performance.<br />\r\n<br />\r\nOn top of that, it features a new media player for Linux with the bundled WebMMedia plugin which includes support for WebM VPX8/9 videos. To further improve Linux support, they now have a proper crash reporter interface so that they can "continue to improve support for Linux platforms".<br />\r\n<br />\r\nThat''s just the improvements for Linux, there''s absolutely tons more included in this release including Android and iOS optimizations as a result of Epic''s work on Fornite.<br />\r\n<br />\r\nIt''s also really nice to see Epic thank contributors, noting 121 improvements where submitted by the community to their GitHub. Although you can only access it with an Unreal Engine account.<br />\r\n<br />\r\nMore info on the official announcement.<br />\r\n<br />\r\nWho knows, maybe now that Vulkan is in better shape in Unreal Engine, Epic Games might eventually bring Fortnite to Linux. I can dream right?', 10, '2018-11-13 08:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `r_post_categorie`
--

CREATE TABLE `r_post_categorie` (
  `id_post` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_post_categorie`
--

INSERT INTO `r_post_categorie` (`id_post`, `id_categoria`) VALUES
(29, 8),
(30, 9),
(31, 11);

-- --------------------------------------------------------

--
-- Table structure for table `r_post_utenti_commenti`
--

CREATE TABLE `r_post_utenti_commenti` (
  `id_post` int(11) NOT NULL,
  `id_commento` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_post_utenti_commenti`
--

INSERT INTO `r_post_utenti_commenti` (`id_post`, `id_commento`, `id_utente`) VALUES
(30, 41, 1),
(30, 42, 9),
(29, 43, 10);

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cognome` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '	',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(45) COLLATE utf8_unicode_ci NOT NULL,
  `ruolo` enum('amministratore','redattore','lettore') CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`id`, `nome`, `cognome`, `email`, `password`, `ruolo`, `created`, `data`) VALUES
(1, 'mauro', 'bogliaccino', 'mauro@gmail.com', 'test1234', 'amministratore', '2018-07-13 08:23:23', '0000-00-00'),
(2, 'paolo', 'bogliaccino', 'paolo@gmail.com', 'qwerty', 'lettore', '2018-07-12 08:23:23', '0000-00-00'),
(3, 'giuseppe', 'garibaldi', 'giuseppe@gmail.com', 'anita', 'redattore', '2018-07-14 08:23:23', '0000-00-00'),
(9, 'Felix', 'Pie', 'felixpie@gmail.com', '123456', 'amministratore', '2018-11-13 19:45:48', '0000-00-00'),
(10, 'Maximilian', 'Dood', 'max@hotmail.com', 'qwerty', 'redattore', '2018-11-13 19:58:04', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commenti`
--
ALTER TABLE `commenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_post_categorie`
--
ALTER TABLE `r_post_categorie`
  ADD KEY `fk_r_post_categorie_2_idx` (`id_post`),
  ADD KEY `fk_r_post_categorie_1_idx` (`id_categoria`);

--
-- Indexes for table `r_post_utenti_commenti`
--
ALTER TABLE `r_post_utenti_commenti`
  ADD KEY `fk_r_post_utenti_commenti_3_idx` (`id_utente`),
  ADD KEY `fk_r_post_utenti_commenti_2_idx` (`id_commento`),
  ADD KEY `fk_r_post_utenti_commenti_1_idx` (`id_post`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `commenti`
--
ALTER TABLE `commenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `r_post_categorie`
--
ALTER TABLE `r_post_categorie`
  ADD CONSTRAINT `fk_r_post_categorie_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_r_post_categorie_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `r_post_utenti_commenti`
--
ALTER TABLE `r_post_utenti_commenti`
  ADD CONSTRAINT `fk_r_post_utenti_commenti_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_r_post_utenti_commenti_2` FOREIGN KEY (`id_commento`) REFERENCES `commenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_r_post_utenti_commenti_3` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
