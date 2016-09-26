<!DOCTYPE html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
</head>

    <body ng-app="productApp" ng-controller="TimeController" bgcolor='#f6f8f1' style='min-width: 100% !important; margin: 0; padding: 0;'>
		<div ng-controller="cartCtrl">

    	<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
    		   style='width: 100%; max-width: 600px; border-collapse: collapse;'>

		<!-- header mail -->
		  <tr style="background-color: #fcf4d1; width: 100%;">
			<td style="width: 157px;" align='left' border='0' cellpadding='0' cellspacing='0' bgcolor='#fcf4d1' height='110'>
				<img src='http://www.bakkerijvanderwesten.nl/test/img/mail-header-logo.png' height='100%' border='0' alt=''
					 style='height: auto; display: block;' />
			</td>
			<td style="width: 443px;" align='left' border='0' cellpadding='0' cellspacing='0' bgcolor='#fcf4d1' height='146'></td>
		  </tr>
        <!-- end header mail -->

		<!-- padding between content -->
		<tr>
			<td style='padding: 20px 30px 15px;'></td>
		<tr>
		<!-- end padding between content -->

		<!-- get user-name -->
		<tr>
		  <td style='width: 100%; color: #153643; font-family: sans-serif; font-size: 24px; line-height: 28px; font-weight: bold; padding: 0 25px;'>
			  Hallo, {{ Session::get('user_info')['naam'] }}!
		  </td>
		</tr>
		<!-- end get user-name -->

		<!-- padding between content -->
		<tr>
			<td style='padding: 20px 30px 15px;'></td>
		<tr>
		<!-- end padding between content -->

		<!-- intro text -->
		<tr>
			<td style='width: 100%; color: #153643; font-family: sans-serif; font-size: 16px; line-height: 22px;  padding: 0 25px;'>
			Namens Bakkerij van der Westen, bedanken we u hartelijk voor uw bestelling. Deze wordt in behandeling genomen. Hieronder ziet u een overzicht van uw bestelling.
			<br/>
			<br/>
			U heeft gekozen voor de volgende betaalmethode: <b>{{ Session::get('user_info')['betaalmethode'] }}</b>.<br>
			@if(Session::get('user_info')['betaalmethode'] == "Ideal") De betaling is voldaan. @endif
			@if(Session::get('user_info')['betaalmethode'] == "Contant") Zorg ervoor dat u bij de betaling contant kunt betalen. @endif
		  </td>
		</tr>
		<!-- end intro text -->

		<!-- padding between content -->
		<tr>
			<td style='padding: 20px 30px 15px;'></td>
		<tr>
		<!-- end padding between content -->

		<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
			   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
			<tr>
				<td style="padding: 10px 0px; width: 150px; font-weight: bold; color: #333; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #f4f4f4;">
					Afbeelding
				</td>
				<td style="padding: 10px 0px; width: 150px; font-weight: bold; color: #333; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #f4f4f4;">
					Naam
				</td>
				<td style="padding: 10px 0px; width: 150px; font-weight: bold; color: #333; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #f4f4f4;">
					Aantal
				</td>
				<td style="padding: 10px 0px; width: 150px; font-weight: bold; color: #333; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #f4f4f4;">
					Prijs
				</td>
			</tr>

			@for($i = 0; $i < count(json_decode(Session::get('user_info')['cart'])); $i++)

				<tr style="border-bottom: 1px solid #e5e5e5;">
					<td style="padding: 30px 0px; width: 150px; color: #333; font-size: 1rem; font-family: Bitter; text-align: center;">
						<img  width="50" height="50" src="{{ url(json_decode(Session::get('user_info')['cart'])[$i]->path) }}" alt="#" />
					</td>
					<td style="padding: 30px 0px; width: 150px; color: #333; font-size: 1rem; font-family: Bitter; text-align: center;">
						{{ json_decode(Session::get('user_info')['cart'])[$i]->name }}
					</td>
					<td style="padding: 30px 0px; width: 150px; color: #333; font-size: 1rem; font-family: Bitter; text-align: center;">
						{{ json_decode(Session::get('user_info')['cart'])[$i]->quantity }}
					</td>
					<td style="padding: 30px 0px; width: 150px; color: #333; font-size: 1rem; font-family: Bitter; text-align: center;">
						&euro; {{ number_format(json_decode(Session::get('user_info')['cart'])[$i]->totalprice, 2, '.', ',') }}
					</td>
				</tr>

			@endfor

		</table>

		<!-- padding between content -->
		<tr>
			<td style='padding: 20px 30px 15px;'></td>
		<tr>
		<!-- end padding between content -->

		<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
			   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
		   <tr>
			<td width='500' height='30' style='font-family:Open Sans,sans-serif; font-size: 18px; font-weight: bold; background-color: #fffde1; padding: 20px 10px; border: 1px solid #e5e5e5; text-align: center;'>
				Totaalprijs
			</td>
			<td width='100' height='30' style='font-family:Open Sans,sans-serif; font-size: 18px; font-weight: bold; background-color: #fffde1; padding: 20px 10px; border: 1px solid #e5e5e5; text-align: center;'>
				&euro; {{ number_format(Session::get('user_info')['totaalprijs'], 2, '.', ',')  }}
			</td>
		   </tr>
		</table>

		<!-- padding between content -->
		<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
			   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
			<tr>
				<td style='padding: 20px 30px 15px;'></td>
			<tr>
		</table>
		<!-- end padding between content -->

		<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
			   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
			<tr>
				<td style="padding: 10px 0px; width: 150px; font-weight: bold; color: #333; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #f4f4f4;">
					Opmerking
				</td>
			</tr>
			<tr style="border-bottom: 1px solid #e5e5e5;">
				<td style="padding: 30px 0px; width: 100%; color: #333; font-size: 1rem; font-family: Bitter; text-align: center;">
					Dit is uw opmerking...
				</td>
			</tr>
		</table>

		<!-- padding between content -->
		<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
			   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
		<tr>
			<td style='padding: 20px 30px 15px;'></td>
		<tr>
		</table>
		<!-- end padding between content -->

		<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
			   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
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

		  <tr style="border-bottom: 1px solid #e5e5e5;">
			<td style="padding: 30px 0px; width: 150px; color: #333; font-size: 1rem; font-family: Bitter; text-align: center;">
				{{ Session::get('user_info')['betaalmethode'] }}
			</td>
			<td style="padding: 30px 0px; width: 150px; color: #333; font-size: 1rem; font-family: Bitter; text-align: center;">
				{{ Session::get('user_info')['type'] }}
			</td>
			<td style="padding: 30px 0px; width: 150px; color: #333; font-size: 1rem; font-family: Bitter; text-align: center;">
				{{ Session::get('user_info')['datum'] }}
			</td>
			<td style="padding: 30px 0px; width: 150px; color: #333; font-size: 1rem; font-family: Bitter; text-align: center;">
				{{ Session::get('user_info')['tijd'] }}
			</td>
		  </tr>
		</table>

			<!-- padding between content -->
			<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
				   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
				<tr>
					<td style='padding: 20px 30px 15px;'></td>
				<tr>
			</table>
			<!-- end padding between content -->

			<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
				   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
			  <tr>
				<td align='center' style='padding: 20px 0 0;'>
					  <a href='https://www.facebook.com/pages/Bakkerij-Van-Der-Westen-Raamsdonk-En-Raamsdonksveer/1556579127963099?ref=ts&fref=ts'>
						<img src='http://www.bakkerijvanderwesten.nl/test/img/facebook.png' width='37' height='37' alt='Facebook' border='0' style='height: auto;' />
					  </a>
				</td>
			  </tr>
			</table>

			<table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
				   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
				<tr align='center' style='font-family: sans-serif; font-size: 12px; color: #000;'>
					<td>&copy; Bakkerij van der Westen, 2015</td>
				</tr>
			</table>

            </table>
		</div>
	</body>
</html>
