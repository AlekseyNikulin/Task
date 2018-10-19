<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div ng-app="MyApp">
            <div ng-controller="PaginationCtrl">
                <div class="row">
                    <div class="col-md-6" align="right">
                        <input type="text" placeholder="Поиск" ng-model="search.title"/>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Идентификатор задачи</th>
                        <th>Заголовок задачи</th>
                        <th>Дата выполнения</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="grid-row-coursor" ng-repeat="item in items | filter:search | offset: currentPage*itemsPerPage
                    | limitTo: itemsPerPage" ng-click="taskOne(item)">
                        <td>{{item.id}}</td>
                        <td>{{item.title}}</td>
                        <td>{{item.date}}</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <td colspan="3">
                        <div class="pagination">
                            <ul class="list-inline">
                                <li ng-class="prevPageDisabled()">
                                    <a href ng-click="prevPage()">« Prev</a>
                                </li>
                                <li ng-repeat="n in range()" ng-class="{active: n == currentPage}"
                                    ng-click="setPage(n)">
                                    <a href="#">{{n+1}}</a>
                                </li>
                                <li ng-class="nextPageDisabled()">
                                    <a href ng-click="nextPage()">Next »</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    </tfoot>
                </table>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Информация о задаче №{{task_selected.id}}</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">Заголовок</div>
                                    <div class="col-lg-6">{{task_selected.title}}</div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                    <div class="col-lg-6">Дата выполнения</div>
                                    <div class="col-lg-6">{{task_selected.date}}</div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                    <div class="col-lg-6">Автор</div>
                                    <div class="col-lg-6">{{task_selected.author}}</div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                    <div class="col-lg-6">Статус</div>
                                    <div class="col-lg-6">{{task_selected.status}}</div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                    <div class="col-lg-6">Описание</div>
                                    <div class="col-lg-6">{{task_selected.description}}</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
