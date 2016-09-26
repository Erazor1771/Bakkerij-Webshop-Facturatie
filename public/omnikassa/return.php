<?php


	/*
		Verwerk de status rapportage/update van de Rabo OmniKassa
		Return URL / normalReturnUrl
	*/


	// Laad instellingen & bibliotheek
	require_once('settings.php');
	require_once('omnikassa.cls.5.php');


	// Controleer of de benodigde POST-data is ontvangen
	if(empty($_POST['Data']) || empty($_POST['Seal']))
	{
		$sHtml = '<p>Ongeldige Omnikassa Response.</p>';
	}
	else
	{
		$aSettings['security_key'] = '002020000000001_KEY1';
		$aSettings['security_key_version'] = '1';

		$oOmniKassa = new OmniKassa();
		$oOmniKassa->setSecurityKey($aSettings['security_key'], $aSettings['security_key_version']);

		$aOmniKassaResponse = $oOmniKassa->validate();

		if($aOmniKassaResponse && is_array($aOmniKassaResponse))
		{
			// De referentiecode die bij het starten van het betaalverzoek is opgegeven, belangrijk om in de 
			// database de bijbehorende bestelling op te zoeken.
			$sTransactionReference = $aOmniKassaResponse['transaction_reference']; 

			// De huidige status van de betaalverzoek. De ontvangen responseCode wordt door de bibliotheek
			// omgezet in de waarde SUCCESS, PENDING, CANCELLED, EXPIRED of FAILED.
			$sTransactionStatus = $aOmniKassaResponse['transaction_status']; 

			// Bij sommige betaalmethoden (zoals iDEAL) wordt deze waarde gevuld met het "authorisationId", 
			// dit is de door de iDEAL server toegewezen unieke TransactionID.
			$sTransactionId = $aOmniKassaResponse['transaction_id']; 

			// Het orderID (Alleen de karakters [a-zA-Z0-9] en gelimiteerd tot 32 karakters). 
			// Door de mutaties die soms plaats vinden in dit orderID is dit doorgaans GEEN goede 
			// waarde om de bestelling op te zoeken in de database.
			$sOrderId = $aOmniKassaResponse['order_id']; 





			// Zoek de order op d.m.v. de unieke $sTransactionReference
			// Houd er rekening mee dat de status mogelijk al is verwerkt door de "Report URL"
			// om te voorkomen dat het systeem denkt dat een order 2x is betaald.
			// 
			// Controleer daarom altijd of de status is veranderd t.o.v. de laatste status.
			// 
			// ... maatwerk ...





			// Verwerking van de normalReturnUrl opslaan in een log-bestand
			$sLogData = 'RETURN RECIEVED ON ' . date('d-m-Y, H:i:s') . "\r\n";
			$sLogData .= 'TRANSACTION_REFERENCE: ' . $sTransactionReference . "\r\n";
			$sLogData .= 'TRANSACTION_STATUS: ' . $sTransactionStatus . "\r\n";
			$sLogData .= 'TRANSACTION_ID: ' . $sTransactionId . "\r\n";
			$sLogData .= 'ORDER_ID: ' . $sOrderId . "\r\n\r\n\r\n";

			$sLogPath = dirname(__FILE__) . '/logs';
			$sLogFile = $sLogPath . '/' . $sTransactionReference . '.return.' . time() . '.log';

			if(is_dir($sLogPath) && is_writable($sLogPath))
			{
				@file_put_contents($sLogFile, $sLogData);
			}

			// Bepaal de transactie status, en bevestig deze aan de bezoeker
			if(strcmp($sTransactionStatus, 'SUCCESS') === 0)
			{
				require('helper.php');
			}
			elseif(strcmp($sTransactionStatus, 'PENDING') === 0)
			{
				require('helper.php');
			}
			elseif(strcmp($sTransactionStatus, 'CANCELLED') === 0)
			{
				require('helper.php');
			}
			elseif(strcmp($sTransactionStatus, 'EXPIRED') === 0)
			{
				require('helper.php');
			}
			else if(strcmp($sTransactionStatus, 'FAILURE') === 0)
			{
				require('helper.php');
			}
		}
		else
		{
			$sHtml = '<p>
						<br>
						<a href="' . htmlspecialchars($aSettings['website_url'] . '/start.php') . '">Nieuwe transactie starten.</a>
						</p>';
		}
	}

	echo $sHtml;

?>