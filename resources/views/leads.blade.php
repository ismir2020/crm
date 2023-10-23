<!-- resources/views/leads.blade.php --> 
 
@include('layouts.header')    
 
<h1>Leads für Benutzer {{$user->name}}</h1> 
 
<table id="leads" class="table table-striped table-bordered" style="width:100%"> 
    <thead> 
        <tr> 
            <th>Name</th> 
            <th>E-Mail</th> 
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($leads as $lead) 
            <tr> 
                <td>{{$lead->name}}</td> 
                <td>{{$lead->email}}</td> 
            </tr> 
        @endforeach 
    </tbody> 
</table> 
 
<script> 
$(document).ready( function () { 
    $('#leads').DataTable(); 
} ); 
</script> 
 
<!-- DataTables CSS & JS via CDN --> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css"> 
<script src="https://code.jquery.com/jquery-3.5.1.js">> 
<script  src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js">> 
<script  src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js">>