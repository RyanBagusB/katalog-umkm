@extends('layouts.landing')

@section('title', 'Beranda - Karangpoh')
@section('meta_description', 'Temukan ruang tinggal impian Anda di Karangpoh. Jelajahi properti premium dengan layanan terbaik.')

@section('content')
  @include('partials.sections.hero')
  @include('partials.sections.service')
  @include('partials.sections.merchants', ['merchants' => $merchants])
  @include('partials.sections.articles')
  @include('partials.sections.call-to-action')
@endsection
