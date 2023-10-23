<!-- resources/views/leads.blade.php -->

@include('layouts.header') 

<h1>Leads für Benutzer {{$user->name}}</h1>

@foreach ($leads as $lead)
    <p>Name: {{$lead->name}}</p>
    <p>E-Mail: {{$lead->email}}</p>
    <!-- Weitere Felder anzeigen -->
@endforeach