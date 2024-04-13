@extends('layouts.template')
@section('title', 'Kendali')
@section('content')
    <h2 class="h2 text-secondary-emphasis mt-3 fst-italic">
        Kendali Liquid Dispensing Kapsul Radiofarmaka I-131
    </h2>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 mt-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger bg-gradient">
                    <h6 class="m-0 font-weight-bold text-light"><strong>Parameter Dispensing</strong></h6>
                </div>
                <div class="card-body">
                    <div class="row justify-content-end">
                        <div class="col-md-3">
                            <div class="card shadow border-left-info border-0 position-relative mb-3 rounded-pill">
                                <div class="card-body">
                                    <text class="card-text fst-italic">Dispensing</text>
                                    <div class="status-circle bg-success" id="status-circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="dispensingDataForm" action="{{ route('dispensing-data-store') }}" method="post">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-lg-4 mb-2">
                                <div class="card shadow border-0 position-relative" style="border-radius: 12%;">
                                    <input
                                        class="mt-5 border-0 form-control text h1 text-large font-weight-bold text-body text-uppercase text-center"
                                        type="number" id="volume" placeholder="00" min="1" max="50" step="1" required autocomplete="off">
                                    <label class="text h3 font-weight-bold text-body text-center"
                                        for="inputVolume"><strong>Volume</strong></label>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 mb-2">
                                <div class="card shadow border-0 position-relative" style="border-radius: 12%;">
                                    <input
                                        class="mt-5 border-0 form-control text h1 text-large font-weight-bold text-body text-uppercase text-center"
                                        type="number" id="capsule-qty" placeholder="0" min="1" max="5" step="1" required autocomplete="off">
                                    <label class="text h3 font-weight-bold text-body text-center"
                                        for="inputCapsuleQty"><strong>Jumlah Kapsul</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button id="dispensingStartButton"
                                class="btn btn-danger mt-4 mb-2 bg-gradient w-25 rounded-pill position-relative"
                                type="submit">Mulai</button>
                        </div>
                    </form>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                </div>
            </div>
        </div>
    </div>
    <div id="dispensingStartToast"
        class="toast align-items-center text-bg-light border-0 position-fixed top-50 start-50 translate-middle"
        role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="d-flex">
            <div class="toast-body">
                <div class="h5 text-center">
                    Parameter dispensing telah terkirim. Menunggu respons.
                </div>
            </div>
            <button type="button" id="dispensingStartToastCloseButton" class="btn-close btn-close-dark me-2 mt-2"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div id="dispensingFinishToast"
        class="toast align-items-center text-bg-light border-0 position-fixed top-50 start-50 translate-middle"
        role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="d-flex justify-content-center">
            <div class="toast-body">
                <div class="h5 text-center">
                    Dispensing telah selesai.
                </div>
            </div>
            <button type="button" id="dispensingFinishToastCloseButton" class="btn-close btn-close-dark me-2 mt-2"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div id="dispensingErrorToast" role="alert" aria-live="assertive" aria-atomic="true"
        class="toast  align-items-center text-bg-light border-0 position-fixed top-50 start-50 translate-middle"
        data-bs-autohide="false">
        <div class="toast-header">
            <svg xmlns="{{ asset('icon/dot.svg') }}" width="50" height="50" fill="red" class="bi bi-dot"
                viewBox="0 0 16 16">
                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
            </svg>
            <strong class="me-auto fst-italic fs-5 text-danger">Errors</strong>
            <button type="button" class="btn-close me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <div class="px-4 fs-6" id="dispensingErrorMessage"></div>
        </div>
    </div>
@endsection
