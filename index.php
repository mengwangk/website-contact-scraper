#!/usr/bin/php


<?php

// Run as command line
// http://php.net/manual/en/install.windows.legacy.index.php#install.windows.legacy.commandline

// Enable mysql module
// https://stackoverflow.com/questions/5121360/command-line-php-mysql-connect-error

$DB_USER =  'h3o';
$DB_PASSWORD = 'Money123';
$DB_HOST = 'localhost';
$DB_NAME = 'scrap';
$dbc = mysqli_connect ($DB_HOST, $DB_USER, $DB_PASSWORD) or $error = mysqli_error($dbc);
mysqli_select_db($dbc, $DB_NAME) or $error = mysqli_error($dbc);
mysqli_query($dbc, "SET NAMES `utf8`") or $error = mysqli_error($dbc);
//if ($error){ 
//    die($error);
//}

include('email.scraper.php');

$new = new scraper($dbc);
// Start Path can be empty, which will be extracted from the start URL
$new->setStartPath();
//$new->setStartPath('http://www.dzone.com');
//$new->startURL('http://www.mybizlink.com/index.asp?pageid=29');
//$new->startURL('http://www.mybizlink.com/DirectoryDetails.asp?pageid=29&catid=38&dirid=808&cn=Federal-Agricultural-Marketing-Authority-(FAMA)');
$new->startURL('http://www.mybizlink.com/directory.asp?pageid=29&catid=44&cn=Banks');
$new->startScraping();
?>
