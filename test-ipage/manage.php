<?php include("header.php"); ?>
<div style="display: <?php
if ($_SESSION['userId'] == null)
    echo "none"
?>">


    <section ng-controller="listController">
        <div class="container">
            <div class="row column text-center">
                <h1 class="text-center" style="margin-top: 10px; color: #00AAA0">Manage your lists</h1>
                <a class="blog-nav-item glyphicon glyphicon-envelope pull-right" href="#mesagge" data-toggle="modal"
                   data-target=".bs-modal-message" ng-controller="invite" ng-click="getInvite()"> invitation</a>
            </div>
            <div class="row">
                <div class="col-md-3 text-center"
                     style="padding: 10px; margin-top:10px; margin-bottom:10px"
                     ng-repeat="list in displayListData">
                    <div class="row">
                        <a><h2 ng-click="goTable(list.listId)" style="color: #8ED2C9">{{list.listName}}</h2></a>
                    </div>
                    <div>
                        <div class="col-sm-8" ng-show="list.listName != null">
                            <p># of items</p>
                        </div>
                        <div class="col-sm-4">
                            <a class="fa fa-users" aria-hidden="true" style="color: #808080" href="#signUp"
                               data-toggle="modal"
                               data-target=".share" ng-controller="MainCtrl"
                               ng-click="send(list.listId)">share</a>
                            <a class="fa fa-users" aria-hidden="true" style="color: #808080"
                               ng-click="deleteList(list.listId)">delete</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="border: 1px dashed gray; padding: 20px;text-align: center">
                    <input type="text" value="list name" placeholder="list name" ng-model="newListName">
                    <a class="blog-nav-item glyphicon glyphicon-plus" style="font-size: 50px; color: #8ED2C9"
                       ng-click="addList(newListName)"></a>
                </div>
            </div>
        </div>
    </section>


    <section ng-controller="listController">
        <div class="container">
            <div class="row column text-center">
                <h1 class="text-center" style="margin-top: 10px;color: #FF7A5A">Shared lists</h1>
            </div>
            <div>
                <div class="col-md-3 text-center" style="padding: 10px; margin-top:10px; margin-bottom:10px"
                     ng-repeat="list in displaySharedListData">
                    <a><h2 ng-click="goTable(list.listId)" style="color: #FFB85F">{{list.listName}}</h2></a>
                    <div ng-show="list.listName != null">
                        <p>Owner:{{list.ownerId}}</p>
                        <p># of items</p>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade share" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true" ng-controller="MainCtrl2">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <br>
                <div class="bs-example bs-example-tabs">
                    <ul class="nav nav-tabs">
                        <h1>Share {{inviteInfo.listId}}</h1>
                    </ul>
                </div>
                <div class="modal-body">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="invite">
                            <form class="form-horizontal">
                                <fieldset>
                                    <!-- Sign In Form -->
                                    <!-- Text input-->
                                    <div class="control-group">
                                        <label class="control-label" for="userEmail">E-mail:</label>
                                        <div class="controls">
                                            <input required="" id="userEmail" ng-model="inviteInfo.email"
                                                   name="userEmail"
                                                   type="text" class="form-control" placeholder=""
                                                   class="input-medium" required="">
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="control-group">
                                        <label class="control-label" for="invite"></label>
                                        <div class="controls">
                                            <button id="invitebtn" ng-click="invite()" name="invite"
                                                    class="btn btn-success">
                                                Invite
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </center>
                </div>
            </div>
        </div>
    </div>


    <!-- invitation message -->
    <div class="modal fade bs-modal-message" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <br>
                <div class="bs-example bs-example-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#signin" data-toggle="tab">invitation</a></li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="signin">
                            <form class="form-horizontal">
                                <fieldset>

                                    <div class="control-group" ng-controller="invite">
                                        <label class="control-label" for="signin"></label>
                                        <div class="controls" ng-repeat="shared in inviteList">
                                            <div>
                                                <h3>Invitation for {{shared.listId}} from {{shared.ownerId}}</h3>
                                            </div>


                                            <button id="acceptbtn" ng-click="accept(shared.sharedId)" name="accept"
                                                    class="btn btn-success">
                                                Accept
                                            </button>
                                            <button id="declinebtn" ng-click="decline(shared.sharedId)" name="decline"
                                                    class="btn btn-success">
                                                Decline
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </center>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include("footer.php"); ?>
