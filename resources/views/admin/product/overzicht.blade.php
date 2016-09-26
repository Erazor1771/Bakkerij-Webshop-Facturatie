@extends('admin.app')
@section('content')
<div class="right_col" role="main" ng-controller="adminController">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Producten <small>Overzicht</small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input ng-model="search_value" ng-change="searchProducts()" type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Producten</h2>
                        <div class="nav navbar-right panel_toolbox">
                            <button class="btn btn-success" ng-click="getFirstPage()"><span class="fa fa-angle-double-left"></span></button>
                            <button class="btn btn-success" ng-click="previousPage()">Vorige Pagina</button>
                            <button class="btn btn-success" ng-click="nextPage()">Volgende Pagina</button>
                            <button class="btn btn-success" ng-click="getLastPage()"><span class="fa fa-angle-double-right"></span></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <p>Tabel van alle geregistreerde producten in de webshop.</p>

                        <table class="table table-striped projects regular-table">
                            <thead>
                            <tr>
                                <th style="width: 20%;">Afbeelding</th>
                                <th>Naam</th>
                                <th>Prijs</th>
                                <th>Extra</th>
                                <th>Rating</th>
                                <th style="width: 20%;">Acties</th>
                            </tr>
                            </thead>


                            <tbody>
                            <p class="text-center" ng-show="loading"><span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
                                <tr ng-hide="loading" ng-repeat="product in products" class="hover-row">
                                    <td>
                                        <img width="100" height="100" src="../<% product.path %>" />
                                    </td>
                                    <td>
                                        <a><% product.name %></a>
                                        <br />
                                        <small>Created <% product.created_at %></small>
                                    </td>
                                    <td>
                                        &euro; <% product.price %>
                                    </td>
                                    <td class="project_progress">
                                        <div ng-if="product.postnl">
                                            <img src="{{url('img/icon-postnl.png')}}">
                                        </div>
                                    </td>
                                    <td>
                                        <% product.rating %>
                                    </td>
                                    <td>
                                        <a href="/admin/product/edit/<% product.id %>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Bewerk </a>
                                        <a data-toggle="modal" data-target="#myModal<% product.id %>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Verwijder </a>
                                    </td>
                                </tr>

                                <!-- Modal -->

                                <div ng-repeat="product in products">
                                <div class="modal fade" id="myModal<% product.id %>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Product verwijderen</h4>
                                            </div>
                                            <div class="modal-body">
                                                Weet u zeker dat u het product <b><% product.name %></b> wilt verwijderen?
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <a ng-click="deleteProduct(product.id)" class="btn btn-primary" data-dismiss="modal">Verwijder</a>

                                                {{ Form::close() }}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection