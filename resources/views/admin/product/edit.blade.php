@extends('admin.app')

@section('content')

    <script type="text/javascript">
        $(document).ready(function () {


            var select2array = '{{ json_encode($selected_categories) }}';
            select2array = JSON.parse(select2array.replace(/&quot;/g,'"'));
            select2array = select2array.replace(/\s/g, '');
            select2array = select2array.split(',');

            $(".js-example-basic-multiple").select2({}).select2('val', [select2array]);

            var target = $(".js-example-basic-multiple");


            $(target).change(function() {
                var value_select2 = $(this).val();
                var categories = $('#categories');
                categories.text(value_select2);
            });

            var chckValue = $('#chkPassport').iCheck('update')[0].checked;

            if(chckValue == true){
                checkAll();
                ShowHideDiv();
            }

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

            function ShowHideDiv() {
                $("#previewtext").css('display', 'block');
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
                    <h3>Product Bewerken</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Go!</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <!-- form input mask -->
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Product Bewerken</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            {{ Form::open(array('method' => 'post',
                                                'url' => 'admin/product/edit/'.$data->id.'/update',
                                                'enctype' => 'multipart/form-data',
                                                'class' => 'form-horizontal form-label-left' ))
                            }}

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Naam<span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input ng-init="naam='{{$data->name}}'" name='naam' placeholder ="Naam" ng-model="naam" required type="text" class="form-control">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Prijs<span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input ng-init="prijs='{{$data->price}}'" name='prijs' placeholder ='Prijs' ng-model="prijs" required min="0" max="9999" type="text" class="form-control">
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Afbeelding</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input name="file"  type='file' id="file"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Beschrijving
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea ng-init="beschrijving='{{$data->details}}'" name='beschrijving' placeholder ='Beschrijving' ng-model="beschrijving" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Beschikbaarheid</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input name='available' ng-init="available='{{$data->availability}}'" placeholder ='Beschikbaarheid' ng-model="available" type="text" class="form-control">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Waarschuwing</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input ng-init="warning='{{$data->warning}}'" name='waarschuwing' placeholder ='waarschuwing' ng-model="warning" type="text" class="form-control">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">PostNL</label>
                                <div class="checkbox col-md-9 col-sm-9 col-xs-9">
                                    <input name="PostNL" value="true" id="chkPassport" type="checkbox" class="flat" @if($data->postnl != '') checked @endif>
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button name="submit" type="submit" class="btn btn-success">Updaten</button>
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

                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <div class="product-image">
                                    <img id="blah" src="{{ url($data->path) }}" alt="..." />
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
                                    <p ng-bind="beschrijving"> --- De beschrijving ---</p>
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