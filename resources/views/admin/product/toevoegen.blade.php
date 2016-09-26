@extends('admin.app')

@section('content')

    <script type="text/javascript">
        $(document).ready(function () {


            $(".js-example-basic-multiple").select2();

            var target = $(".js-example-basic-multiple");
            target.select2("val", "All");
            target.text = '';

            $(target).change(function() {
                var value_select2 = $(this).val();
                var categories = $('#categories');
                categories.text(value_select2);
            });

            $('input').on('ifChanged', function(event){
                checkAll();
                ShowHideDiv(this);
            });

            var mainchecked = false;
            function checkAll() {

                //get all input elements
                var inputs = document.getElementsByTagName('input');

                //if the box is being checked
                if(!mainchecked) {

                    //loop through all inputs
                    for(i = 0; i < inputs.length; i++) {
                        //does it have autocheck?
                        if(inputs[i].className == 'autocheck') {
                            //then check the box!
                            inputs[i].checked = "checked";

                        }
                    }
                    mainchecked = true;
                } else {
                    //box is being unchecked, uncheck everything

                    for(i = 0; i < inputs.length; i++) {
                        if(inputs[i].className == 'autocheck') {
                            //then check the box!
                            inputs[i].checked = "";
                        }
                    }
                    mainchecked = false;
                }

            }

            function ShowHideDiv(previewt) {
                var previewtext = document.getElementById("previewtext");
                previewtext.style.display = previewt.checked ? "block" : "none";
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#file").change(function () {
                readURL(this);
            });
        });
    </script>

    <div class="right_col" role="main">

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3 class="space-heading">Product Toevoegen</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <!-- form input mask -->
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Product Gegevens</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            {{ Form::open(array('method' => 'post',
                                                'url' => 'admin/product/add',
                                                'enctype' => 'multipart/form-data',
                                                'class' => 'form-horizontal form-label-left' ))
                            }}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Naam<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input name='naam' placeholder ="Naam" ng-model="naam" required type="text" class="form-control">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Prijs<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input name='prijs' placeholder ='Prijs' ng-model="prijs" required min="0" max="9999" type="text" class="form-control">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Categorieen<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <select name="categories[]" class="js-example-basic-multiple col-xs-12" multiple="multiple" required>
                                            @foreach($categories as $category)
                                                <option value="{{$category->name}}">{{$category->name}}</option>
                                            @endforeach
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->name}}">{{$subcategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Afbeelding*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input name="file"  type='file' id="file" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Beschrijving
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea name='beschrijving' placeholder ='Beschrijving' ng-model="beschrijving" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Beschikbaarheid</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input name='available' placeholder ='Beschikbaarheid' ng-model="available" type="text" class="form-control">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Waarschuwing</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input name='waarschuwing' placeholder ='waarschuwing' ng-model="warning" type="text" class="form-control">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">PostNL</label>
                                    <div class="checkbox col-md-9 col-sm-9 col-xs-9">
                                        <input name="PostNL" value="true" id="chkPassport" type="checkbox" class="flat">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button name="submit" type="submit" class="btn btn-success">Toevoegen</button>
                                    </div>
                                </div>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <!-- /form input mask -->


                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Product Weergave</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="product-image">
                                    <img id="blah" src="{{url('inventory_images/media.png')}}" alt="..." />
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12" style="border:0px solid #e5e5e5;">

                                <div class="space">
                                    <h2>Productnaam</h2>
                                    <p ng-bind="naam"></p>
                                </div>

                                <div class="space">
                                    <h2>Prijs</h2>
                                    &euro; <span ng-bind="prijs"></span>
                                </div>

                                <div class="space">
                                    <h2>Categorieen</h2>
                                    <span id="categories"></span>
                                </div>

                                <div class="space">
                                    <h2>Beschrijving</h2>
                                    <p ng-bind="beschrijving"></p>
                                </div>

                                <div class="space">
                                    <h2>Extra Info</h2>
                                    <span class="col-xs-12" ng-bind="warning"></span>
                                    <span class="col-xs-12" ng-bind="available"></span>
                                    <div class="clear"></div>
                                    <div class="checkboxPreview col-xs-1">
                                        <label>
                                            <input type="checkbox"  id="" class="autocheck" disabled >
                                        </label>
                                    </div>
                                    <div class="previewtext col-xs-9" id="previewtext" style="display: none">
                                        Leverbaar via PostNL
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection