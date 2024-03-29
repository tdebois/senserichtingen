<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2012 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2012 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.8, 2012-10-12
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once '../Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

include_once("../../include/connectie.php");
		
		$teller = 0;
		// gegevens uit het andere form inlezen	
		$queryrichting = "SELECT * FROM tblrichtingen ORDER BY RichtingID";
				  
		$resultrichting = mysql_query($queryrichting)
		or die(mysql_error());

		
		while($row = mysql_fetch_array($resultrichting))
		{
			$teller++;
			$richting =$row['Richting'];
			$richtingID=$row['RichtingID'];
			
			// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $teller , $richting);
			
			$objPHPExcel->getActiveSheet()->getStyle('A' . $teller )->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A' . $teller )->getFont()->setSize(16);
			
			$queryrichtingperpersoon = "SELECT tblpersonen.*, tblrichtperpersoon.* FROM tblpersonen 
								INNER JOIN tblrichtperpersoon 
				  				ON  tblpersonen.PersoonID = tblrichtperpersoon.PersoonID
								WHERE tblrichtperpersoon.RichtingID=" . $richtingID;
				  
		$resultrichtingperpersoon = mysql_query($queryrichtingperpersoon)
		or die(mysql_error());

		if(isset($richtingID)){
			$teller++;
			
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $teller , 'PersoonID')
            ->setCellValue('B' . $teller, 'Voornaam: ' )
            ->setCellValue('C'. $teller, 'Familienaam: ')
			->setCellValue('D'. $teller, 'Straat: ')
            ->setCellValue('E'. $teller, 'Nummer: ')
			->setCellValue('F'. $teller, 'Bus: ' )
            ->setCellValue('G'. $teller, 'Postcode: ')
			->setCellValue('H'. $teller, 'Gemeente: ')
            ->setCellValue('I'. $teller, 'Telefoon: ')
			->setCellValue('J'. $teller, 'E-mail: ');
			}
		
		while($row = mysql_fetch_array($resultrichtingperpersoon))
		{
			$teller++;
			$voornaam =$row['Voornaam'];
			$familienaam =$row['Familienaam'];
			$straat =$row['Straat'];
			$nummer =$row['Nummer'];
			$bus =$row['Bus'];
			$postcode =$row['Postcode'];
			$gemeente =$row['Gemeente'];
			$telefoon =$row['Telefoon'];
			$email =$row['Email'];
			$persoonID =$row['PersoonID'];
			
			// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $teller , $persoonID)
			->setCellValue('B' . $teller, $voornaam)
            ->setCellValue('C'. $teller, $familienaam)
			->setCellValue('D'. $teller, $straat)
            ->setCellValue('E'. $teller, $nummer)
			->setCellValue('F'. $teller, $bus)
            ->setCellValue('G'. $teller, $postcode)
			->setCellValue('H'. $teller, $gemeente)
            ->setCellValue('I'. $teller, $telefoon)
			->setCellValue('J'. $teller, $email);
			


		}
		}
		


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="01simple.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
