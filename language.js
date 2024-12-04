// language.js




document.addEventListener("DOMContentLoaded", () => {
    const savedLanguage = localStorage.getItem("language") || "en";
  
    applyLanguage(savedLanguage);
  
    // Function to apply selected language
    function applyLanguage(language) {
      const translations = {
        en: {
          homeTitle: "Welcome to Aerolert's Management System",
          homeDescription: "Aerolert helps aviation professionals streamline their operations, manage flight schedules, and provide exceptional service to travelers.",
          flights: "Flights",
          tickets: "Tickets",
          travelers: "Travelers",
          notifications: "Notifications",
          reports: "Reports",
          help: "Help Center",
          settings: "Settings",
          user: "User",
          managed: "Flights Managed",
          assisted: "Travelers Assisted",
          sent: "Notifications Sent",
          features:"Key Features",
          real:"Real-time Flight Management",
          automated:"Automated Notifications",
          user2:"User-Friendly Reports",
          intuitive:"Intuitive Ticket Booking",
          dashboard: "Dashboard",
          good: "Good morning",
          good: "Good afternoon",
          good: "Good evening",
          faerolert:"Aerolert is your trusted aviation management platform, ensuring seamless flight operations and communication for travelers and staff.",
           aboutus:"About Us",
           about2:"At Aerolert, we are committed to revolutionizing the aviation industry by providing real-time updates to travelers worldwide. Our innovative solution instantly informs passengers of any flight cancellations or schedule changes, ensuring they stay ahead of disruptions and make informed travel decisions. By bridging the gap between airlines and travelers, we aim to create a seamless and stress-free journey for every passenger.",
        ahead:"About",
        informed2:"Stay Informed, Travel Confidently",
        
        omission:"Our Mission",
        ovision:"Our Vision",
        visionb:"To be the global leader in enhancing travel reliability by delivering instant and accurate flight information, making air travel more predictable and stress-free.",
        missionb:"Our mission is to empower travelers with timely and precise notifications about their flights, minimizing inconveniences and fostering trust between airlines and passengers. Through cutting-edge technology and a user-centric approach, we strive to improve the travel experience, one flight at a time",

        missions:"Mission Statement",
        missionsb:"To transform air travel by providing passengers with instant, reliable notifications about flight cancellations and schedule changes. We aim to minimize travel disruptions, improve communication between airlines and passengers, and ensure a smoother, more predictable journey for everyone.",

         tteam:"Meet The Team",
         oteam:"Join Our Team",
        
        },
        es: {
          homeTitle: "Bienvenido al Sistema de Gestión de Aerolert",
          homeDescription: "Aerolert ayuda a los profesionales de la aviación a optimizar sus operaciones, gestionar horarios de vuelos y brindar un servicio excepcional a los viajeros.",
          flights: "Vuelos",
          tickets: "Boletos",
          travelers: "Viajeros",
          notifications: "Notificaciones",
          reports: "Informes",
          help: "Centro de Ayuda",
          settings: "Configuraciones",
          user: "Usuario",
          managed: "Vuelos gestionados",
          assisted: "Viajeros asistidos",
          sent: "Notificaciones enviadas",
          features:"Características clave",
          real:"Gestión de vuelos en tiempo real",
          automated:"Notificaciones automatizadas",
          user2:"Informes fáciles de usar",
          intuitive:"Reserva de boletos intuitiva",
          dashboard: "Tablero",
          good: " Buenos días",
          good: "Buenas tardes",
          good: "Buenas noches",
          faerolert:"Aerolert es su plataforma de gestión de aviación confiable, que garantiza operaciones de vuelo fluidas y comunicación para viajeros y personal.",
          aboutus:"Sobre Nosotros",
          about2:"En Aerolert, estamos comprometidos a revolucionar la industria de la aviación proporcionando actualizaciones en tiempo real a viajeros de todo el mundo. Nuestra solución innovadora informa instantáneamente a los pasajeros sobre cancelaciones de vuelos o cambios en los horarios, asegurando que se mantengan al tanto de las interrupciones y puedan tomar decisiones de viaje informadas. Al cerrar la brecha entre las aerolíneas y los viajeros, nuestro objetivo es crear un viaje sin estrés y sin inconvenientes para cada pasajero.",
          ahead:"Acerca de",
          informed2:"Mantente informado, viaja con confianza",

          omission:"Nuestra Misión",
          ovision:"Nuestra Visión",
          visionb:"Ser el líder mundial en mejorar la fiabilidad de los viajes, proporcionando información de vuelos instantánea y precisa, haciendo que los viajes aéreos sean más predecibles y libres de estrés.",
          missionb:"Nuestra misión es empoderar a los viajeros con notificaciones oportunas y precisas sobre sus vuelos, minimizando inconvenientes y fomentando la confianza entre aerolíneas y pasajeros. A través de tecnología de vanguardia y un enfoque centrado en el usuario, nos esforzamos por mejorar la experiencia de viaje, un vuelo a la vez.",

          missions:"Declaración de la Misión",
          missionsb:"Transformar los viajes aéreos proporcionando a los pasajeros notificaciones instantáneas y confiables sobre cancelaciones de vuelos y cambios de horarios. Nuestro objetivo es minimizar las interrupciones en los viajes, mejorar la comunicación entre aerolíneas y pasajeros, y garantizar un viaje más fluido y predecible para todos.",
          tteam:"Conoce al Equipo",
          oteam:"Únete a Nuestro Equipo",
        },
        fr: {
          homeTitle: "Bienvenue dans le Système de Gestion d'Aerolert",
          homeDescription: "Aerolert aide les professionnels de l'aviation à rationaliser leurs opérations, gérer les horaires des vols et offrir un service exceptionnel aux voyageurs.",
          flights: "Vols",
          tickets: "Billets",
          travelers: "Voyageurs",
          notifications: "Notifications",
          reports: "Rapports",
          help: "Centre d'Aide",
          settings: "Paramètres",
          user: "Utilisateur",
          managed: "Vols gérés",
          assisted: "Voyageurs assistés",
          sent: "Notifications envoyées",
          features:"Caractéristiques principales",
          real:"Gestion des vols en temps réel",
          automated:"Notifications automatisées",
          user2:"Rapports conviviaux",
          intuitive:"Réservation de billets intuitive",
          dashboard: "Tableau de bord",
          good: "Bonjour",
          good: "Bon après-midi",
          good: "Bonsoir",
          faerolert:"Aerolert est votre plateforme de gestion de l'aviation de confiance, garantissant des opérations de vol fluides et une communication pour les voyageurs et le personnel.",
          aboutus:"À Propos de Nous",
          about2:"Chez Aerolert, nous nous engageons à révolutionner l'industrie de l'aviation en fournissant des mises à jour en temps réel aux voyageurs du monde entier. Notre solution innovante informe instantanément les passagers de toute annulation de vol ou modification d'horaire, leur permettant de rester informés des perturbations et de prendre des décisions de voyage éclairées. En comblant le fossé entre les compagnies aériennes et les voyageurs, nous visons à offrir un voyage fluide et sans stress à chaque passager.",
          ahead:"À propos",
          informed2:"Restez informé, voyagez en toute confiance",

          omission:"Notre Mission",
          ovision:"Notre Vision",
          visionb:"Être le leader mondial dans l'amélioration de la fiabilité des voyages en fournissant des informations de vol instantanées et précises, rendant les voyages aériens plus prévisibles et sans stress.",
          missionb:"Notre mission est de donner aux voyageurs des notifications opportunes et précises concernant leurs vols, minimisant ainsi les inconvénients et favorisant la confiance entre les compagnies aériennes et les passagers. Grâce à une technologie de pointe et une approche centrée sur l'utilisateur, nous nous efforçons d'améliorer l'expérience de voyage, un vol à la fois.",

          missions:"Déclaration de Mission",
          missionsb:"Transformer les voyages aériens en fournissant aux passagers des notifications instantanées et fiables concernant les annulations de vols et les changements d'horaires. Nous visons à minimiser les perturbations des voyages, à améliorer la communication entre les compagnies aériennes et les passagers, et à garantir un voyage plus fluide et prévisible pour tous.",
          tteam:"Rencontrez l'Équipe",
          oteam:"Rejoignez Notre Équipe",
        },
        de: {
          homeTitle: "Willkommen im Management-System von Aerolert",
          homeDescription: "Aerolert hilft Luftfahrtprofis, ihre Abläufe zu optimieren, Flugpläne zu verwalten und Reisenden außergewöhnlichen Service zu bieten.",
          flights: "Flüge",
          tickets: "Tickets",
          travelers: "Reisende",
          notifications: "Benachrichtigungen",
          reports: "Berichte",
          help: "Hilfezentrum",
          settings: "Einstellungen",
          user: "Benutzer",
          managed: "Verwaltete Flüge",
          assisted: "Unterstützte Reisende",
          sent: "Benachrichtigungen gesendet",
          features:"Hauptmerkmale",
          real:"Echtzeit-Flugverwaltung",
          automated:"Automatisierte Benachrichtigungen",
          user2:"Benutzerfreundliche Berichte",
          intuitive:"Intuitive Ticketbuchung",
          dashboard: "Dashboard",
          good: "Guten Morgen",
          good: "Guten Nachmittag",
          good: "Guten Abend",
          faerolert:"Aerolert ist Ihre vertrauenswürdige Plattform für das Luftfahrtmanagement, die nahtlose Flugabläufe und Kommunikation für Reisende und Personal gewährleistet.",
          aboutus:"Über Uns",
          about2:"Bei Aerolert setzen wir uns dafür ein, die Luftfahrtindustrie zu revolutionieren, indem wir Reisenden weltweit Echtzeit-Updates zur Verfügung stellen. Unsere innovative Lösung informiert Passagiere sofort über Flugausfälle oder Änderungen im Flugplan, sodass sie über Störungen informiert bleiben und fundierte Reiseentscheidungen treffen können. Indem wir die Lücke zwischen Fluggesellschaften und Reisenden schließen, möchten wir jedem Passagier eine nahtlose und stressfreie Reise ermöglichen.",
          ahead:"Über",
          informed2:"Bleiben Sie informiert, reisen Sie mit Vertrauen",

          omission:"Unsere Mission",
          ovision:"Unsere Vision",
          visionb:"Der weltweite Marktführer bei der Verbesserung der Reisezuverlässigkeit zu sein, indem wir sofortige und präzise Fluginformationen liefern und den Luftverkehr vorhersagbarer und stressfreier machen.",
          missionb:"Unsere Mission ist es, Reisende mit rechtzeitigen und präzisen Benachrichtigungen über ihre Flüge zu stärken, Unannehmlichkeiten zu minimieren und das Vertrauen zwischen Fluggesellschaften und Passagieren zu fördern. Durch modernste Technologie und einen benutzerzentrierten Ansatz streben wir danach, das Reiseerlebnis, Flug für Flug, zu verbessern.",

          missions:"Missionserklärung",
        missionsb:"Die Luftfahrt revolutionieren, indem wir den Passagieren sofortige, zuverlässige Benachrichtigungen über Flugstornierungen und Zeitplanänderungen bieten. Unser Ziel ist es, Reiseunterbrechungen zu minimieren, die Kommunikation zwischen Fluggesellschaften und Passagieren zu verbessern und eine reibungslosere, vorhersehbarere Reise für alle zu gewährleisten.",

        tteam:"Lerne das Team kennen",


        oteam:"Tritt Unserem Team Bei",


        },
      };
  
      const translation = translations[language];
      if (translation) {
        // Update content dynamically
        const elements = {
          homeTitle: document.querySelector("#homeTitle"),
          homeDescription: document.querySelector("#homeDescription"),
          flights: document.querySelector("#navFlights"),
          tickets: document.querySelector("#navTickets"),
          travelers: document.querySelector("#navTravelers"),
          notifications: document.querySelector("#navNotifications"),
          reports: document.querySelector("#navReports"),
          help: document.querySelector("#navHelp"),
          settings: document.querySelector("#navSettings"),
          user: document.querySelector("#navUser"),
          managed: document.querySelector("#idManaged"),
          assisted: document.querySelector("#idAssisted"),
          sent: document.querySelector("#idSent"),
          features: document.querySelector("#idFeatures"),
          real: document.querySelector("#idReal"),
          automated: document.querySelector("#idAutomated"),
          user2: document.querySelector("#idUser"),
          intuitive: document.querySelector("#idIntuitive"),
          dashboard: document.querySelector("#dashboard"),
          good: document.querySelector("#good"),
          faerolert: document.querySelector("#faerolert"),
          aboutus: document.querySelector("#aboutus"),
          about2: document.querySelector("#about2"),
          ahead: document.querySelector("#ahead"),
          informed2: document.querySelector("#informed2"),
          omission: document.querySelector("#omission"),
          ovision: document.querySelector("#ovision"),
          visionb: document.querySelector("#visionb"),
          missionb: document.querySelector("#missionb"),
          missions: document.querySelector("#missions"),
          missionsb: document.querySelector("#missionsb"),
          tteam: document.querySelector("#tteam"),
          oteam: document.querySelector("#oteam"),
        };
  
        for (const key in elements) {
          if (elements[key] && translation[key]) {
            elements[key].textContent = translation[key];
          }
        }
      }
    }
  });
  
  