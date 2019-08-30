<?php
//controleer of een veld ingevuld is
function isempty($val,$veld)
{
	global $message;
	
	if(empty($val))
	{
		$message[$veld]= ' *';	
	}
}

function ismail($email)
{
	global $message;
	
	//filter_validatie_email controleer of een e-mailadres valid is
	if(filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		//ok
		list($user,$domaine)=explode("@",$email,2);
			
		//checkdnsrr kijkt of domeinnaam wel degelijk bestaat en of ze even het juist type zijn
		if(!checkdnsrr($domaine,"MX")&& !checkdnsrr($domaine,"A"))
		{
			$message['mail']= ' E-mail is ok, maar domeinnaam niet.';	
		}
		
	}
	else 
	{
		//no
		$message['mail']= '#';
	}
}

function isnumeric($val,$veld,$verplicht)
{
	global $message;
	
	//als $verplicht 1 is dan controle uitvoeren of veld numeriek is
	if(!empty($val) || $verplicht!=0)
	{
	if(!(bool)preg_match('/^[-+]?[0-9]*.?[0-9]+$/', $val))
	{
		$message[$veld]= '~';	
	}
	}
}
function istext($val,$veld,$verplicht)
{
	global $message;
	
	//als $verplicht 1 is dan controle uitvoeren of veld numeriek is
	if(!empty($val) || $verplicht!=0)
	{
	if((bool)preg_match('/^[-+]?[0-9]*.?[0-9]+$/', $val))
	{
		$message[$veld]= '°';	
	}
	}
}

?>
