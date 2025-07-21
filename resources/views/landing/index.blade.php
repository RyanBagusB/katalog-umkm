@extends('layouts.landing')

@section('title', 'Beranda – Katalog UMKM Kelurahan Karangpoh')
@section('description', 'Temukan informasi UMKM terbaik di Kelurahan Karangpoh. Jelajahi produk unggulan, berita terkini, dan layanan digital untuk mendukung usaha lokal.')

@section('content')
  @include('partials.sections.hero')
  @include('partials.sections.service')
  @include('partials.sections.merchants', ['merchants' => $merchants])
  @include('partials.sections.articles', ['news' => $news])
  @include('partials.sections.call-to-action')
@endsection
