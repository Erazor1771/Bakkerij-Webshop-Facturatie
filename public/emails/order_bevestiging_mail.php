<?php

$to = 'larsmertens_webdesign@hotmail.com';
$subject = "Order Bevestiging";

$message = "
	<!DOCTYPE html ng-app='productApp'>

	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>Order Bevestiging</title>
    </head>

    <body ng-controller='timeCtrl' bgcolor='#f6f8f1' style='min-width: 100% !important; margin: 0; padding: 0;'>

    	<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
    		   style='width: 100%; max-width: 600px; border-collapse: collapse;'>

		  <tr>
			  <td bgcolor='#fcf4d1' style='padding: 0px 30px 0px 0px;'></td>
		  </tr>

          <table width='157' align='left' border='0' cellpadding='0' cellspacing='0'>
			  <tr>
			  	<td height='110'>
					<img src='http://www.bakkerijvanderwesten.nl/test/img/mail-header-logo.png' width='157' height='100%' border='0' alt=''
						 style='height: auto; display: block;' />
          		</td>
            </tr>
          </table>

		  <table width='100%' border='0' cellspacing='0' cellpadding='0'>

					<tr>
						  <td style='width: 100%; color: #153643; font-family: sans-serif; font-size: 24px; line-height: 28px; font-weight: bold; padding: 0 0 15px;'>
								Hallo, <% personName %>!
						  </td>
					</tr>

					<tr>
						<td style='color: #153643; font-family: sans-serif; font-size: 16px; line-height: 22px;'>
						Namens Bakkerij van der Westen, bedanken we u hartelijk voor uw bestelling. Deze wordt in behandeling genomen. Hieronder ziet u een overzicht van uw bestelling.
						<br/>
						<br/>
						U heeft gekozen voor |betaalkeuze|. Zorg ervoor dat u bij de betaling contant kunt betalen.
					  </td>
					</tr>

				  <tr>
					<td style='border-bottom-width: 1px; border-bottom-color: #f2eeed; border-bottom-style: solid; padding: 30px;'></td>
				  </tr>

				  <tr>
					<td height='60' width='25%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Afbeelding
					</td>
					<td height='60' width='25%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Naam
					</td>
					<td height='60' width='25%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Aantal
					</td>
					<td height='60' width='25%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Prijs
					</td>
				  </tr>

				  <tr>
					<td style='border-bottom-width: 1px; border-bottom-color: #f2eeed; border-bottom-style: solid; padding: 30px;'></td>
				  </tr>

				  <tr>
					<td width='530' height='20' style='background-color: #f4f4f4'></td>
					<td width='50' height='20'></td>
					<td height='20'>
						<img class='fix' src='http://www.bakkerijvanderwesten.nl/test/img/plusje.png' width='20' height='20' border='0' alt='' style='height: auto; block;' border='0' />
					</td>
				  </tr>

				  <tr>
					<td style='border-bottom-width: 1px; border-bottom-color: #f2eeed; border-bottom-style: solid; padding: 30px;'></td>
				  </tr>

				   <tr>
					<td width='500' height='60' style='font-family:Open Sans,sans-serif; font-size: 18px; font-weight: bold; background-color: #fffde1; padding: 20px 100px 20px 100px; border: 1px solid #e5e5e5; text-align: center;'>
						Totaalprijs
					</td>
					<td width='100' height='60' style='font-family:Open Sans,sans-serif; font-size: 18px; font-weight: bold; background-color: #fffde1; padding: 20px 20px 20px 20px; border: 1px solid #e5e5e5; text-align: center;'>
						<% getCartPrice() %>
					</td>
				   </tr>

				  <tr>
					<td style='border-bottom-width: 1px; border-bottom-color: #f2eeed; border-bottom-style: solid; padding: 30px;'></td>
				  </tr>

				  <tr>
					<td height='60' width='25%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Productnaam
					</td>
					<td height='60' width='75%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Opmerking
					</td>
				  </tr>

				  <tr>
					<td style='border-bottom-width: 1px; border-bottom-color: #f2eeed; border-bottom-style: solid; padding: 30px;'></td>
				  </tr>

				  <tr>
					<td height='60' width='25%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Betaalmiddel
					</td>
					<td height='60' width='25%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Ophalen / Bezorgen
					</td>
					<td height='60' width='25%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Datum
					</td>
					<td height='60' width='25%' border-bottom='1px solid #e5e5e5' style='padding: 5px 5px 5px 5px; color: #333; background-color: #f4f4f4; font-family: Bitter,sans-serif; font-size: 18px; text-align: center; font-weight: bold; line-height: 22px;'>
						Tijd
					</td>
				  </tr>

				  <tr>
					<td bgcolor='#44525f' style='padding: 20px 30px 15px;'></td>
				  <tr>

				  <tr align='center' style='font-family: sans-serif; font-size: 14px; color: #ffffff;'>
					<td>® Bakkerij van der Westen, 2015</td>
				  </tr>

				  <tr>
					<td align='center' style='padding: 20px 0 0;'>
						  <a href='https://www.facebook.com/pages/Bakkerij-Van-Der-Westen-Raamsdonk-En-Raamsdonksveer/1556579127963099?ref=ts&fref=ts'>
							<img src='http://www.bakkerijvanderwesten.nl/test/img/facebook.png' width='37' height='37' alt='Facebook' border='0' style='height: auto;' />
						  </a>
					</td>
				  </tr>
			 </table>
		</table>
	</body>
</html><!-- end mail -->
 ";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@bakkerijvanderwesten.nl>' . "\r\n";

mail($to,$subject,$message,$headers);