<!-- resources/views/leads.blade.php --> 
 

 
@include('layouts.header')    
 

 
<h1>Leads für Benutzer {{$user->name}}</h1> 
 

 
<div class="container-fluid">
 
    <div class="row">
 
        <div class="col-12">
 
            <div class="card">
 
                <div class="card-header">
 
                    <form class="form-inline float-left">
 
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
 
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
 
                    </form>
 
                    <div class="float-right">
 
                        <select class="custom-select" style="width: auto;">
 
                            <option selected>10</option>
 
                            <option value="1">25</option>
 
                            <option value="2">50</option>
 
                            <option value="3">100</option>
 
                        </select>
 
                        <span>Einträge pro Seite</span>
 
                    </div>
 
                </div>
 
                <div class="card-body">
 
                    <table id="leads-table" class="table table-striped">
 
                        <thead>
 
                            <tr>
 
                                <th>Name</th>
 
                                <th>Email</th>
 
                                <th>Telefon</th>
 
                                <th>Aktionen</th>
 
                            </tr>
 
                        </thead>
 
                        <tbody>
 
                            @foreach($leads as $lead)
 
                            <tr>
 
                                <td>{{ $lead->name }}</td>
 
                                <td>{{ $lead->email }}</td>
 
                                <td>{{ $lead->phone }}</td>
 
                                <td>
 
                                    <a href="#" class="btn btn-primary btn-sm">Anzeigen</a>
 
                                    <a href="#" class="btn btn-warning btn-sm">Bearbeiten</a>
 
                                    <a href="#" class="btn btn-danger btn-sm">Löschen</a>
 
                                </td>
 
                            </tr>
 
                            @endforeach
 
                        </tbody>
 
                    </table>
 
                </div>
 
            </div>
 
        </div>
 
    </div>
 
</div>
 

 
<!-- Bootstrap CSS via CDN -->
 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 
<!-- jQuery -->
 
<script src=" " target="blank">https://code.jquery.com/jquery-3.3.1.slim.min.js"> 
<!-- Bootstrap JavaScript via CDN -->
 
<script src=" " target="blank">https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"> 
<!-- Datatables CSS via CDN -->
 
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
 
<!-- Datatables JavaScript via CDN -->
 
<script src=" " target="blank">https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"> 
<script>
 
    $(document).ready(function() {
 
        $('#leads-table').DataTable();
 
    } );
 
</script>
