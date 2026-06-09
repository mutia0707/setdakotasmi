@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm p-5" style="border-radius: 15px;">
                <h2 class="fw-bold mb-4">Visi & Misi</h2>
                <hr class="mb-4">
                
                <div class="mb-4">
                    <h4 class="fw-bold text-primary">Visi</h4>
                    <p style="line-height: 1.8; font-size: 1.1rem; color: #555;">
                        {{ $data->visi ?? 'Visi belum diatur.' }}
                    </p>
                </div>

                <div>
                    <h4 class="fw-bold text-primary">Misi</h4>
                    <div style="line-height: 1.8; font-size: 1.1rem; color: #555; white-space: pre-line;">
                        {!! preg_replace('/(\d+\.\s)/', '<br><strong>$1</strong>', e($data->misi ?? 'Misi belum diatur.')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection