<div class="modal-header">
    <h3 class="modal-title">Edit document</h3>
</div>

<div ng-controller="updateDocumentController">
    <div class="modal-body">
        <form name="document" method="post" class="form-horizontal">
            <div id="document">
               
                
                <div class="form-group"><label class="col-sm-2 control-label required" for="document_title">Title</label>
                    <div class="col-sm-10">
                        <input type="text"
                               id="document_title"
                               ng-model="document.title"
                               required="required"
                               class="form-control" />
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
                <input type="text" 
                     ng-show="false"  ng-init="document.parent=''"  ng-value="{{ parent }}" ng-model="document.parent" />
                <input type="text" 
                     ng-show="false"  ng-init="document.item=''" ng-value="{{ item }}" ng-model="document.item" />
                <button class="btn btn-primary" type="submit" ng-click="updateDoc(document )">OK</button>
                <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
            </div>  
        </form>
    </div>
</div>
