@extends('layouts.app')

@section('content')
    <div ng-app="myApp" ng-controller="HttpController" class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Campaign
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal confirm">
                        {{ csrf_field() }}

                        <!-- Country Name -->
                        <div class="form-group">
                            <label for="campaign-country" class="col-sm-3 control-label">Country</label>

                            <div class="col-sm-6">
                                <input type="text" name="country" id="campaign-country" class="form-control" value="{{ old('campaign') }}">
                            </div>
                        </div>

                        <!-- starts_at -->
                        <div class="form-group">
                            <label for="campaign-starts_at" class="col-sm-3 control-label">Starts at</label>

                            <div class="col-sm-6">
                                <input type="datetime-local" name="starts_at" id="campaign-starts_at" class="form-control" value="{{ old('campaign') }}">
                            </div>
                        </div>

                        <!-- ends_at -->
                        <div class="form-group">
                            <label for="campaign-ends_at" class="col-sm-3 control-label">Ends at</label>

                            <div class="col-sm-6">
                                <input type="datetime-local" name="ends_at" id="campaign-ends_at" class="form-control" value="{{ old('campaign') }}">
                            </div>
                        </div>

                        <!-- category -->
                        <div class="form-group">
                            <label for="campaign-category" class="col-sm-3 control-label">Category</label>

                            <div class="col-sm-6">
                                <input type="text" name="category" id="campaign-category" class="form-control" value="{{ old('campaign') }}">
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group">
                            <label for="campaign-name" class="col-sm-3 control-label">Campaign Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="campaign-name" class="form-control" value="{{ old('campaign') }}">
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="campaign-description" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <input type="text" name="description" id="campaign-description" class="form-control" value="{{ old('campaign') }}">
                            </div>
                        </div>



                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-save"></i>Save Campaign
                                </button>
                            </div>
                        </div>

                        
                    </form>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button class="btn btn-default">
                                <i class="fa fa-btn fa-trash"></i>Cancel Adding
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            

            <!-- Current Tasks -->
            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Campaigns
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <h1>Campaigns</h1>
                                <tr>
                                    <th>Id</th>
                                    <th>Country</th>
                                    <th>Starts_at</th>
                                    <th>Ends_at</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    

                                    
                                    <tr ng-repeat="campaign in campaigns">
                                        <td class="table-text"><div><% campaign.id %></div></td>
                                        <td class="table-text"><div><% campaign.country %></div></td>
                                        <td class="table-text"><div><% campaign.starts_at %></div></td>
                                        <td class="table-text"><div><% campaign.ends_at %></div></td>
                                        <td class="table-text"><div><% campaign.category %></div></td>
                                        <td class="table-text"><div><% campaign.name %></div></td>
                                        <td class="table-text"><div><% campaign.description %></div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            
                                            
                                                <button ng-click="deleteTask(campaign.id,$index)" class="btn btn-danger confirm">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            
                                        </td>
                                    </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            
        </div>
    </div>
@endsection