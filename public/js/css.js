$( document ).ready(function() {

    $(".list-group-item").click(function() {

        var sub_list_item = $(this);
        var all_sub_list_items = $(".list-group-item");

        all_sub_list_items.removeClass("active-cat");
        all_sub_list_items.removeClass("yellow-background");
        all_sub_list_items.removeClass("green-background");
        all_sub_list_items.removeClass("grey-background");
        all_sub_list_items.removeClass("orange-background");
        all_sub_list_items.removeClass("pink-background");

        if($(this).hasClass("yellow-background-hover")){
            sub_list_item.addClass("yellow-background");
        } else if($(this).hasClass("green-background-hover")){
            sub_list_item.addClass("green-background");
        } else if($(this).hasClass("grey-background-hover")){
            sub_list_item.addClass("grey-background");
        } else if($(this).hasClass("orange-background-hover")){
            sub_list_item.addClass("orange-background");
        } else if($(this).hasClass("pink-background-hover")){
            sub_list_item.addClass("pink-background");
        } else {
            // something went wrong
        }

        sub_list_item.addClass("active-cat")

    });


    $(".accordion-categories a").click(function() {

        $('.collapse').on('show.bs.collapse', function () {
            $otherPanels = $(this).parents('.panel-group').siblings('.panel-group');
            $('.collapse',$otherPanels).removeClass('in');
        });

        var categorie = $(this);
        var categories = $(".accordion-categories a");
        var collapse = $(".collapse");
        var first_item_sub_cat = $(".list-group-item:first-child");

        categories.removeClass("active-cat");
        categories.removeClass("yellow-background");
        categories.removeClass("green-background");
        categories.removeClass("grey-background");
        categories.removeClass("orange-background");
        categories.removeClass("pink-background");

        collapse.removeClass("yellow-border");
        collapse.removeClass("green-border");
        collapse.removeClass("grey-border");
        collapse.removeClass("orange-border");
        collapse.removeClass("pink-border");

        //first_item_sub_cat.removeClass("yellow-background");
        //first_item_sub_cat.removeClass("green-background");
        //first_item_sub_cat.removeClass("grey-background");
        //first_item_sub_cat.removeClass("orange-background");
        //first_item_sub_cat.removeClass("pink-background");

        if($(this).hasClass("yellow-background-hover")){
            categorie.addClass("yellow-background");
            //first_item_sub_cat.addClass("yellow-background");
            //first_item_sub_cat.addClass("active-cat");
            collapse.addClass("yellow-border");
        } else if($(this).hasClass("green-background-hover")){
            categorie.addClass("green-background");
            //first_item_sub_cat.addClass("green-background");
            //first_item_sub_cat.addClass("active-cat");
            collapse.addClass("green-border");
        } else if($(this).hasClass("grey-background-hover")){
            categorie.addClass("grey-background");
            //first_item_sub_cat.addClass("grey-background");
            //first_item_sub_cat.addClass("active-cat");
            collapse.addClass("grey-border");
        } else if($(this).hasClass("orange-background-hover")){
            categorie.addClass("orange-background");
            //first_item_sub_cat.addClass("orange-background");
            //first_item_sub_cat.addClass("active-cat");
            collapse.addClass("orange-border");
        } else if($(this).hasClass("pink-background-hover")){
            categorie.addClass("pink-background");
        } else {
            // something went wrong
        }

        categorie.addClass("active-cat");

    });




});