@extends('layouts.app')

@section('content')

<h1>新規登録</h1>

<form action="{{ route('posts.income_store') }}" method="post">