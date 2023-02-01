@extends('layouts.app')
@section('content')

<h1>La fecha de hoy es: </h1>

{{-- así se comenta en blade php --}}
<p> <?php echo $diaSemana, " ", $dia, " ", $mes, " ", $year?></p> 
@stop