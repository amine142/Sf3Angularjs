<table class="table table-hover table-responsive" datatable="ng"  class="row-border hover">
    <thead>
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>

    <tr ng-repeat="dossier in dossiers">
        <td>{{ dossier.id }}</td>
        <td>{{ dossier.title }}</td>
        <td>
            <a href="#!dossiers/update/{{ dossier.id }}" class="btn btn-default btn-sm">Edit</a>
            <a href="" ng-click="remove(dossier.id)" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
    

    </tbody>
</table>

<a href="#!dossiers/create" class="btn btn-lg btn-success">Create</a>