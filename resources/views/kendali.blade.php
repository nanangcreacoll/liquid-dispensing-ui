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
                                    <div class="status-circle bg-success "></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="" id="dispensingDataFrom">
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 col-lg-4 mb-2">
                                <div class="card shadow border-0 position-relative" style="border-radius: 12%;">
                                    <input
                                        class="mt-5 border-0 from-control text h1 text-large font-weight-bold text-body text-uppercase text-center"
                                        type="text" id="volume" placeholder="00" required>
                                    <label class="text h3 font-weight-bold text-body text-center"
                                        for="inputVolume"><strong>Volume</strong></label>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 mb-2">
                                <div class="card shadow border-0 position-relative" style="border-radius: 12%;">
                                    <input
                                        class="mt-5 border-0 from-control text h1 text-large font-weight-bold text-body text-uppercase text-center"
                                        type="text" id="capsule-qty" placeholder="0" required>
                                    <label class="text h3 font-weight-bold text-body text-center"
                                        for="inputCapsuleQty"><strong>Jumlah Kapsul</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-danger mt-4 mb-2 bg-gradient w-25 rounded-pill position-relative" type="submit">Mulai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
