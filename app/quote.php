<?php
session_start();
$data = array();
parse_str(file_get_contents('php://input'), $data);
$_POST = array_merge($data, $_POST); // merge parsed form data with _POST session values
var_dump($GLOBALS);
echo
'<div><h4>Client Name: Client Name Auto Inputs Here {{formData.name}}</h4>
    <h4>{{formData.completionDate}}</h4>
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
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>All required infrastructure components, i.e.: GIGs, Test & Production Platforms</td>
        </tr>

        <tr>
            <td>Organization Configuration</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Configure Organization specific settings, logo, page titles, etc..</td>
        </tr>

        <tr>
            <td>Configure Connected Systems</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>15 minutes per system</td>
        </tr>

        <tr>
            <td>Document Configurations</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Document all server configuration settings</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>Total Cost Here</td>
            <td>Total Hours Here</td>
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
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>All Password Management Requirements will be defined and a design document will be generated</td>
        </tr>

        <tr>
            <td>Configuration</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Password Policies, Password System Groupings, Configuring Self-Registration / Self Claiming.</td>
        </tr>

        <tr>
            <td>Post Implementation Services</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Review system logging facilities for the purposes of troubleshooting, ensure system health and identify potential issues.</td>
        </tr>

        <tr>
            <td>Prod. Migration</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Migrate implemented solution into production</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Self-Service UI training to ensure a complete understanding of UI elements and functionality.</td>
        </tr>

        <tr>
            <td>Solution Documentation</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Document Solution specific password management configurations</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>Total Cost Here</td>
            <td>Total Hours Here</td>
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
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>All Provisioning Requirements will be defined and a design document will be generated.</td>
        </tr>

        <tr>
            <td>Configuration</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>All necessary product features will be configure to enable the required functionality.  The following provisioning process will be implemented to manage standard accounts and permissions of each provisioning target system: Add, Modify, Disable, Terminate.</td>
        </tr>

        <tr>
            <td>Post Implementation Services</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Review system logging facilities for the purposes of troubleshooting, ensure system health and identify potential issues.</td>
        </tr>

        <tr>
            <td>Prod. Migration</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Migrate implemented solution into production</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Self-Service UI training to ensure a complete understanding of UI elements and functionality.</td>
        </tr>

        <tr>
            <td>Solution Documentation</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Document Solution specific provisioning configurations</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>Total Cost Here</td>
            <td>Total Hours Here</td>
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
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>All HPAM Requirements will be defined and a design document will be generated.</td>
        </tr>

        <tr>
            <td>Configuration</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Configure HPAM Account Types, System Owners, HPAM Users.</td>
        </tr>

        <tr>
            <td>Post Implementation Services</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Review system logging facilities for the purposes of troubleshooting, ensure system health and identify potential issues.</td>
        </tr>

        <tr>
            <td>Prod. Migration</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Migrate implemented solution into production</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Self-Service UI training to ensure a complete understanding of UI elements and functionality.</td>
        </tr>

        <tr>
            <td>Solution Documentation</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Document Solution specific HPAM configurations</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>Total Cost Here</td>
            <td>Total Hours Here</td>
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
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>All Federation Requirements will be defined and a design document will be generated.</td>
        </tr>

        <tr>
            <td>Federation Installations (IdPs, SPs & DS)</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Installation of Federation IdPs, Shibboleth SPs and Discovery Services</td>
        </tr>

        <tr>
            <td>Configuration</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Configure IdP, SP Metadata and Attribute Management Processes.</td>
        </tr>

        <tr>
            <td>Post Implementation Services</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Review system logging facilities for the purposes of troubleshooting, ensure system health and identify potential issues.</td>
        </tr>

        <tr>
            <td>Prod. Migration</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Migrate implemented solution into production</td>
        </tr>

        <tr>
            <td>Configuration Overview</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Implementation overview for the purposes of maintaining and administering solution.</td>
        </tr>

        <tr>
            <td>Solution Documentation</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Document Solution specific Federation configurations</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>Total Cost Here</td>
            <td>Total Hours Here</td>
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
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td>Overview of the basic components and product functionality.</td>
        </tr>

        <tr>
            <td>Advanced Features and Concepts</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
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
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td></td>
        </tr>

        <tr>
            <td>Pin Reset UI Training (Train the Trainer)</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td></td>
        </tr>

        <tr>
            <td>Help Desk UI Training (Train the Trainer)</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td></td>
        </tr>

        <tr>
            <td>Self Service Access Management UI Training (Train the Trainer)</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
            <td></td>
        </tr>

        <tr>
            <td>HPAM UI Training (Train the Trainer)</td>
            <td>Cost Here</td>
            <td>Total Hours Here</td>
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
            <td>Cost Here</td>
            <td>Total Hours Here</td>
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
            <td>Cost Here</td>
            <td>Hours Here</td>
            <td>Project Management Activities</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>Total Cost Here</td>
            <td>Total Hours Here</td>
            <td></td>
        </tr>

        <tr>
            <th><b>* Total Estimated Effort</b></th>
            <th>Total Cost</th>
            <th>Total Hours</th>
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
            <td>Cost Here</td>
            <td>Hours Here</td>
        </tr>

        <tr>
            <td>Installation</td>
            <td>Cost Here</td>
            <td>Hours Here</td>
        </tr>

        <tr>
            <td>Implementation</td>
            <td>Cost Here</td>
            <td>Hours Here</td>
        </tr>

        <tr>
            <td>Project Management</td>
            <td>Cost Here</td>
            <td>Hours Here</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>Cost Here</td>
            <td>Hours Here</td>
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
            <td>Cost to Client Here</td>
            <td>Cost Percent Here</td>
            <td>No Customization changes to Self-Service Uis.  Only configurable changes allowed.</td>
        </tr>

        <tr>
            <td>Password Management</td>
            <td>Cost to Client Here</td>
            <td>Cost Percent Here</td>
            <td>All Connectors available.  Does not accommodate for any necessary development time or effort.</td>
        </tr>

        <tr>
            <td>Provisioning</td>
            <td>Cost to Client Here</td>
            <td>Cost Percent Here</td>
            <td>Does not accommodate for any unforeseen issues or solution customizations not supported via the standard UIs or RDM workflows.</td>
        </tr>

        <tr>
            <td>HPAM</td>
            <td>Cost to Client Here</td>
            <td>Cost Percent Here</td>
            <td>All necessary policy / roles have been defined.</td>
        </tr>

        <tr>
            <td>Federation</td>
            <td>Cost to Client Here</td>
            <td>Cost Percent Here</td>
            <td>Will create standard application accounts.</td>
        </tr>

        <tr>
            <td>Training</td>
            <td>Cost to Client Here</td>
            <td>Cost Percent Here</td>
            <td>All Fischer Pre-Requisites have been satisfied prior to starting the implementation.</td>
        </tr>

        <tr>
            <td><b>Total</b></td>
            <td>Total Cost to Client Here</td>
            <td>Total Cost Percent Here</td>
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
            <td>{{formData.passwordManagement}}</td>
        </tr>

        <tr>
            <td>Provisioning</td>
            <td>{{formData.provisioning}}</td>
        </tr>

        <tr>
            <td>HPAM</td>
            <td>{{formData.hpam}}</td>
        </tr>

        <tr>
            <td>Federation</td>
            <td>{{formData.federation}}</td>
        </tr>

    </table>

</div>';
?>