@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h5 class="text-muted">
                        Selamat Datang,
                    </h5>

                    <h3 class="fw-bold text-primary">
                        {{ auth()->user()->name }}
                    </h3>

                    <p class="text-muted mb-0">
                        Nomor Identitas:
                        {{ auth()->user()->nomor_identitas }}
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="
                card
                shadow-sm

                @if($todayStatus == 'dibuka')
                    border-success
                @elseif($todayStatus == 'terbatas')
                    border-warning
                @elseif($todayStatus == 'ditutup')
                    border-danger
                @endif
            ">
                <div class="card-body text-center">

                    <h6 class="text-muted">
                        STATUS PENGAJUAN
                    </h6>

                        <h2 class="
                            fw-bold

                            @if($todayStatus == 'dibuka')
                                text-success
                            @elseif($todayStatus == 'terbatas')
                                text-warning
                            @elseif($todayStatus == 'ditutup')
                                text-danger
                            @endif
                        ">
                            {{ strtoupper($todayStatus) }}
                        </h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        {{-- KALENDER --}}
        <div class="col-lg-6 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-primary text-white">

                    Kalender Pengajuan

                </div>

                <div class="card-body">

                    <h5 class="text-center fw-bold mb-4">

                        {{ \Carbon\Carbon::create()
                            ->month($currentMonth)
                            ->translatedFormat('F') }}

                        {{ $currentYear }}

                    </h5>

                    <div class="calendar">

                        <div><strong>Sen</strong></div>
                        <div><strong>Sel</strong></div>
                        <div><strong>Rab</strong></div>
                        <div><strong>Kam</strong></div>
                        <div><strong>Jum</strong></div>
                        <div><strong>Sab</strong></div>
                        <div><strong>Min</strong></div>

                        {{-- KOSONG SEBELUM TANGGAL 1 --}}
                        @for($i = 0; $i < (($startDay == 0) ? 6 : $startDay - 1); $i++)

                            <div></div>

                        @endfor

                        {{-- TANGGAL --}}
                        @for($day = 1; $day <= $daysInMonth; $day++)

                            @php

                                $event =
                                    $eventDays[$day] ?? null;

                                $status =
                                    $event['status'] ?? '';

                                $judul =
                                    $event['judul'] ?? '';

                                $keterangan =
                                    $event['keterangan'] ?? '';

                            @endphp

                            <div
                                class="calendar-day {{ $status }}"
                                data-bs-toggle="tooltip"
                                title="{{ $judul }}"
                            >

                                {{ $day }}

                            </div>

                        @endfor

                    </div>

                    <div class="legend mt-4">

                        <span class="legend-item ditutup">

                            Ditutup

                        </span>

                        <span class="legend-item terbatas">

                            Terbatas

                        </span>

                        <span class="legend-item dibuka">

                            Dibuka

                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- INFORMASI --}}
        <div class="col-lg-3 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-info text-white">

                    Informasi

                </div>

                <div class="card-body">

                    @forelse($announcements as $announcement)

                        <div class="mb-3">

                            <strong>

                                {{ $announcement->judul }}

                            </strong>

                            <p class="mb-0 mt-1">

                                {{ $announcement->isi }}

                            </p>

                        </div>

                        <hr>

                    @empty

                        <p class="text-muted">

                            Belum ada informasi.

                        </p>

                    @endforelse

                </div>

            </div>

        </div>

        {{-- TATA TERTIB --}}
        <div class="col-lg-3 mb-4">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-secondary text-white">

                    Tata Tertib

                </div>

                <div class="card-body">

                    <ol>

                        @foreach($rules as $rule)

                            <li>

                                {{ $rule->isi }}

                            </li>

                        @endforeach

                    </ol>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.calendar{
    display:grid;
    grid-template-columns:repeat(7,1fr);
    gap:8px;
    text-align:center;
}

.calendar div{
    padding:10px;
    border-radius:8px;
}

.calendar-day{
    background:#f8f9fa;
    font-weight:bold;
    cursor:pointer;
    transition:.2s;
}

.calendar-day:hover{
    transform:scale(1.08);
}

.calendar-day.ditutup{
    background:#dc3545;
    color:white;
}

.calendar-day.terbatas{
    background:#ffc107;
    color:#212529;
}

.calendar-day.dibuka{
    background:#198754;
    color:white;
}

.legend{
    display:flex;
    justify-content:center;
    gap:10px;
    flex-wrap:wrap;
}

.legend-item{
    padding:8px 14px;
    border-radius:8px;
    font-size:14px;
}

.legend-item.ditutup{
    background:#dc3545;
    color:white;
}

.legend-item.terbatas{
    background:#ffc107;
    color:#212529;
}

.legend-item.dibuka{
    background:#198754;
    color:white;
}

</style>

<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        let tooltipTriggerList =
            [].slice.call(
                document.querySelectorAll(
                    '[data-bs-toggle="tooltip"]'
                )
            );

        tooltipTriggerList.map(
            function (tooltipTriggerEl) {

                return new bootstrap.Tooltip(
                    tooltipTriggerEl
                );

            }
        );

    }
);

</script>

@endsection