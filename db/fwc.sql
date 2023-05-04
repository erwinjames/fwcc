-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 05:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fwc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cra_legend`
--

CREATE TABLE `cra_legend` (
  `legend_id` int(11) NOT NULL,
  `legend_name` varchar(100) NOT NULL,
  `legend_desc` text NOT NULL,
  `legend_mean` text NOT NULL,
  `legend_justify` text NOT NULL,
  `legend_applied_record` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cra_legend`
--

INSERT INTO `cra_legend` (`legend_id`, `legend_name`, `legend_desc`, `legend_mean`, `legend_justify`, `legend_applied_record`) VALUES
(1, 'P', 'Clothing, Aprons, Physical LiLoos Thread, buttons, and Tears in dfadsClothing', 'Physical Hazards include potentially harmful extraneous matter that may cause choking, injury, or other adverse health effects.', 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)'),
(2, 'C', 'Cologne dfadfadfdfand Perf', 'Chemical Hazards including radiological hazards, food allergens, substances such as pesticides and drug residues, natural toxins, decomposition, and unapproved food or color additives.', 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)'),
(3, 'B', 'Soiled Clothing Possible Pet Hairs and/or Human Hair, Dandruff from Hair Falling on Clothing, Pockets can Trap Bacteria and Foreign Objects', 'Biological Hazards including bacteria, viruses, parasites and environmental pathogens.', 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)');

-- --------------------------------------------------------

--
-- Table structure for table `cra_proccesing_step`
--

