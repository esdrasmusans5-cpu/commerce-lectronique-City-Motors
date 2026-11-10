# City Motors — Boutique automobile en ligne

Application React + TypeScript + Vite construite à partir des documents de cadrage et de la maquette présents dans ce dépôt.

## Fonctionnalités de la maquette
- Catalogue automobile, recherche par marque/modèle/référence, filtres par catégorie et tri.
- Fiche véhicule avec caractéristiques et prix indicatif.
- Panier avec quantités, suppression et total estimatif.
- Formulaire de demande de commande avec coordonnées et mode de paiement souhaité (Mobile Money, virement, carte, paiement à la livraison ou rappel conseiller).
- Référence de commande et suivi de statut.
- Espace d'administration de démonstration pour consulter les demandes et changer leur statut.
- Sauvegarde locale du panier et des commandes via localStorage.

## Démarrer
```bash
npm install
npm run dev
``

## Compiler
```bash
npm run build
``

## Important avant mise en production
Cette version est un prototype frontend. Les véhicules et prix sont des données de démonstration reprises de la maquette initiale. Les commandes sont stockées uniquement dans le navigateur courant. Il n'y a pas encore de vraie authentification, de base de données partagée, de gestion de stock, ni de paiement en ligne. Ne collectez pas de données clients réelles avant d'avoir ajouté un backend sécurisé, une authentification administrateur, la validation serveur, les protections anti-abus et une intégration de paiement approuvée.

## Suite recommandée
1. Importer et valider le catalogue officiel (références, prix, photos, disponibilité).
2. Créer l'API et la base de données (utilisateurs, véhicules, catégories, paniers, commandes, paiements).
3. Ajouter les rôles client/administrateur et la gestion des stocks.
4. Connecter les paiements retenus (notamment Mobile Money) via un prestataire compatible et gérer les webhooks côté serveur.
5. Déployer, tester le parcours complet et configurer sauvegardes et journalisation.
