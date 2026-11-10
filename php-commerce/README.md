# Orbital Précision — plateforme e-commerce B2B

Application PHP 8.1+, MySQL 8+, HTML/CSS et JavaScript natif.

## Installation locale
1. Copier le dossier `php-commerce` dans le répertoire public de XAMPP/WAMP ou du serveur PHP.
2. Créer la base : importer `database.sql` dans MySQL.
3. Configurer les constantes DB_HOST, DB_NAME, DB_USER et DB_PASS dans `config.php` (ou définir les variables d'environnement).
4. Ouvrir `http://localhost/php-commerce/`.

## Fonctionnalités du prototype
- Catalogue filtrable par référence, nom et famille.
- Fiches produits techniques avec dimensions lorsque disponibles.
- Sélection de références et quantités.
- Transmission de demandes de devis et enregistrement MySQL.
- Consultation du statut d'une commande avec sa référence.

## Important avant production
Les produits DEMO du SQL sont des exemples génériques, pas un catalogue fournisseur validé. Remplacer par les références exactes, fiches techniques, marques, prix, unités et stocks fournis par l'entreprise. Les paiements en ligne ne sont pas activés : le parcours transmet une demande de devis. Ajouter l'espace d'administration sécurisé, les droits utilisateurs, les emails, les journaux, la politique de sauvegarde, les tests et HTTPS avant déploiement. Créer le premier compte administrateur via un script CLI utilisant password_hash(); ne jamais stocker de mot de passe en clair.
