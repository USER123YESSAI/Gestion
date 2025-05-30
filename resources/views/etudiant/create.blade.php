@extends('layouts.base')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Enregistrer un etudiant</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('etudiant.index') }}">etudiant</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ajouter</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!--begin::Horizontal Form-->
                    <div class="card card-secondary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Formulaire d'ajout d'un etudiant</div>
                        </div>

                        @session('success')
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endsession
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action="{{ route('etudiant.store') }}" method="POST">
                            @csrf
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nom" class="form-control" id="name" />
                                        @error('nom_complet')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>

                            
                                <div class="row mb-3">
                                    <label for="firsname" class="col-sm-3 col-form-label">prenom</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="prenom" class="form-control" id="firsname" />
                                        @error('telephone')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="date_naissance" class="col-sm-3 col-form-label">Date_naissance</label>
                                        <div class="col-sm-9">
                                            <input type="Date" name="Date_naissance" class="form-control" id="date_naissance" />
                                            @error('Date_naissance')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary">Enregistrer</button>
                                <a href="{{ route('etudiant.index') }}" class="btn float-end">Revenir sur la liste</a>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Horizontal Form-->
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>
            <!--end::Row-->
        </div>
    </div>
    <!--end::App Content-->
@endsection
