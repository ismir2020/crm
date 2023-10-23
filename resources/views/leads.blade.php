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
                        <span class="text-secondary mx-2">Einträge</span>
                        <span class="text-secondary">von 200</span>
                    </div>
                </div>
                <div class="card-body">
                    <table id="leads" class="table table-striped table-bordered nowrap" style="width:100%"> 
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready( function () {
    $('#leads').DataTable({
        responsive: true
    });
} );
</script>