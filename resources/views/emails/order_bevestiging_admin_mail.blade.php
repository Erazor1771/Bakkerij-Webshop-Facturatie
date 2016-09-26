<!DOCTYPE html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
</head>

<body ng-app="productApp" ng-controller="TimeController" bgcolor='#f6f8f1' style='min-width: 100% !important; margin: 0; padding: 0;'>
<div ng-controller="cartCtrl">

    <table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
           style='width: 100%; max-width: 600px; border-collapse: collapse;'>

        <!-- padding between content -->
        <tr>
            <td style='padding: 20px 30px 15px;'></td>
        <tr>
            <!-- end padding between content -->

            <!-- get user-name -->
        <tr>
            <td style='text-align: center; width: 100%; color: #000; font-family: sans-serif; font-size: 24px; line-height: 28px; font-weight: bold; padding: 0 25px;'>
                Onderstaande bestelling is gemaakt:
            </td>
        </tr>
        <!-- end get user-name -->

        <!-- padding between content -->
        <tr>
            <td style='padding: 20px 30px 15px;'></td>
        <tr>
            <!-- end padding between content -->


            <table bgcolor='#ffffff' align='center' cellpadding='0' cellspacing='0' border='0'
                   style='width: 100%; max-width: 600px; border-collapse: collapse;'>
                <tr>
                    <td style="padding: 10px 0px; width: 20%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Naam
                    </td>
                    <td style="padding: 10px 0px; width: 20%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Telefoonnummer
                    </td>
                    <td style="padding: 10px 0px; width: 20%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Woonplaats
                    </td>
                    <td style="padding: 10px 0px; width: 20%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Straat
                    </td>
                    <td style="padding: 10px 0px; width: 20%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Postcode
                    </td>
                </tr>

                <tr style="border-bottom: 1px solid #000;">
                    <td style="padding: 30px 10px; width: 20%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        {{ Session::get('user_info')['naam'] }}
                    </td>
                    <td style="padding: 30px 10px; width: 20%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        {{ Session::get('user_info')['telefoonnummer'] }}
                    </td>
                    <td style="padding: 30px 10px; width: 20%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        {{ Session::get('user_info')['factuurwoonplaats'] }}
                    </td>
                    <td style="padding: 30px 10px; width: 20%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        {{ Session::get('user_info')['factuurstraatnaam'] }} {{ Session::get('user_info')['factuurhuisnummer'] }}
                    </td>
                    <td style="padding: 30px 10px; width: 20%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        {{ Session::get('user_info')['factuurpostcode'] }}
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
                    <td style="padding: 10px 0px; width: 20%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Besteldatum
                    </td>
                    <td style="padding: 10px 0px; width: 20%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Tijd
                    </td>
                    <td style="padding: 10px 0px; width: 20%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Type
                    </td>
                    <td style="padding: 10px 0px; width: 20%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Betaalmethode
                    </td>
                </tr>

                <tr style="border-bottom: 1px solid #000;">
                    <td style="padding: 30px 10px; width: 20%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        {{ Session::get('user_info')['datum'] }}
                    </td>
                    <td style="padding: 30px 10px; width: 20%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        {{ Session::get('user_info')['tijd'] }}
                    </td>
                    <td style="padding: 30px 10px; width: 20%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        {{ Session::get('user_info')['type'] }}
                    </td>
                    <td style="padding: 30px 10px; width: 20%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        {{ Session::get('user_info')['betaalmethode'] }}
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
                    <td style="padding: 10px 0px; width: 150px; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Naam
                    </td>
                    <td style="padding: 10px 0px; width: 150px; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        P.P.E.
                    </td>
                    <td style="padding: 10px 0px; width: 150px; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Aantal
                    </td>
                    <td style="padding: 10px 0px; width: 150px; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Prijs
                    </td>
                </tr>

                @for($i = 0; $i < count(json_decode(Session::get('user_info')['cart'])); $i++)

                    <tr style="border-bottom: 1px solid #000;">
                        <td style="padding: 30px 0px; width: 150px; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                            {{ json_decode(Session::get('user_info')['cart'])[$i]->name }}
                        </td>
                        <td style="padding: 30px 0px; width: 150px; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                            &euro; {{ number_format(json_decode(Session::get('user_info')['cart'])[$i]->price, 2, '.', ',') }}
                        </td>
                        <td style="padding: 30px 0px; width: 150px; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                            {{ json_decode(Session::get('user_info')['cart'])[$i]->quantity }}
                        </td>
                        <td style="padding: 30px 0px; width: 150px; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                            &euro; {{ number_format(json_decode(Session::get('user_info')['cart'])[$i]->totalprice, 2, '.', ',') }}
                        </td>
                    </tr>

                @endfor

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
                    <td style="padding: 10px 0px; width: 50%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center;">

                    </td>
                    <td style="padding: 10px 0px; width: 50%; font-weight: bold; color: #fff; font-size: 1rem; font-family: Bitter; text-align: center; background-color: #000;">
                        Totaalprijs
                    </td>
                </tr>

                <tr">
                    <td style="padding: 30px 10px; width: 50%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">

                    </td>
                    <td style="padding: 30px 10px; width: 50%; color: #000; font-size: 1rem; font-family: Bitter; text-align: center;">
                        &euro; {{ number_format(Session::get('user_info')['totaalprijs'], 2, '.', ',') }}
                    </td>
                </tr>
            </table>


    </table>
</div>
</body>
</html>
