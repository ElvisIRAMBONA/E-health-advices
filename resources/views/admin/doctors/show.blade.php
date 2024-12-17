<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('partials.navbar')

    @extends('layouts.app')

    @section('title', 'Doctors page')


    <section class="pt-0">
        <div class="container">
            <!-- Title -->


            <div class="row g-3">
                @foreach($doctors as $doctor)
                <div class="col-sm-6 col-md-3 col-xl-3">

                    <div class="card shadow h-100">l
                        @if($doctor->image_url)
                        <img src="{{ $doctor->image_url }}" class="img-fluid" alt="{{ $doctor->name }}">
                        @else
                        <img src="{{asset('assets/images/bg/doctors.jpeg')}}" class="img-fluid"
                            alt="No image available">
                        @endif

                        <div class="card-body pb-0">

                            <h5 class="card-title fw-normal">{{ $doctor['name'] }}</h5>
                            <p class=" mb-2 text-truncate-2">{{ $doctor['specialization'] }}</p>
                            <p class="mb-2 text-truncate-2">{{ $doctor['location'] }}</p>
                            <p class="mb-2 text-truncate-2">{{ $doctor['contact'] }}</p>

                        </div><!-- Card footer -->
                        <div class="card-footer pt-0 pb-3">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <!-- Bouton pour prendre un rendez-vous -->
                                <a href="{{ route('appointments.create',$doctor->id) }}" class="btn btn-primary">
                                    Book Appointment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="pt-0">
        <div class="container">
            <!-- Title -->
            <h2 class="text-center mb-4">Conseils de santé</h2>

            <div class="row g-3">
                <!-- Diabète -->
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="card shadow h-100">
                        <img src=<img src="{{asset('images/images.jpeg')}}" class="img-fluid" class="img-fluid"
                            alt="Conseils pour le diabète">
                        <div class="card-body pb-0">
                            <h5 class="card-title fw-normal">Conseils pour le Diabète</h5>
                            <p class="mb-2 text-truncate-2">
                                Maintenez un régime alimentaire équilibré, surveillez votre glycémie régulièrement et
                                faites de l'exercice physique modéré.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Cancer -->
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="card shadow h-100">
                        <img src="{{ asset('assets/images/cancer.jpg') }}" class="img-fluid"
                            alt="Conseils pour le cancer">
                        <div class="card-body pb-0">
                            <h5 class="card-title fw-normal">Conseils pour le Cancer</h5>
                            <p class="mb-2 text-truncate-2">
                                Adoptez un mode de vie sain, faites des dépistages réguliers et consultez un médecin en
                                cas de symptômes inhabituels.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Hypertension -->
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="card shadow h-100">
                        <img src="{{ asset('assets/images/hypertension.jpg') }}" class="img-fluid"
                            alt="Conseils pour l'hypertension">
                        <div class="card-body pb-0">
                            <h5 class="card-title fw-normal">Conseils pour l'Hypertension</h5>
                            <p class="mb-2 text-truncate-2">
                                Réduisez votre consommation de sel, évitez le stress, et pratiquez une activité physique
                                régulière.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Suggestions -->
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="card shadow h-100">
                        <img src="{{ asset('assets/images/download (2).jpg') }}" class="img-fluid"
                            alt="Suggestions de santé">
                        <div class="card-body pb-0">
                            <h5 class="card-title fw-normal">Suggestions</h5>
                            <p class="mb-2 text-truncate-2">
                                Explorez nos articles pour en savoir plus sur la prévention des maladies chroniques et
                                améliorer votre qualité de vie.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/app.js') }}">
    </script>
    @include('partials.footer')
</body>

</html>