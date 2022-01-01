<?php

// It requires a csv file
// Change the array numbering of your column accordingly $contact[number] starting at 0
// first column  in a csv is the zero index and so on.

// Compatible with all Address Book
// Please report any bug via a issue in GitHUb

	$getContacts=fopen("file.csv","r");
	

	while (($contact = fgetcsv($getContacts, 10000, ",")) !== FALSE)
	{
		$name = $contact[0];
		$phone = $contact[1];
		// you can set other variables that you need

		// you can choose to append any keyword before the name of the contact, this will makeit easy to locate all newly importcontacts that statrts with this name. E:G KBTC Mathew Bee, KBTC Adeola etc
		// $fullname="Prefix -".$name;
		$fullname=$name;
		
		if(!empty($fullname)){

			//start writing to file
			$VCFContact = fopen("contact.vcf", "a");
			$txt="BEGIN:VCARD
			VERSION:2.1
			N:".$fullname.";;;;
			TEL;CELL:".$phone."
			CLASS:PRIVATE
			X-CLASS:PRIVATE
			END:VCARD".PHP_EOL.PHP_EOL;
			
			fwrite($VCFContact, $txt);
			fclose($VCFContact);
			
			echo "-". $fullname."-".$phone."- <br>";
		}
	}

?>