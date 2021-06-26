@extends('layouts.app')

@section('content')
<?php
if (isset($POST['submit'])) {
    $hp = $_POST['hp'];
    echo "No Hp:" . $hp;
}
?>
@endsection