-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 11:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
(1, 'P', 'Clothing, Aprons, Physical LiLoos Thread, buttons, and Tears in dfadsClothing', '', 'test', 'test'),
(2, 'C', 'Cologne dfadfadfdfand Perf', '', 'test', 'test'),
(3, 'B', 'Soiled Clothing Possible Pet Hairs and/or Human Hair, Dandruff from Hair Falling on Clothing, Pockets can Trap Bacteria and Foreign Objects', '', 'test', 'test'),
(4, 'S', 'dfasdfasdfadfadsfadsfads', '', 'test', 'test');

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
(1, 'dfasdfads'),
(2, 'dfasdfadsf');

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

-- --------------------------------------------------------

--
-- Table structure for table `fwc_cra`
--

CREATE TABLE `fwc_cra` (
  `id` int(11) NOT NULL,
  `cra_proccessing_id` int(100) NOT NULL,
  `cra_legend_id` text NOT NULL,
  `cra_prvntv_ctrl` tinyint(1) NOT NULL,
  `cra_jstify` text NOT NULL,
  `cra_food_safety_hazard` text NOT NULL,
  `cra_is_applied` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fwc_cra`
--

INSERT INTO `fwc_cra` (`id`, `cra_proccessing_id`, `cra_legend_id`, `cra_prvntv_ctrl`, `cra_jstify`, `cra_food_safety_hazard`, `cra_is_applied`) VALUES
(2, 2, '1', 0, 'test', 'test', 0);

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
  MODIFY `p_step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cra_record`
--
ALTER TABLE `cra_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fwc_cra`
--
ALTER TABLE `fwc_cra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hc_log`
--
ALTER TABLE `hc_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
