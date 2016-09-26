angular.module('timeCtrl', [])


    .controller('TimeController', function($scope, $http, Times) {

        // Variables
        $scope.dateChosen = '';
        $scope.timeChosen = '';
        $scope.bezorgMethode = '';
        $scope.customerData = '';
        $scope.voornaam = '';
        $scope.tussenvoegsel = '';
        $scope.achternaam = '';
        $scope.personName = '';
        $scope.straatnaamfactuur = '';
        $scope.huisnummerfactuur = '';
        $scope.woonplaatsfactuur = '';
        $scope.postcodefactuur = '';
        $scope.telefoonnummerfactuur = '';
        $scope.week = 0;
        $scope.location = '';
        $scope.type = '';
        $scope.today = '';
        $scope.previousBlock = '';

        // Get Customer Info
        Times.getCustomerInfo()
            .success(function (data) {
                $scope.customerData = data;

                angular.forEach(data, function(value, key) {

                        if (value.voornaam === undefined) {
                            $scope.voornaam = data.voornaam;
                            $scope.tussenvoegsel = data.tussenvoegsel;
                            $scope.achternaam = data.achternaam;
                            $scope.telefoonnummer = data.telefoonnummer;
                            $scope.straatnaamfactuur = data.factuurstraatnaam;
                            $scope.woonplaatsfactuur = data.factuurwoonplaats;
                            $scope.huisnummerfactuur = data.factuurhuisnummer;
                            $scope.postcodefactuur = data.factuurpostcode;
                        } else {
                            $scope.voornaam = value.voornaam;
                            $scope.tussenvoegsel = value.tussenvoegsel;
                            $scope.achternaam = value.achternaam;
                            $scope.straatnaamfactuur = value.factuurstraatnaam;
                            $scope.woonplaatsfactuur = value.factuurwoonplaats;
                            $scope.postcodefactuur = value.factuurpostcode;
                            $scope.telefoonnummer = value.telefoonnummer;
                            $scope.huisnummerfactuur = value.factuurhuisnummer;
                        }


                });

                $scope.generatePersonName($scope.voornaam, $scope.tussenvoegsel, $scope.achternaam);
            });

        $scope.generatePersonName = function($voornaam, $tussenvoegsel, $achternaam)
        {
            if($tussenvoegsel != ''){
                $scope.personName = $voornaam + ' ' + $tussenvoegsel + ' ' + $achternaam;
            } else if($tussenvoegsel == ''){
                $scope.personName = $voornaam + ' ' + $achternaam;
            }
            return $scope.personName;
        };

        $scope.generateDays = function(days_forward){

            var nr_of_days = $scope.week + days_forward;
            var date = moment();
            date.localeData('nl');
            date.add(nr_of_days, 'days');
            date = date.format("dddd");

            return date;

        };

        $scope.generateDates = function(days_forward){

            var nr_of_days = $scope.week + days_forward;
            var date = moment();
            date.add(nr_of_days, 'days');
            date = date.format("DD-MM-YYYY");

            return date;

        };

        $scope.generateTimes = function($location, $type, $today){

            Times.get($location, $type, $today)
                .success(function (data) {
                    $scope.times = data;
                });

        };

        $scope.loadTimeSchedule = function($location, $type, $today){

                // set values
                $scope.location = $location;
                $scope.type = $type;
                $scope.today = $today;

                // Show Timeschedule
                $scope.timeschedule = true;
                // Send request to load correct timeschedule...
                $scope.generateTimes($location, $type, $today);
                // Selected bezorgmethode
                $scope.bezorgMethode = $type + ' ' + $location;

        };

        $scope.loadWeekBefore = function()
        {
            $scope.week = $scope.week - 7;
            if($scope.week < 0){
                $scope.times = null;
            } else {
                $scope.loadTimeSchedule($scope.location, $scope.type, $scope.today);
            }

        };

        $scope.loadWeekAfter = function()
        {
            $scope.week = $scope.week + 7;
            if($scope.week < 0){
                $scope.times = null;
            } else {
                $scope.loadTimeSchedule($scope.location, $scope.type, $scope.today);
            }
        };

        $scope.postNL = function(){
            // TODO : NOT IMPLEMENTED YET
        };

        $scope.selectedTimeAndDate = function ($event, $time, $date) {

            // HIGHLIGHTING
            var button3 = angular.element('.button-3-series');
            button3.css('color', '#000');
            button3.css('background-color', '#e5e5e5');

            var elem = angular.element($event.currentTarget);
            elem.css('color', '#FFF');
            elem.css('background-color', '#c7387a');
            // END HIGHLIGHTING

            $scope.timeChosen = $time;
            $scope.dateChosen = $date;

            // HIDE THIS STEP
            $scope.timeschedule = false;

            // SHOW NEXT STEP
            $scope.keuze_overzicht = true;

        };

        $scope.loadLastStepOrder = function(){

            $scope.keuze_overzicht = false;
            $scope.keuze_betaal_overzicht = true;

        };

        $scope.previous = function(){

            $scope.timeschedule = false;

            if($scope.ophalen == true) {
                $scope.ophalen_selected = true;
            } else if($scope.bezorgen == true){
                $scope.bezorgen_selected = true;
            }

        };

    });
