@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="container hero-content">
        <div class="hero-text">
            <h1>Gérez votre garage<br>de manière intelligente</h1>
            <p>
                AutoGo est une solution moderne de gestion de véhicules,
                techniciens et réparations pour les garages et ateliers automobiles.
            </p>

            <div class="hero-actions">
                <a href="/vehicules" class="btn-primary">Commencer</a>
                <a href="/reparations" class="btn-secondary">Voir les réparations</a>
            </div>
        </div>

        <div class="hero-image">
            <img src="{{ asset('images/hero-garage.png') }}" alt="Garage management">
        </div>
    </div>
</section>

<section class="features">
    <div class="container">
        <h3 class="section-title">Fonctionnalités principales</h3>

        <div class="features-grid">

            <div class="feature-card">
                <img src="{{ asset('images/vehicule.jpg') }}" alt="Véhicules">
                <h4>Gestion des véhicules</h4>
                <p>
                    Enregistrez, consultez et suivez tous les véhicules
                    pris en charge par votre garage.
                </p>
            </div>

            <div class="feature-card">
                <img src="{{ asset('images/technicien.jpg') }}" alt="Techniciens">
                <h4>Gestion des techniciens</h4>
                <p>
                    Organisez votre équipe, suivez les spécialités
                    et attribuez les réparations efficacement.
                </p>
            </div>

            <div class="feature-card">
                <img src="{{ asset('images/reparation.jpg') }}" alt="Réparations">
                <h4>Suivi des réparations</h4>
                <p>
                    Gardez l’historique des interventions et assurez
                    un meilleur suivi client.
                </p>
            </div>

        </div>
    </div>
</section>

<section class="workflow">
    <div class="container">
        <h3 class="section-title">Comment fonctionne AutoGo ?</h3>

        <div class="workflow-steps">

            <div class="step">
                <span class="step-number">1</span>
                <h4>Enregistrer un véhicule</h4>
                <p>
                    Le garage ajoute les informations du véhicule
                    afin de suivre son historique.
                </p>
            </div>

            <div class="step">
                <span class="step-number">2</span>
                <h4>Assigner un technicien</h4>
                <p>
                    Un technicien est associé à une réparation
                    selon sa spécialité.
                </p>
            </div>

            <div class="step">
                <span class="step-number">3</span>
                <h4>Suivre la réparation</h4>
                <p>
                    Le garage suit l’avancement et conserve
                    l’historique des interventions.
                </p>
            </div>

        </div>
    </div>
</section>

<section class="audience">
    <div class="container audience-content">
        <div class="audience-text">
            <h3>Un outil pensé pour les garages</h3>
            <p>
                AutoGo aide les ateliers automobiles à mieux organiser
                leur travail, réduire les erreurs et améliorer le suivi
                des interventions.
            </p>

            <ul>
                <li>✔ Gain de temps au quotidien</li>
                <li>✔ Meilleure organisation des équipes</li>
                <li>✔ Historique clair des réparations</li>
            </ul>
        </div>

        <div class="audience-image">
            <img src="{{ asset('images/garage-team.jpeg') }}" alt="Équipe de garage">
        </div>
    </div>
</section>

<section class="cta">
    <div class="container cta-content">
        <h3>Prêt à organiser votre garage ?</h3>
        <p>
            Commencez dès maintenant à gérer vos véhicules,
            techniciens et réparations avec AutoGo.
        </p>
        <a href="/vehicules" class="btn btn-primary">Commencer maintenant</a>
    </div>
</section>


@endsection
