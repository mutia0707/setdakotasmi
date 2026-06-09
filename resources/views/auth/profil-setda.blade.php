@extends('layouts.app')

@section('content')
<style>
    /* Styling agar bersih dan modern */
    body { background-color: #f0f2f5; }
    
    .main-wrapper {
        max-width: 900px;
        margin: 60px auto;
        padding: 0 15px;
    }

    .glass-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 50px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.07);
        border: 1px solid rgba(0,0,0,0.05);
    }

    .heading-box {
        margin-bottom: 40px;
    }

    .heading-box h1 {
        font-weight: 800;
        color: #1a202c;
        margin-bottom: 8px;
        font-size: 2rem;
    }

    .heading-box .sub {
        color: #4a5568;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
    }

    .heading-box .sub::before {
        content: "";
        width: 30px;
        height: 3px;
        background: #0056b3;
        margin-right: 12px;
        border-radius: 2px;
    }

    .content-area {
        color: #2d3748;
        line-height: 1.8;
        font-size: 1.1rem;
        text-align: justify;
    }
</style>

<div class="main-wrapper">
    <div class="glass-card">
        <div class="heading-box">
            <h1>Profil Setda</h1>
            <div class="sub">Sekretariat Daerah Kota Sukabumi</div>
        </div>

        <div class="content-area">
            @if(isset($data) && $data->isi_profil)
                <div style="white-space: pre-line;">
                    {!! nl2br(e($data->isi_profil)) !!}
                </div>
            @else
                <div class="text-center py-5 text-muted">
                    <p>Konten sedang dalam proses pemutakhiran.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection