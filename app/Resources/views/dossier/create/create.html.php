<form name="dossier" method="post" class="form-horizontal">
    <div id="dossier">
        <div class="form-group"><label class="col-sm-2 control-label required" for="dossier_title">Title</label>
            <div class="col-sm-10">
                <input type="text"
                       id="dossier_title"
                       ng-model="dossier.title"
                       required="required"
                       class="form-control"/>
            </div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label required" for="dossier_body">Body</label>
            <div class="col-sm-10">
                <textarea  id="dossier_body"
                           ng-model="dossier.body"
                       required="required"
                       class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-2">
                <button type="submit"
                        id="dossier_submit"
                        ng-click="create(dossier)"
                        class="btn-default btn">
                    Submit
                </button>
                <button type="button"
                        id="dossier_back"
                        ng-click="back()"
                        class="btn-default btn">
                    Back
                </button>
            </div>
        </div>
    </div>
</form>