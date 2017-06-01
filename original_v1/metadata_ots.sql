-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-nf04.eigbox.net
-- Generation Time: May 26, 2017 at 11:53 AM
-- Server version: 5.6.32
-- PHP Version: 4.4.9
-- 
-- Database: `metadata`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `metadata_OTs`
-- 

CREATE TABLE `metadata_OTs` (
  `region` varchar(5) DEFAULT NULL,
  `organisation` varchar(45) DEFAULT NULL,
  `id_text` varchar(45) DEFAULT NULL,
  `uniqueResourceID` varchar(45) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `language` varchar(5) DEFAULT NULL,
  `abstract` text,
  `topicCategory` varchar(100) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `temporalExtent` varchar(35) DEFAULT NULL,
  `datasetReferenceDate` varchar(35) DEFAULT NULL,
  `lineage` text,
  `W_long` double DEFAULT NULL,
  `S_lat` double DEFAULT NULL,
  `E_long` double DEFAULT NULL,
  `N_lat` double DEFAULT NULL,
  `spatialReferenceSystem` varchar(35) DEFAULT NULL,
  `responsibleOrganisationName` text,
  `contactMailAddress` varchar(255) DEFAULT NULL,
  `responsiblePartyRole` text,
  `frequencyUpdate` varchar(45) DEFAULT NULL,
  `limitationsAccess` text,
  `useConstraints` text,
  `dataFormat` varchar(45) DEFAULT NULL,
  `accuracy` varchar(255) DEFAULT NULL,
  `metadataDate` date DEFAULT NULL,
  `metadataPointContact` varchar(255) DEFAULT NULL,
  `resourceType` varchar(45) DEFAULT NULL,
  `originalTitle` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL DEFAULT '0',
  `status` int(2) DEFAULT NULL,
  `X_location` double DEFAULT NULL,
  `Y_location` double DEFAULT NULL,
  PRIMARY KEY (`uniqueResourceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2083;
