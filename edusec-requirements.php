<?php
/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
 *****************************************************************************************/

/**
 * Requirement checker for edusec and yii2 application script.
 */

$chekerPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'components';
$chkDbFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
require_once($chekerPath . DIRECTORY_SEPARATOR. 'EdusecRequirementChecker.php');
$requirementsChecker = new EdusecRequirementChecker();

$resultsData = $requirementsChecker->getResult(); 
$summary = $resultsData['summary'];
$requiredData = $resultsData['requirements'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>EduSec Application Requirement Checker</title>
    <link rel="shortcut icon" href="images/rudrasoftech_favicon.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="vendor/bower/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>EduSec Application Requirement Checker</h1>
    </div>
    <hr>

    <div class="content">
        <h3>Description</h3>
        <p>
        This script checks if your server configuration meets the requirements
        for running Yii/EduSec application.
        It checks if the server is running the right version of PHP,
        if appropriate PHP extensions have been loaded, and if php.ini file settings are correct.
        </p>
        <p>
        There are two kinds of requirements being checked. Mandatory requirements are those that have to be met
        to allow Yii to work as expected. There are also some optional requirements being checked which will
        show you a warning when they do not meet. You can use Yii framework without them but some specific
        functionality may be not available in this case.
        </p>

        <h3>Conclusion</h3>
        <?php if ($summary['errors'] > 0): ?>
            <div class="alert alert-danger">
                <strong>Unfortunately your server configuration does not satisfy the requirements by this application.<br>Please refer to the table below for detailed explanation.</strong>
		  <strong><br><br>Please fix following errors then install EduSec</strong>
            </div>
        <?php elseif ($summary['warnings'] > 0): ?>
            <div class="alert alert-info">
                <strong>Your server configuration satisfies the minimum requirements by this application.<br>Please pay attention to the warnings listed below and check if your application will use the corresponding features.</strong>
            </div>
        <?php else: ?>
            <div class="alert alert-success">
                <strong>Congratulations! Your server configuration satisfies all requirements.</strong>	
            </div>
        <?php endif; ?>

        <h3>Details
		<?php if(!file_exists($chkDbFile)) : ?>
		<?php $class = (($summary['errors'] > 0) ? "disabled" : ""); ?>
		<div class="pull-right"><a title="Install link" href="install.php" class="btn btn-primary <?php echo $class;?>" title="Install Button">Click here to install EduSec</a></div>
		<?php endif; ?>
	</h3>	
        <table class="table table-bordered">
            <tr><th>Name</th><th>Result</th><th>Required By</th><th>Memo/Details</th></tr>
            <?php foreach ($requiredData as $requirement): ?>	
            <tr class="<?php echo $requirement['condition'] ? 'success' : ($requirement['mandatory'] ? 'danger' : 'warning') ?>">
                <td>
                <?php echo $requirement['name'] ?>
                </td>
                <td>
                <span class="result"><?php echo $requirement['condition'] ? 'Passed' : ($requirement['mandatory'] ? 'Failed' : 'Warning') ?></span>
                </td>
                <td>
                <?php echo $requirement['by'] ?>
                </td>
                <td>
                <?php echo $requirement['memo'] ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>

    <hr>

    <div class="footer">
        <p>Server: <?php echo $requirementsChecker->getServerInfo() . ' ' . $requirementsChecker->getNowDate() ?></p>
        <p>Powered by <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a></p>
    </div>
</div>
</body>
</html>
