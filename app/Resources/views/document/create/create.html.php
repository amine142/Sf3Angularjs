<div class="modal-header">
    <h3 class="modal-title">New document</h3>
</div>

<div ng-controller="createDocumentController">
    <div class="modal-body">
        <form name="document" method="post" class="form-horizontal">
            <div id="document">
                <input type="hidden" name="id" ng-value="{{ id_demande }}" ng-model="document.item.id"/>
                <input type="hidden" name="item" ng-value="{{ item }}" ng-model="document.item.type"/>
                <div class="form-group"><label class="col-sm-2 control-label required" for="document_title">Title</label>
                    <div class="col-sm-10">
                        <input type="text"
                               id="document_title"
                               ng-model="document.title"
                               required="required"
                               class="form-control"/>
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label required" for="document_path">Path</label>
                    <div class="col-sm-10">
                        <input  id="document_path"
                                ng-model="document.path"
                                required="required"
                                class="form-control" />
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" ng-click="createDoc(document,id_demande,item )">OK</button>
                <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
            </div>  
        </form>
    </div>
</div>
