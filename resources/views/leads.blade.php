blade
@extends('layouts.app')

@section('content')
    <h1>Leads für Benutzer {{ $user->name }}</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- Search form -->
                        <form class="form-inline float-left">
                            <input class="form-control mr-sm-2" type="search" id="search-input" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="search-btn">Search</button>
                        </form>
                        <!-- Entries per page select -->
                        <div class="float-right">
                            <select class="custom-select" style="width: auto;" id="entries-select">
                                <option selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
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
                                    @foreach($customColumns as $column)
                                        <th>{{ $column->column_name }}</th>
                                    @endforeach
                                    <th>Aktionen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                                    <tr>
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td>{{ $lead->phone }}</td>
                                        @foreach($customColumns as $column)
                                            <td>{{ $lead->customColumns[$column->column_name] ?? '' }}</td>
                                        @endforeach
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
@endsection

@section('styles')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/searchbuilder/1.6.0/css/searchBuilder.dataTables.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            var leadsTable = $('#leads-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'colvis'
                ]
            });

            // Live search functionality
            $('#search-btn').click(function() {
                leadsTable.search($('#search-input').val()).draw();
            });

            // Change entries per page
            $('#entries-select').change(function() {
                leadsTable.page.len($('#entries-select').val()).draw();
            });
        });
    </script>
@endsection