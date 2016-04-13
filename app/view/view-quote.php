<?php // this page displays an existing quote in the database
require('../db.php');
session_start();
if (!isset($_SESSION['username']) || !isset($_GET['quoteId'])) { // make sure user is logged in
    header("location:index.php");
    exit(6);
}
require("../status.php");
if ($_SESSION['enabled'] != 'true') { // non-enabled account tried to access page
    header('location:index.php');
    exit(5);
}
$quoteId = mysqli_real_escape_string($mysqli, $_GET['quoteId']);
$sql;
if ($_SESSION['admin'] == 'true') { // user accessing page is admin, has access to all quotes
    $sql = $dbh->prepare("
        SELECT
              *
        FROM
               Quotes
        WHERE
               id = :id
         ");
} else { // user accessing page is not admin, must have made quote to have access
    $sql = $dbh->prepare("
        SELECT
              *
        FROM
              Quotes
        WHERE
              id = :id
        AND
              username = '{$_SESSION['username']}'
        ");
}
$sql->bindParam(':id', $quoteId); // bind :id to ID provided in GET
$sql->execute();
if ($sql->rowCount() > 0) { // Check that a row was returned that matched GET request and user has permissions to access quote
   $existingQuoteData = $sql->fetch(PDO::FETCH_ASSOC);
        echo "<link rel=\"stylesheet\" href=\"../../assets/css/style.css\">
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/darkly/bootstrap.css\">
<div class=\"left-right-margin\"><h4>Client Name: " . $existingQuoteData['clientName'] . '</h4>
    <h4>' . $existingQuoteData['completionDate'] . '</h4>
    <table class="table table-bordered table-hover">
        <!----------ENVIRONMENT TASKS---------->
        <tr>
            <th>Environment Tasks</th>
            <th>Cost</th>
            <th>Hours</th>
            <th>Comments</th>
        </tr>

        <tr>
            <td>Platform Install</td>
            <td>' . '$' . number_format(($existingQuoteData['environmentTotalPlatformInstallHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['environmentTotalPlatformInstallHours'], 2) . '</td>
            <td>All required infrastructure components, i.e.: GIGs, Test & Production Platforms</td>
        </tr>
        <tr>
            <td>Organization Configuration</td>
            <td>' . '$' . number_format(($existingQuoteData['environmentOrganizationConfigurationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['environmentOrganizationConfigurationHours'], 2) . '</td>
            <td>Configure Organization specific settings, logo, page titles, etc..</td>
        </tr>

        <tr>
            <td>Configure Connected Systems</td>
            <td>' . '$' . number_format(($existingQuoteData['environmentConnectedSystemDefinitionsHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['environmentConnectedSystemDefinitionsHours'], 2) . '</td>
            <td>15 minutes per system</td>
        </tr>

        <tr>
            <td>Document Configurations</td>
            <td>' . '$' . number_format(($existingQuoteData['environmentDocumentConfigurationsHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['environmentDocumentConfigurationsHours'], 2) . '</td>
            <td>Document all server configuration settings</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>' . '$' . number_format(($existingQuoteData['environmentProjectManagementHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['environmentProjectManagementHours'], 2) . '</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>' . '$' . number_format(($existingQuoteData['totalEnvironmentHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['totalEnvironmentHours'], 2) . '</td>
            <td></td>
        </tr>

        <!----------PASSWORD MANAGEMENT TASKS---------->
        <tr>
            <th>Password Management Tasks</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <tr>
            <td>Workshop & Design Doc</td>
            <td>' . '$' . number_format(($existingQuoteData['passwordWorkshopAndDesignDocHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['passwordWorkshopAndDesignDocHours'], 2) . '</td>
            <td>All Password Management Requirements will be defined and a design document will be generated</td>
        </tr>

        <tr>
            <td>Configuration</td>
            <td>' . '$' . number_format(($existingQuoteData['passwordConfigurationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['passwordConfigurationHours'], 2) . '</td>
            <td>Password Policies, Password System Groupings, Configuring Self-Registration / Self Claiming.</td>
        </tr>

        <tr>
            <td>Post Implementation Services</td>
            <td>' . '$' . number_format(($existingQuoteData['passwordPostImplementationServicesHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['passwordPostImplementationServicesHours'], 2) . '</td>
            <td>Review system logging facilities for the purposes of troubleshooting, ensure system health and identify potential issues.</td>
        </tr>

        <tr>
            <td>Prod. Migration</td>
            <td>' . '$' . number_format(($existingQuoteData['passwordProductionMigrationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['passwordProductionMigrationHours'], 2) . '</td>
            <td>Migrate implemented solution into production</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>' . '$' . number_format(($existingQuoteData['passwordUiTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['passwordUiTrainingHours'], 2) . '</td>
            <td>Self-Service UI training to ensure a complete understanding of UI elements and functionality.</td>
        </tr>

        <tr>
            <td>Solution Documentation</td>
            <td>' . '$' . number_format(($existingQuoteData['passwordSolutionDocumentationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['passwordSolutionDocumentationHours'], 2) . '</td>
            <td>Document Solution specific password management configurations</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>' . '$' . number_format(($existingQuoteData['passwordProjectManagementHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['passwordProjectManagementHours'], 2) . '</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>' . '$' . number_format(($existingQuoteData['totalPasswordHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['totalPasswordHours'], 2) . '</td>
            <td></td>
        </tr>

        <!----------PROVISIONING TASKS---------->
        <tr>
            <th>Provisioning Tasks</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <tr>
            <td>Workshop & Design Doc</td>
            <td>' . '$' . number_format(($existingQuoteData['provisioningWorkshopAndDesignDocHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['provisioningWorkshopAndDesignDocHours'], 2) . '</td>
            <td>All Provisioning Requirements will be defined and a design document will be generated.</td>
        </tr>

        <tr>
            <td>Configuration</td>
            <td>' . '$' . number_format(($existingQuoteData['provisioningConfiguration'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['provisioningConfiguration'], 2) . '</td>
            <td>All necessary product features will be configure to enable the required functionality.  The following provisioning process will be implemented to manage standard accounts and permissions of each provisioning target system: Add, Modify, Disable, Terminate.</td>
        </tr>

        <tr>
            <td>Post Implementation Services</td>
            <td>' . '$' . number_format(($existingQuoteData['provisioningPostImplementationServicesHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['provisioningPostImplementationServicesHours'], 2) . '</td>
            <td>Review system logging facilities for the purposes of troubleshooting, ensure system health and identify potential issues.</td>
        </tr>

        <tr>
            <td>Prod. Migration</td>
            <td>' . '$' . number_format(($existingQuoteData['provisioningProductionMigrationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['provisioningProductionMigrationHours'], 2) . '</td>
            <td>Migrate implemented solution into production</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>' . '$' . number_format(($existingQuoteData['provisioningUiTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['provisioningUiTrainingHours'], 2) . '</td>
            <td>Self-Service UI training to ensure a complete understanding of UI elements and functionality.</td>
        </tr>

        <tr>
            <td>Solution Documentation</td>
            <td>' . '$' . number_format(($existingQuoteData['provisioningSolutionDocumentationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['provisioningSolutionDocumentationHours'], 2) . '</td>
            <td>Document Solution specific provisioning configurations</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>' . '$' . number_format(($existingQuoteData['provisioningProjectManagementHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['provisioningProjectManagementHours'], 2) . '</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>' . '$' . number_format(($existingQuoteData['totalProvisioningHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['totalProvisioningHours'], 2) . '</td>
            <td></td>
        </tr>

        <!----------HPAM TASKS---------->
        <tr>
            <th>HPAM Tasks</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <tr>
            <td>Workshop & Design Doc</td>
            <td>' . '$' . number_format(($existingQuoteData['HPAMWorkshopAndDesignDocHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['HPAMWorkshopAndDesignDocHours'], 2) . '</td>
            <td>All HPAM Requirements will be defined and a design document will be generated.</td>
        </tr>

        <tr>
            <td>Configuration</td>
            <td>' . '$' . number_format(($existingQuoteData['HPAMOrgConfigurationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['HPAMOrgConfigurationHours'], 2) . '</td>
            <td>Configure HPAM Account Types, System Owners, HPAM Users.</td>
        </tr>

        <tr>
            <td>Post Implementation Services</td>
            <td>' . '$' . number_format(($existingQuoteData['HPAMPostImplementationServicesHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['HPAMPostImplementationServicesHours'], 2) . '</td>
            <td>Review system logging facilities for the purposes of troubleshooting, ensure system health and identify potential issues.</td>
        </tr>

        <tr>
            <td>Prod. Migration</td>
            <td>' . '$' . number_format(($existingQuoteData['HPAMProductionMigrationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['HPAMProductionMigrationHours'], 2) . '</td>
            <td>Migrate implemented solution into production</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>' . '$' . number_format(($existingQuoteData['HPAMUiTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['HPAMUiTrainingHours'], 2) . '</td>
            <td>Self-Service UI training to ensure a complete understanding of UI elements and functionality.</td>
        </tr>

        <tr>
            <td>Solution Documentation</td>
            <td>' . '$' . number_format(($existingQuoteData['HPAMSolutionDocumentationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['HPAMSolutionDocumentationHours'], 2) . '</td>
            <td>Document Solution specific HPAM configurations</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>' . '$' . number_format(($existingQuoteData['HPAMProjectManagementHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['HPAMProjectManagementHours'], 2) . '</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>' . '$' . number_format(($existingQuoteData['totalHPAMHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['totalHPAMHours'], 2) . '</td>
            <td></td>
        </tr>

        <!----------FEDERATION TASKS---------->
        <tr>
            <th>Federation Tasks</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <tr>
            <td>Workshop & Design Doc</td>
            <td>' . '$' . number_format(($existingQuoteData['federationWorkshopAndDesignDocHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['federationWorkshopAndDesignDocHours'], 2) . '</td>
            <td>All Federation Requirements will be defined and a design document will be generated.</td>
        </tr>

        <tr>
            <td>Federation Installations (IdPs, SPs & DS)</td>
            <td>' . '$' . number_format(($existingQuoteData['federationInstallationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['federationInstallationHours'], 2) . '</td>
            <td>Installation of Federation IdPs, Shibboleth SPs and Discovery Services</td>
        </tr>

        <tr>
            <td>Configuration</td>
            <td>' . '$' . number_format(($existingQuoteData['federationTotalConfigurationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['federationTotalConfigurationHours'], 2) . '</td>
            <td>Configure IdP, SP Metadata and Attribute Management Processes.</td>
        </tr>

        <tr>
            <td>Post Implementation Services</td>
            <td>' . '$' . number_format(($existingQuoteData['federationPostImplementationServicesHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['federationPostImplementationServicesHours'], 2) . '</td>
            <td>Review system logging facilities for the purposes of troubleshooting, ensure system health and identify potential issues.</td>
        </tr>

        <tr>
            <td>Prod. Migration</td>
            <td>' . '$' . number_format(($existingQuoteData['federationProductionMigration'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['federationProductionMigration'], 2) . '</td>
            <td>Migrate implemented solution into production</td>
        </tr>

        <tr>
            <td>Configuration Overview</td>
            <td>' . '$' . number_format(($existingQuoteData['federationConfigurationOverviewHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['federationConfigurationOverviewHours'], 2) . '</td>
            <td>Implementation overview for the purposes of maintaining and administering solution.</td>
        </tr>

        <tr>
            <td>Solution Documentation</td>
            <td>' . '$' . number_format($existingQuoteData['federationSolutionDocumentationHours'] * $existingQuoteData['servicesHourlyRate'], 2) . '</td>
            <td>' . number_format($existingQuoteData['federationSolutionDocumentationHours'], 2) . '</td>
            <td>Document Solution specific Federation configurations</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>' . '$' . number_format(($existingQuoteData['federationProjectManagementHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['federationProjectManagementHours'], 2) . '</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>' . '$' . number_format(($existingQuoteData['totalFederationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['totalFederationHours'], 2) . '</td>
            <td></td>
        </tr>

        <!----------ADMINISTRATION AND IMPLEMENTATION TRAINING---------->
        <tr>
            <th>Administration and Implementation Training</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <tr>
            <td>Basic Overview</td>
            <td>' . '$' . number_format(($existingQuoteData['administrationBasicTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['administrationBasicTrainingHours'], 2) . '</td>
            <td>Overview of the basic components and product functionality.</td>
        </tr>

        <tr>
            <td>Advanced Features and Concepts</td>
            <td>' . '$' . number_format(($existingQuoteData['administrationAdvancedTrainingTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['administrationAdvancedTrainingTrainingHours'], 2) . '</td>
            <td>Overview of the advanced features of the product suite, IE: Account Matching, HPAM, Workflow Design and Best Practices, etc..  Will be modified to meet the specific features that are utilized during the implementation of the above solution.</td>
        </tr>

        <tr>
            <td><b>IaaS Training</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>Kiosk UI Training (Train the Trainer)</td>
            <td>' . '$' . number_format(($existingQuoteData['administrationKioskTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['administrationKioskTrainingHours'], 2) . '</td>
            <td></td>
        </tr>

        <tr>
            <td>Pin Reset UI Training (Train the Trainer)</td>
            <td>' . '$' . number_format(($existingQuoteData['administrationPinTrainingTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['administrationPinTrainingTrainingHours'], 2) . '</td>
            <td></td>
        </tr>

        <tr>
            <td>Help Desk UI Training (Train the Trainer)</td>
            <td>' . '$' . number_format(($existingQuoteData['administrationHelpDeskTrainingTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['administrationHelpDeskTrainingTrainingHours'], 2) . '</td>
            <td></td>
        </tr>

        <tr>
            <td>Self Service Access Management UI Training (Train the Trainer)</td>
            <td>' . '$' . number_format(($existingQuoteData['administrationSelectServiceTrainingTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['administrationSelectServiceTrainingTrainingHours'], 2) . '</td>
            <td></td>
        </tr>

        <tr>
            <td>HPAM UI Training (Train the Trainer)</td>
            <td>' . '$' . number_format(($existingQuoteData['administrationHPAMUiTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['administrationHPAMUiTrainingHours'], 2) . '</td>
            <td></td>
        </tr>

        <tr>
            <td><b>Federation Training</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>Federation Configuration Training</td>
            <td>' . '$' . number_format(($existingQuoteData['administrationFederationConfigTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['administrationFederationConfigTrainingHours'], 2) . '</td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>' . '$' . number_format(($existingQuoteData['administrationProjectManagementHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['administrationProjectManagementHours'], 2) . '</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>' . '$' . number_format(($existingQuoteData['totalAdministrationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['totalAdministrationHours'], 2) . '</td>
            <td></td>
        </tr>

        <tr>
            <th><b>* Total Estimated Effort</b></th>
            <th>' . '$' . number_format(($existingQuoteData['totalAllHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</th>
            <th>' . number_format($existingQuoteData['totalAllHours'], 2) . '</th>
            <th></th>
        </tr>

    </table>

    <br />

    <!----------PHASE TABLE---------->
    <table class="table table-bordered table-hover">

        <tr>
            <th>Phase</th>
            <th>Cost</th>
            <th>Hours</th>
        </tr>

        <tr>
            <td>Assessment/Design (Workshop)</td>
            <td>' . '$' . number_format(($existingQuoteData['phaseAssessmentDesignHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['phaseAssessmentDesignHours'], 2) . '</td>
        </tr>

        <tr>
            <td>Installation</td>
            <td>' . '$' . number_format(($existingQuoteData['phaseInstallationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['phaseInstallationHours'], 2) . '</td>
        </tr>

        <tr>
            <td>Implementation</td>
            <td>' . '$' . number_format(($existingQuoteData['phaseImplementationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['phaseImplementationHours'], 2) . '</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>' . '$' . number_format(($existingQuoteData['phaseProjectManagementHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['phaseProjectManagementHours'], 2) . '</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>' . '$' . number_format(($existingQuoteData['phaseTrainingHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . number_format($existingQuoteData['phaseTrainingHours'], 2) . '</td>
        </tr>

    </table>

    <br />

    <!----------TOTALS TABLE---------->
    <table class="table table-bordered table-hover">

        <tr>
            <th>Totals</th>
            <th>Cost to Client</th>
            <th>Cost Percent</th>
            <th>* Assumptions</th>
        </tr>

        <tr>
            <td>Environment</td>
            <td>' . '$' . number_format(($existingQuoteData['totalEnvironmentHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . (number_format(($existingQuoteData['totalEnvironmentHours'] / $existingQuoteData['totalAllHours']), 2) * 100) . '%' . '</td>
            <td>No Customization changes to Self-Service Uis.  Only configurable changes allowed.</td>
        </tr>

        <tr>
            <td>Password Management</td>
            <td>' . '$' . number_format(($existingQuoteData['totalPasswordHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . (number_format(($existingQuoteData['totalPasswordHours'] / $existingQuoteData['totalAllHours']), 2) * 100) . '%' . '</td>
            <td>All Connectors available.  Does not accommodate for any necessary development time or effort.</td>
        </tr>

        <tr>
            <td>Provisioning</td>
            <td>' . '$' . number_format(($existingQuoteData['totalProvisioningHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . (number_format(($existingQuoteData['totalProvisioningHours'] / $existingQuoteData['totalAllHours']), 2) * 100) . '%' . '</td>
            <td>Does not accommodate for any unforeseen issues or solution customizations not supported via the standard UIs or RDM workflows.</td>
        </tr>

        <tr>
            <td>HPAM</td>
            <td>' . '$' . number_format(($existingQuoteData['totalHPAMHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . (number_format(($existingQuoteData['totalHPAMHours'] / $existingQuoteData['totalAllHours']), 2) * 100) . '%' . '</td>
            <td>All necessary policy / roles have been defined.</td>
        </tr>

        <tr>
            <td>Federation</td>
            <td>' . '$' . number_format(($existingQuoteData['totalFederationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . (number_format(($existingQuoteData['totalFederationHours'] / $existingQuoteData['totalAllHours']), 2) * 100) . '%' . '</td>
            <td>Will create standard application accounts.</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>' . '$' . number_format(($existingQuoteData['totalAdministrationHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . (number_format(($existingQuoteData['totalAdministrationHours'] / $existingQuoteData['totalAllHours']), 2) * 100) . '%' . '</td>
            <td>All Fischer Pre-Requisites have been satisfied prior to starting the implementation.</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>' . '$' . number_format(($existingQuoteData['totalAllHours'] * $existingQuoteData['servicesHourlyRate']), 2) . '</td>
            <td>' . (number_format(($existingQuoteData['totalAllHours'] / $existingQuoteData['totalAllHours']), 2) * 100) . '%' . '</td>
            <td>The effort required to load legacy account information is out of scope for this effort and will need to be estimated separately.</td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>All workshops will be held onsite and design documents will be developed remotely.</td>
        </tr>

    </table>

    <br />

    <!----------MODULES LICENSED TABLE---------->
    <table class="table table-bordered table-hover">

        <tr>
            <th>Modules</th>
            <th>Licensed</th>
        </tr>

        <tr>
            <td>Password Management</td>
            <td>' . $existingQuoteData['modulesPasswordManagement'] . '</td>
        </tr>

        <tr>
            <td>Provisioning</td>
            <td>' . $existingQuoteData['modulesProvisioning'] . '</td>
        </tr>

        <tr>
            <td>HPAM</td>
            <td>' . $existingQuoteData['modulesHPAM'] . '</td>
        </tr>

        <tr>
            <td>Federation</td>
            <td>' . $existingQuoteData['modulesFederation'] . '</td>
        </tr>

    </table>

</div>';
} else {
            echo '<script type="text/javascript">
        alert ("Invalid QuoteID specified");
        window.location.href="index.php#/search-quote";
</script>';
}
?>