CREATE TABLE `cra_proccesing_step` (
  `p_step_id` int(11) NOT NULL,
  `processing_step` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cra_proccesing_step`
--

INSERT INTO `cra_proccesing_step` (`p_step_id`, `processing_step`) VALUES
(17, 'Receiving\r\n\r\n(Receipt of\r\n\r\ningredient /Raw\r\n\r\nMaterial'),
(18, 'Quarantine QC\r\n\r\nHold'),
(19, 'Storage'),
(20, 'Staging'),
(21, 'Pre- weighing'),
(22, 'Counter\r\n\r\nStacking'),
(23, 'Rework'),
(24, 'Packing'),
(25, 'Storage'),
(26, 'dfasdfasdfa');

-- --------------------------------------------------------

--
-- Table structure for table `cra_record`
--

CREATE TABLE `cra_record` (
  `record_id` int(11) NOT NULL,
  `table_id` int(100) NOT NULL,
  `fwc_cra_id` int(100) NOT NULL,
  `id_report` int(100) NOT NULL,
  `cra_legend_id` text NOT NULL,
  `cra_prvntv_ctrl_record` tinyint(1) NOT NULL,
  `cra_jstify_record` text NOT NULL,
  `cra_food_safety_hazard_record` text NOT NULL,
  `cra_is_applied_record` tinyint(1) NOT NULL,
  `date_recorded` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cra_record`
--

INSERT INTO `cra_record` (`record_id`, `table_id`, `fwc_cra_id`, `id_report`, `cra_legend_id`, `cra_prvntv_ctrl_record`, `cra_jstify_record`, `cra_food_safety_hazard_record`, `cra_is_applied_record`, `date_recorded`) VALUES
(55, 1, 39, 17, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(56, 1, 48, 17, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(57, 1, 50, 17, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(58, 1, 40, 18, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(59, 1, 51, 18, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(60, 1, 52, 18, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(61, 1, 41, 19, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(62, 1, 55, 19, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(63, 1, 56, 19, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(64, 1, 42, 20, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(65, 1, 53, 20, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(66, 1, 54, 20, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(67, 1, 43, 21, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:32'),
(68, 1, 61, 21, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(69, 1, 62, 21, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(70, 1, 44, 22, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(71, 1, 59, 22, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(72, 1, 60, 22, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(73, 1, 45, 23, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(74, 1, 63, 23, '2', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(75, 1, 66, 23, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(76, 1, 46, 24, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(77, 1, 67, 24, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(78, 1, 68, 24, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(79, 1, 47, 25, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(80, 1, 64, 25, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(81, 1, 65, 25, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 09:37:33'),
(82, 2, 39, 17, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:53'),
(83, 2, 48, 17, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:53'),
(84, 2, 50, 17, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:53'),
(85, 2, 40, 18, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:53'),
(86, 2, 51, 18, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:53'),
(87, 2, 52, 18, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(88, 2, 41, 19, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(89, 2, 55, 19, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(90, 2, 56, 19, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(91, 2, 42, 20, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(92, 2, 53, 20, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(93, 2, 54, 20, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(94, 2, 43, 21, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(95, 2, 61, 21, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(96, 2, 62, 21, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(97, 2, 44, 22, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(98, 2, 59, 22, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(99, 2, 60, 22, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(100, 2, 45, 23, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(101, 2, 63, 23, '2', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(102, 2, 66, 23, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(103, 2, 46, 24, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(104, 2, 67, 24, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(105, 2, 68, 24, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(106, 2, 47, 25, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(107, 2, 64, 25, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(108, 2, 65, 25, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:29:54'),
(109, 3, 39, 17, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:04'),
(110, 3, 48, 17, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:04'),
(111, 3, 50, 17, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:04'),
(112, 3, 40, 18, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:04'),
(113, 3, 51, 18, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:04'),
(114, 3, 52, 18, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:04'),
(115, 3, 41, 19, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:04'),
(116, 3, 55, 19, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:04'),
(117, 3, 56, 19, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(118, 3, 42, 20, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(119, 3, 53, 20, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(120, 3, 54, 20, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(121, 3, 43, 21, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(122, 3, 61, 21, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(123, 3, 62, 21, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(124, 3, 44, 22, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(125, 3, 59, 22, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(126, 3, 60, 22, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(127, 3, 45, 23, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(128, 3, 63, 23, '2', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(129, 3, 66, 23, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(130, 3, 46, 24, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(131, 3, 67, 24, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(132, 3, 68, 24, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(133, 3, 47, 25, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(134, 3, 64, 25, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(135, 3, 65, 25, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:32:05'),
(136, 4, 39, 17, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(137, 4, 48, 17, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(138, 4, 50, 17, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(139, 4, 40, 18, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(140, 4, 51, 18, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(141, 4, 52, 18, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(142, 4, 41, 19, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(143, 4, 55, 19, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(144, 4, 56, 19, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(145, 4, 42, 20, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(146, 4, 53, 20, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(147, 4, 54, 20, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(148, 4, 43, 21, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(149, 4, 61, 21, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(150, 4, 62, 21, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(151, 4, 44, 22, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:38'),
(152, 4, 59, 22, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(153, 4, 60, 22, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(154, 4, 45, 23, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(155, 4, 63, 23, '2', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(156, 4, 66, 23, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(157, 4, 46, 24, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(158, 4, 67, 24, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(159, 4, 68, 24, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(160, 4, 47, 25, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(161, 4, 64, 25, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(162, 4, 65, 25, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:36:39'),
(163, 5, 39, 17, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:29'),
(164, 5, 48, 17, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(165, 5, 50, 17, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(166, 5, 40, 18, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(167, 5, 51, 18, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(168, 5, 52, 18, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(169, 5, 41, 19, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(170, 5, 55, 19, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(171, 5, 56, 19, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(172, 5, 42, 20, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(173, 5, 53, 20, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(174, 5, 54, 20, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(175, 5, 43, 21, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(176, 5, 61, 21, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(177, 5, 62, 21, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(178, 5, 44, 22, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(179, 5, 59, 22, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(180, 5, 60, 22, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(181, 5, 45, 23, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(182, 5, 63, 23, '2', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(183, 5, 66, 23, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(184, 5, 46, 24, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(185, 5, 67, 24, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(186, 5, 68, 24, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(187, 5, 47, 25, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(188, 5, 64, 25, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(189, 5, 65, 25, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:43:30'),
(190, 6, 39, 17, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(191, 6, 48, 17, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(192, 6, 50, 17, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(193, 6, 40, 18, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(194, 6, 51, 18, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(195, 6, 52, 18, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(196, 6, 41, 19, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(197, 6, 55, 19, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(198, 6, 56, 19, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(199, 6, 42, 20, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(200, 6, 53, 20, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(201, 6, 54, 20, '3', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(202, 6, 43, 21, '1', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(203, 6, 61, 21, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(204, 6, 62, 21, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(205, 6, 44, 22, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(206, 6, 59, 22, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(207, 6, 60, 22, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(208, 6, 45, 23, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(209, 6, 63, 23, '2', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(210, 6, 66, 23, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(211, 6, 46, 24, '1', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(212, 6, 67, 24, '2', 0, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(213, 6, 68, 24, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(214, 6, 47, 25, '1', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(215, 6, 64, 25, '2', 0, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40'),
(216, 6, 65, 25, '3', 0, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', 0, '2023-05-04 10:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `cra_reviewer_sign`
--

CREATE TABLE `cra_reviewer_sign` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `rev_sign` text DEFAULT NULL,
  `rev_sign_image` text NOT NULL,
  `rev_name` varchar(100) NOT NULL,
  `rev_position` varchar(100) NOT NULL,
  `rev_date` text NOT NULL,
  `appr_name` varchar(100) NOT NULL,
  `appr_position` varchar(100) NOT NULL,
  `appr_sign` text DEFAULT NULL,
  `appr_sign_image` text NOT NULL,
  `appr_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cra_reviewer_sign`
--

INSERT INTO `cra_reviewer_sign` (`id`, `table_id`, `rev_sign`, `rev_sign_image`, `rev_name`, `rev_position`, `rev_date`, `appr_name`, `appr_position`, `appr_sign`, `appr_sign_image`, `appr_date`) VALUES
(7, 1, 'data:image/png;base64,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', '', 'erwin', 'it', '2023-05-04T09:37', 'james', 'it', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASkAAABKCAYAAADnjqLCAAAAAXNSR0IArs4c6QAABZJJREFUeF7tnU9u20YUxt/IKZACLdDushQNMzB9iVgH6B2cE/QERZxF99107WTfO9Q36M4yysDSLpsCLdAAKVBHLxhbtBijjSSao3nD+XkpkzPf+32DD/wznHHCHwQgAAHDBJxhbUiDAAQgIIQUgwACEDBNgJAybQ/iIAABQooxAAEImCZASJm2B3EQgAAhxRiAAARMEyCkTNuDOAhAgJBiDEAAAqYJEFKm7UEcBCBASDEGIAAB0wQIKdP2IA4CECCkGAMQgIBpAoSUaXsQBwEIEFKMAQhAwDQBQsq0PYiDAAQIKcaASQLjw8OxFza/vJybFIionREgpHaGmo7aBHwIjRajE/+bqj4TER9KN8G07m9WTxm36yAN6P+YPSAzrZfSBJOqfC+i33TVS0h1JZfmeYRUmr4lpXoVTvqiEe5E3qnIH8651/63xWJxPn9zeZ5UYYjdCQFCaieY8+1k/+nRqeoqnPxjJh9MV79fnOZLhcq3IUBIbUOLYzcmQDhtjIoD1xAgpBgivRLwt3buw+i31jMnrpx6JZxfY4RUfp4Hq3h8cHjsnPvVd+BErsW5H7mtC4Y7m4YJqWysDltoUVY+nI6XvZzP6ukkbI+0ngsBQioXpwPWWZRHfza3d6o64S1dQNgZNk1IZWh6nyU3V1B+SsFC9TsCqk+6tLV8dAAICHQj0HqDN9c9nfAJSzeOnPV5AlxJMUI6ERiXhydO3Jk/mVu8Tgg5aUMChNSGoDhsReB2moGb3VyKO/eSN3iMjpAECKmQdAfadnFQvRUnT0SEt3gD9dhSWYSUJTcS0LJ6DuX+mtUX3yYgGYmJEyCkEjdwl/LbkzV5DrVL8nn3RUjl7f9W1RdPq7ei8oTnUFth4+AHEiCkHggwp9OLslJfL+s55eR6/FoJqfgeJKGgmXLgxL26qi+eJyEakYMgQEgNwsbwReyXR2cqeqKiz+f15avwPdIDBG4JEFKMhI0I7JfV3yrylYj+oio/8/nLRtg4qAcChFQPEHNoojU3qil37sSdL3TxmsDKYQTEq5GQisc+qZ7/a53yVgEEVlJupiWWkErLr+hqW2Hlt6Fq1o+Krmv57OL6qp5+YUIMInojQEj1hjK/hm428PwgxyMZPVNRv2de5NBiFvwQRyEhNURXI9fU7D4s1/c2+3wkn+xG/NClXe5t9sB3hJF9D9U9IRWKLO0GJdBerpgZ8EFRR2+ckIpuAQK2JVCUVS0iB7ergcoP8zfTn7Ztg+PTIUBIpeMVSpcEmA6R11AgpPLyexDVrpkO0alGf1V2VU+/7nQyJwUlQEgFxUvjIQn0/Hbxn1k9/TKkXtruRoCQ6saNswwTuHu7uNT4ubeI7c0kZvW0MFxWttIIqWytp3BP4G5LLtZqNzsgCCmz1iAsNIH2hhKskRWadvf2Canu7DgzcQLc6qVhICGVhk+oDECAW70AUAM0SUgFgEqTaRBolkPWPS0e+olOGhWnqZKQStM3VPdAYL+s/lWRR4RUDzADNkFIBYRL07YJFGXld2EesySybZ8IKdv+oC4ggWbddnZiDgi5h6YJqR4g0kSaBFohJdzy2fWQkLLrDcoCE/hkR2Z2wQlMu3vzhFR3dpw5AAJ30xDYT9Csm4SUWWsQtgsCq01P5XqxpyVTEXZBfbs+CKnteHH0AAkUZfVeRB6LyFz3dEJQ2TKZkLLlB2oiEGh/w0dQRTBgTZeElD1PUBSBQHPbt+yaK6oIHvxfl4SUITOQEpfAvd1nCKq4dtz1TkgZMQIZNgi0pyX4Wz8WwovvCyEV3wMUGCOwfEZ15mXN6unEmLzs5BBS2VlOwRBIiwAhlZZfqIVAdgQIqewsp2AIpEWAkErLL9RCIDsChFR2llMwBNIiQEil5RdqIZAdAUIqO8spGAJpEfgIvduVWjQtM4wAAAAASUVORK5CYII=', '', '2023-05-10T09:37'),
(8, 2, 'data:image/png;base64,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', '', 'dfasdf', 'dfasdf', '2023-05-04T10:29', 'dfasdfa', 'dfasdf', 'data:image/png;base64,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', '', '2023-05-04T10:29'),
(9, 3, 'data:image/png;base64,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', '', 'dfasdf', 'dfasdf', '2023-05-04T10:31', 'dfasdfads', 'fadsfads', 'data:image/png;base64,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', '', '2023-05-04T10:31'),
(10, 4, 'data:image/png;base64,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', '', 'dfasdfasd', 'dfasdf', '2023-05-04T10:36', 'dfasdfadsfasdfa', 'dfasd', 'data:image/png;base64,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', '', '2023-05-04T10:36'),
(11, 5, 'data:image/png;base64,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', '', 'dfasdfa', 'dfasdfa', '2023-05-04T10:43', 'dfadsfadsf', 'dfasdfadsf', 'data:image/png;base64,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', '', '2023-05-04T10:43'),
(12, 6, '', 'signature.png', 'dfasdfasd', 'dfasdfadf', '2023-05-04T10:47', 'dfasdfasd', 'dfasdfadsfadfad', '', 'signature.png', '2023-05-04T10:47');

-- --------------------------------------------------------

--
-- Table structure for table `fwc_cra`
--

CREATE TABLE `fwc_cra` (
  `id` int(11) NOT NULL,
  `cra_proccessing_id` int(100) NOT NULL,
  `cra_legend_id` text NOT NULL,
  `cra_prvntv_ctrl` tinyint(1) DEFAULT NULL,
  `cra_jstify` text NOT NULL,
  `cra_food_safety_hazard` text NOT NULL,
  `cra_is_applied` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fwc_cra`
--

INSERT INTO `fwc_cra` (`id`, `cra_proccessing_id`, `cra_legend_id`, `cra_prvntv_ctrl`, `cra_jstify`, `cra_food_safety_hazard`, `cra_is_applied`) VALUES
(39, 17, '1', NULL, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(40, 18, '1', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(41, 19, '1', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(42, 20, '1', NULL, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(43, 21, '1', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(44, 22, '1', NULL, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(45, 23, '1', NULL, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(46, 24, '1', NULL, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(47, 25, '1', NULL, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(48, 17, '2', NULL, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(50, 17, '3', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(51, 18, '2', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(52, 18, '3', NULL, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(53, 20, '2', NULL, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(54, 20, '3', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(55, 19, '2', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(56, 19, '3', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(59, 22, '2', NULL, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(60, 22, '3', NULL, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(61, 21, '2', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(62, 21, '3', NULL, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(63, 23, '2', NULL, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(64, 25, '2', NULL, 'Clothing may contaminate exposed raw material.', 'Protective Clothing (Laboratory Coat, Gloves, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(65, 25, '3', NULL, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(66, 23, '3', NULL, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(67, 24, '2', NULL, 'The biological matter may come into contact with raw materials during processing.', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL),
(68, 24, '3', NULL, 'Chemicals from clothing may contaminate exposed processed raw materials', 'Protective Clothing (Uniforms, Laboratory Coat, Gloves, Apron, hair restraints, bump caps, eye protection, ear protection, shoes, and boots)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hc_log`
--

CREATE TABLE `hc_log` (
  `id` int(11) NOT NULL,
  `rep_date` date NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `observation` text NOT NULL,
  `commnt` text NOT NULL,
  `dr_work` date DEFAULT NULL,
  `diag_patogen` tinyint(1) NOT NULL,
  `f_diag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cra_legend`
--
ALTER TABLE `cra_legend`
  ADD PRIMARY KEY (`legend_id`);

--
-- Indexes for table `cra_proccesing_step`
--
ALTER TABLE `cra_proccesing_step`
  ADD PRIMARY KEY (`p_step_id`);

--
-- Indexes for table `cra_record`
--
ALTER TABLE `cra_record`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `cra_reviewer_sign`
--
ALTER TABLE `cra_reviewer_sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fwc_cra`
--
ALTER TABLE `fwc_cra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hc_log`
--
ALTER TABLE `hc_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cra_legend`
--
ALTER TABLE `cra_legend`
  MODIFY `legend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cra_proccesing_step`
--
ALTER TABLE `cra_proccesing_step`
  MODIFY `p_step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cra_record`
--
ALTER TABLE `cra_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `cra_reviewer_sign`
--
ALTER TABLE `cra_reviewer_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fwc_cra`
--
ALTER TABLE `fwc_cra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `hc_log`
--
ALTER TABLE `hc_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
