@extends('layouts.app_full_width')

@section('content')
<div class="row">
<div class="col-md-8">
@foreach($duas as $dua)
<div class="card offer-success mb-3">
<div class="card-header alert-success-alt"><h2>{{ $dua->name }}</h2></div>
<div class=" card-body bg-white">
<dl class="row">
<dt class="col-sm-3">Dua</dt>
<dd class="col-sm-9"><h4>{!! $dua->dua !!}</h4></dd>

<dt class="col-sm-3">Translation</dt>
<dd class="col-sm-9">{{ $dua->translation }}</dd>
@if($dua->transliteration)
<dt class="col-sm-3">Transliteration</dt>
<dd class="col-sm-9">{{ $dua->transliteration }}</dd>
@endif
</dl>

<hr>
<div class="row">
<div class="col-xs-12 col-md-6 offset-md-3">
@if(!empty($dua->video))
<div class="thumbnail"><div class="embed-responsive embed-responsive-4by3">{!! $dua->video !!}</div></div>
@endif
</div> 
</div>
</div>
</div>
@endforeach
</div>
<div class="col-md-4">
<div class="card">
<a href="http://www.muslim-library.com/dl/books/English_30_Hadith_for_Children.pdf" target="new"><img src="{{ URL::asset('img/30_hadith.png') }}" class="img-fluid"></a>
</div>
<div class="card mt-3">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- n4m_app_rs -->
<ins class="adsbygoogle"
style="display:block"
data-ad-client="ca-pub-9750369232662797"
data-ad-slot="9464189006"
data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>
</div>
@endsection