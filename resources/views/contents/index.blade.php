@extends('layouts.app')

@section('content')
    <div ng-app="myApp" ng-controller="HttpController" class="container">
        <div class="col-sm-offset-2 col-sm-8">



            <!--Displaying Campaigns-->



            @if (count($tasks) > 0)
                <div class="panel panel-default campaign-panel">
                    <div class="panel-heading">
                        Current Campaigns
                    </div>

                    <div id="campaignForm" class="panel panel-default">
                        <div class="panel-heading">
                            New Campaign
                        </div>
                        <!--Campaign Form-->
                        <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- New Task Form -->
                            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
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
                                        <input type="text" list="categories" name="category" id="campaign-category" class="form-control" value="{{ old('campaign') }}"/>
                                        <datalist id="categories">
                                          <option>Marketing</option>
                                          <option>IT</option>
                                          <option>Business</option>
                                          <option>College</option>
                                        </datalist>
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
                            <div id="cancelCampaign" class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Cancel Adding
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Content Form -->
                    <div id="contentForm" class="panel panel-default">
                        <div class="panel-heading">
                            New Content
                        </div>

                        <div class="panel-body">
                            <!-- Display Validation Errors -->
                            @include('common.errors')

                            <!-- New contentsForm -->
                            <form action="{{ url('campaign_content') }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}

                                <!-- Campaign Id -->
                                <div class="form-group">
                                    <label for="content-campaign_id" class="col-sm-3 control-label">Campaign Id</label>

                                    <div class="col-sm-6">
                                        <input ng-model="content.campaign_id" type="text" name="campaign_id" id="campaign-campaign_id" class="form-control" value="{{ old('campaign_content') }}">
                                    </div>
                                </div>

                                <!-- Content Type -->
                                <div class="form-group">
                                    <label for="content-content_type" class="col-sm-3 control-label">Content Type</label>

                                    <div class="col-sm-6">
                                        <input ng-model="content.content_type" type="text" list="content_types" name="content_type" id="content-content_type" class="form-control" value="{{ old('campaign_content') }}">
                                        <datalist id="content_types">
                                          <option>Body</option>
                                          <option>From_Name</option>
                                          <option>header</option>
                                          <option>Img</option>
                                          <option>Link_text</option>
                                          <option>Subject</option>
                                        </datalist>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="form-group">
                                    <label for="content-content" class="col-sm-3 control-label">Content</label>

                                    <div class="col-sm-6">
                                        <input ng-model="content.content" type="text" name="content" id="content-content" class="form-control" value="{{ old('campaign_content') }}">
                                    </div>
                                </div>

                               <!--submitContent --> 
                               

                                



                                
                            </form>

                            <div id="submitContent" class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button ng-click="putContent()" class="btn btn-success">
                                            <i class="fa fa-btn fa-save"></i>Submit Content
                                        </button>
                                    </div>
                            </div>

                            <div id="cancelContent" class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Cancel Content
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped campaign-table">
                            <thead>
                                <h1>Campaigns</h1>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Country</th>
                                    
                                </tr>
                            </thead>

                            


                            <!-- Add Content Button -->
                            <div id="addContent" class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i>Add Content
                                    </button>
                                </div>
                            </div>

                            <!--Add Campaign Button-->
                            <div id="addCampaign" class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i>Add Campaign
                                    </button>
                                </div>
                            </div>
                            

                            <tbody>
                                @foreach ($tasks as $task)
                                    

                                    
                                    <tr>

                                        <td class="table-text"><div>{{ $task->id }}</div></td>
                                        <td class="table-text" contenteditable='true'><div>{{ $task->name }}</div></td>
                                        <td class="table-text" contenteditable='true'><div>{{ $task->country}}</div></td>
                                        
                                        
                                        <!-- Task View Button -->
                                        <td>
                                            
                                               

                                                <button type="submit" ng-click="getContentJson({{$task->id}})" id="get-contents-{{ $task->id }}" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-eye"></i>View
                                                </button>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Current contents -->
                        @if (count($tContents) > 0)
                            <table class="table table-striped contentstable content-table">
                                <thead>
                                    
                                    <tr>
                                        <th>Id</th>
                                        <th>Content Type</th>
                                        <th>Content</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        

                                        
                                        <tr ng-repeat="content in contents">
                                            <td class="table-text"><div><% content.campaign_id %></div></td>
                                            <td class="table-text" contenteditable='true'><div><% content.content_type %></div></td>
                                            <td class="table-text" contenteditable='true'><div><% content.content %></div></td>
                                            
                                            <!-- contentsDelete Button -->


                                            <td>
                                                
                                                    

                                                    <button class="btn btn-success update">
                                                        <i class="fa fa-btn fa-save"></i>Update
                                                    </button>
                                                
                                            </td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endif


            
            
        </div>
    </div>


@endsection

