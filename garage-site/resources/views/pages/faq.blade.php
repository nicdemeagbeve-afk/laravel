@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-600 to-orange-600 text-white py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">❓ Foire aux Questions</h1>
            <p class="text-lg md:text-xl text-yellow-100">Trouvez les réponses à vos questions</p>
        </div>
    </div>

    <!-- FAQ Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-12 py-16 md:py-20">
        <!-- Categories -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-12">
            <button onclick="filterFAQ('all')" class="px-4 md:px-6 py-2 md:py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-medium text-sm md:text-base">Tous</button>
            <button onclick="filterFAQ('reservations')" class="px-4 md:px-6 py-2 md:py-3 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 transition font-medium text-sm md:text-base">Réservations</button>
            <button onclick="filterFAQ('services')" class="px-4 md:px-6 py-2 md:py-3 bg-gray-200 text-gray-900 rounded-lg hover:bg-gray-300 transition font-medium text-sm md:text-base">Services</button>
        </div>

        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition overflow-hidden" data-category="reservations">
                <button class="w-full flex items-center justify-between p-6 md:p-8 hover:bg-yellow-50 transition text-left" onclick="toggleFAQ(this)">
                    <span class="text-base md:text-lg font-bold text-gray-900">❓ Comment puis-je réserver un service de réparation?</span>
                    <span class="text-2xl text-yellow-600 transition transform duration-300 flex-shrink-0 ml-4">+</span>
                </button>
                <div class="hidden px-6 md:px-8 pb-6 md:pb-8 bg-yellow-50 border-t border-yellow-100">
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">Vous pouvez réserver un service en visitant notre page de réservation, en appelant directement notre garage, ou en soumettant une demande via le formulaire de contact. Nos équipes vous recontacteront pour confirmer votre rendez-vous dans un délai de 24 heures.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition overflow-hidden" data-category="reservations">
                <button class="w-full flex items-center justify-between p-6 md:p-8 hover:bg-yellow-50 transition text-left" onclick="toggleFAQ(this)">
                    <span class="text-base md:text-lg font-bold text-gray-900">📅 Quels sont les délais de rendez-vous?</span>
                    <span class="text-2xl text-yellow-600 transition transform duration-300 flex-shrink-0 ml-4">+</span>
                </button>
                <div class="hidden px-6 md:px-8 pb-6 md:pb-8 bg-yellow-50 border-t border-yellow-100">
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">Les rendez-vous sont généralement disponibles dans les 5 jours suivant votre demande. Nous offrons également des services d'urgence pour les réparations critiques. Consultez notre calendrier en ligne pour voir les créneaux disponibles.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition overflow-hidden" data-category="services">
                <button class="w-full flex items-center justify-between p-6 md:p-8 hover:bg-yellow-50 transition text-left" onclick="toggleFAQ(this)">
                    <span class="text-base md:text-lg font-bold text-gray-900">🔧 Quels types de réparations proposez-vous?</span>
                    <span class="text-2xl text-yellow-600 transition transform duration-300 flex-shrink-0 ml-4">+</span>
                </button>
                <div class="hidden px-6 md:px-8 pb-6 md:pb-8 bg-yellow-50 border-t border-yellow-100">
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">Nous proposons une gamme complète de services: maintenance préventive, réparations moteur, freinage, électrique, climatisation, et bien plus. Consultez notre page services pour une liste détaillée ou contactez-nous pour vos besoins spécifiques.</p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition overflow-hidden" data-category="services">
                <button class="w-full flex items-center justify-between p-6 md:p-8 hover:bg-yellow-50 transition text-left" onclick="toggleFAQ(this)">
                    <span class="text-base md:text-lg font-bold text-gray-900">💰 Comment sont calculés les tarifs?</span>
                    <span class="text-2xl text-yellow-600 transition transform duration-300 flex-shrink-0 ml-4">+</span>
                </button>
                <div class="hidden px-6 md:px-8 pb-6 md:pb-8 bg-yellow-50 border-t border-yellow-100">
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">Nos tarifs sont basés sur les pièces de rechange nécessaires et le temps de travail. Nous proposons toujours un devis gratuit avant de démarrer la réparation. Aucune surprise en fin de facture!</p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition overflow-hidden" data-category="reservations">
                <button class="w-full flex items-center justify-between p-6 md:p-8 hover:bg-yellow-50 transition text-left" onclick="toggleFAQ(this)">
                    <span class="text-base md:text-lg font-bold text-gray-900">🔙 Puis-je annuler ou modifier mon rendez-vous?</span>
                    <span class="text-2xl text-yellow-600 transition transform duration-300 flex-shrink-0 ml-4">+</span>
                </button>
                <div class="hidden px-6 md:px-8 pb-6 md:pb-8 bg-yellow-50 border-t border-yellow-100">
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">Oui, vous pouvez annuler ou modifier votre rendez-vous jusqu'à 48 heures avant l'heure prévue. Utilisez votre compte client ou contactez-nous directement. Une annulation moins de 48h peut entraîner des frais.</p>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition overflow-hidden" data-category="services">
                <button class="w-full flex items-center justify-between p-6 md:p-8 hover:bg-yellow-50 transition text-left" onclick="toggleFAQ(this)">
                    <span class="text-base md:text-lg font-bold text-gray-900">🚗 Offrez-vous des véhicules de remplacement?</span>
                    <span class="text-2xl text-yellow-600 transition transform duration-300 flex-shrink-0 ml-4">+</span>
                </button>
                <div class="hidden px-6 md:px-8 pb-6 md:pb-8 bg-yellow-50 border-t border-yellow-100">
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">Oui, nous proposons des véhicules de remplacement pour les réparations longues (plus de 3 jours). Un surcoût s'applique. Contactez-nous pour connaître les tarifs et la disponibilité.</p>
                </div>
            </div>

            <!-- FAQ Item 7 -->
            <div class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition overflow-hidden" data-category="services">
                <button class="w-full flex items-center justify-between p-6 md:p-8 hover:bg-yellow-50 transition text-left" onclick="toggleFAQ(this)">
                    <span class="text-base md:text-lg font-bold text-gray-900">✅ Avez-vous des garanties sur vos réparations?</span>
                    <span class="text-2xl text-yellow-600 transition transform duration-300 flex-shrink-0 ml-4">+</span>
                </button>
                <div class="hidden px-6 md:px-8 pb-6 md:pb-8 bg-yellow-50 border-t border-yellow-100">
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">Toutes nos réparations sont garanties 12 mois ou 20.000 km. Les pièces de rechange ont leur propre garantie du fabricant. Nous sommes confiants dans la qualité de notre travail!</p>
                </div>
            </div>

            <!-- FAQ Item 8 -->
            <div class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition overflow-hidden" data-category="reservations">
                <button class="w-full flex items-center justify-between p-6 md:p-8 hover:bg-yellow-50 transition text-left" onclick="toggleFAQ(this)">
                    <span class="text-base md:text-lg font-bold text-gray-900">💳 Quels modes de paiement acceptez-vous?</span>
                    <span class="text-2xl text-yellow-600 transition transform duration-300 flex-shrink-0 ml-4">+</span>
                </button>
                <div class="hidden px-6 md:px-8 pb-6 md:pb-8 bg-yellow-50 border-t border-yellow-100">
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">Nous acceptons les cartes de crédit, espèces, virements bancaires, et les solutions de financement. Demandez-nous pour des plans de paiement spécialisés ou des arrangements.</p>
                </div>
            </div>
        </div>

        <!-- Still Have Questions -->
        <div class="mt-12 md:mt-16 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl p-6 md:p-12 text-center border border-yellow-200">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Toujours des questions?</h2>
            <p class="text-gray-700 mb-6 text-sm md:text-base">Notre équipe est prête à vous aider</p>
            <a href="{{ route('contact') }}" class="inline-block px-6 md:px-8 py-2 md:py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold text-sm md:text-base">
                📧 Nous Contacter
            </a>
        </div>

        <!-- Back Button -->
        <div class="mt-8 md:mt-12">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-medium text-sm md:text-base">
                ← Retour à l'accueil
            </a>
        </div>
    </div>
</div>

<script>
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('.text-2xl');
        content.classList.toggle('hidden');
        icon.textContent = content.classList.contains('hidden') ? '+' : '−';
    }

    function filterFAQ(category) {
        const items = document.querySelectorAll('.faq-item');
        items.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        // Update button states
        document.querySelectorAll('button').forEach(btn => {
            if (btn.textContent.includes('Tous') || btn.textContent.includes('Réservations') || btn.textContent.includes('Services')) {
                btn.classList.remove('bg-orange-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-900');
            }
        });
        event.target.classList.remove('bg-gray-200', 'text-gray-900');
        event.target.classList.add('bg-orange-600', 'text-white');
    }
</script>
@endsection
