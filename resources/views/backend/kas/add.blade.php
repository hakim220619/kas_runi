@extends('backend.layout.base')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4>{{ $title }}</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ Helper::apk()->app_name }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">{{ $title }}</a></li>

                </ol>
            </div>
        </div>
        {{-- <div class="col-sm-6">
            <div class="state-information d-none d-sm-block">
                <div class="state-graph">
                    <div id="header-chart-1"></div>
                    <div class="info">Balance $ 2,317</div>
                </div>
                <div class="state-graph">
                    <div id="header-chart-2"></div>
                    <div class="info">Item Sold 1230</div>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- end page title -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="kas/addProses" method="POST" class="custom-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="full_name">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                         placeholder="Masukan Title" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-md-2 col-form-label" for="status">Jenis Kas</label>
                                    <select class="form-control" name="jenis" id="jenis" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Kas Masuk">Kas Masuk</option>
                                        <option value="Kas Keluar">Kas Keluar</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Jumlah</label>
                                    <input type="text" class="form-control" id="count" name="count"
                                         placeholder="Masukan Jumlah" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Nominal</label>
                                    <input type="text" class="form-control" id="sum" name="sum"
                                         placeholder="Masukan Nominal" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                       placeholder="Masukan Description" required />
                                </div>
                            </div>


                            <div class="col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/kas" type="button" class="btn btn-success">Kembali</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
