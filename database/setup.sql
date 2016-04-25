-- Database for clean installation
-- Server version: 5.5.48
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_salesform`
--

-- --------------------------------------------------------

--
-- Table structure for table `Pricing`
--

CREATE TABLE IF NOT EXISTS `Pricing` (
  `id` int(11) NOT NULL DEFAULT '1',
  `servicesHourlyRate` double NOT NULL DEFAULT '125'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Pricing`
--

INSERT INTO `Pricing` (`id`, `servicesHourlyRate`) VALUES
  (1, 500.01);

-- --------------------------------------------------------

--
-- Table structure for table `Quotes`
--

CREATE TABLE IF NOT EXISTS `Quotes` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `clientName` varchar(255) NOT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `completionDate` varchar(255) DEFAULT NULL,
  `servicesHourlyRate` double DEFAULT NULL,
  `environmentTotalPlatformInstallHours` double DEFAULT NULL,
  `environmentOrganizationConfigurationHours` double DEFAULT NULL,
  `environmentConnectedSystemDefinitionsHours` double DEFAULT NULL,
  `environmentDocumentConfigurationsHours` double DEFAULT NULL,
  `environmentProjectManagementHours` double DEFAULT NULL,
  `totalEnvironmentHours` double DEFAULT NULL,
  `passwordWorkshopAndDesignDocHours` double DEFAULT NULL,
  `passwordConfigurationHours` double DEFAULT NULL,
  `passwordPostImplementationServicesHours` double DEFAULT NULL,
  `passwordProductionMigrationHours` double DEFAULT NULL,
  `passwordUiTrainingHours` double DEFAULT NULL,
  `passwordSolutionDocumentationHours` double DEFAULT NULL,
  `passwordProjectManagementHours` double DEFAULT NULL,
  `totalPasswordHours` double DEFAULT NULL,
  `provisioningWorkshopAndDesignDocHours` double DEFAULT NULL,
  `provisioningConfiguration` double DEFAULT NULL,
  `provisioningPostImplementationServicesHours` double DEFAULT NULL,
  `provisioningProductionMigrationHours` double DEFAULT NULL,
  `provisioningUiTrainingHours` double DEFAULT NULL,
  `provisioningSolutionDocumentationHours` double DEFAULT NULL,
  `provisioningProjectManagementHours` double DEFAULT NULL,
  `totalProvisioningHours` double DEFAULT NULL,
  `HPAMWorkshopAndDesignDocHours` double DEFAULT NULL,
  `HPAMOrgConfigurationHours` double DEFAULT NULL,
  `HPAMPostImplementationServicesHours` double DEFAULT NULL,
  `HPAMProductionMigrationHours` double DEFAULT NULL,
  `HPAMUiTrainingHours` double DEFAULT NULL,
  `HPAMSolutionDocumentationHours` double DEFAULT NULL,
  `HPAMProjectManagementHours` double DEFAULT NULL,
  `totalHPAMHours` double DEFAULT NULL,
  `federationWorkshopAndDesignDocHours` double DEFAULT NULL,
  `federationInstallationHours` double DEFAULT NULL,
  `federationTotalConfigurationHours` double DEFAULT NULL,
  `federationPostImplementationServicesHours` double DEFAULT NULL,
  `federationProductionMigration` double DEFAULT NULL,
  `federationConfigurationOverviewHours` double DEFAULT NULL,
  `federationSolutionDocumentationHours` double DEFAULT NULL,
  `federationProjectManagementHours` double DEFAULT NULL,
  `totalFederationHours` double DEFAULT NULL,
  `administrationBasicTrainingHours` double DEFAULT NULL,
  `administrationAdvancedTrainingTrainingHours` double DEFAULT NULL,
  `administrationKioskTrainingHours` double DEFAULT NULL,
  `administrationPinTrainingTrainingHours` double DEFAULT NULL,
  `administrationHelpDeskTrainingTrainingHours` double DEFAULT NULL,
  `administrationSelectServiceTrainingTrainingHours` double DEFAULT NULL,
  `administrationHPAMUiTrainingHours` double DEFAULT NULL,
  `administrationFederationConfigTrainingHours` double DEFAULT NULL,
  `administrationProjectManagementHours` double DEFAULT NULL,
  `totalAdministrationHours` double DEFAULT NULL,
  `totalAllHours` double DEFAULT NULL,
  `phaseAssessmentDesignHours` double DEFAULT NULL,
  `phaseInstallationHours` double DEFAULT NULL,
  `phaseImplementationHours` double DEFAULT NULL,
  `phaseProjectManagementHours` double DEFAULT NULL,
  `phaseTrainingHours` double DEFAULT NULL,
  `modulesPasswordManagement` varchar(3) DEFAULT NULL,
  `modulesProvisioning` varchar(3) DEFAULT NULL,
  `modulesHPAM` varchar(3) DEFAULT NULL,
  `modulesFederation` varchar(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `admin` varchar(5) NOT NULL DEFAULT 'false',
  `enabled` varchar(5) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `admin`, `enabled`) VALUES
  ('test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 'true', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Pricing`
--
ALTER TABLE `Pricing`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Quotes`
--
ALTER TABLE `Quotes`
ADD PRIMARY KEY (`id`),
ADD KEY `clientName` (`id`,`username`),
ADD KEY `username_idx` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Quotes`
--
ALTER TABLE `Quotes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Quotes`
--
ALTER TABLE `Quotes`
ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;