# City-Motors — Plan de développement adapté au design fourni

## Vision
Plateforme B2B de vente et d’approvisionnement de roulements industriels, basée sur le design « Orbital Précision ». L’interface adopte une identité sombre (bleu nuit), avec accents orange et cyan, navigation persistante et parcours orienté achats professionnels.

## Périmètre fonctionnel constaté dans le design
- Catalogue de roulements avec recherche et filtres techniques (type, marque, jeu, étanchéité, alésage et disponibilité).
- Fiches produit avec dimensions, charges, vitesse limite, normes ISO/DIN et applications.
- Panier, devis express B2B et parcours de commande.
- Calculateur de tolérances ISO.
- Authentification et espace client.
- Comptes tarifaires Standard / MRO / OEM et remises différenciées.
- Suivi des commandes.
- Interface de navigation persistante et composants modaux.

## Planning révisé — 6 semaines

| Période | Lot | Travaux | Livrable / critère de validation |
|---|---|---|---|
| S1 | Cadrage & dépôt | Valider le besoin City-Motors, le périmètre B2B, les rôles, les règles métier, l’environnement Vite/React/TypeScript et la structure Git. | Cahier des charges, backlog priorisé, dépôt structuré et instructions d’installation. |
| S2 | Design & fondations | Reprendre fidèlement le thème sombre, les accents orange/cyan, la navigation persistante, les composants communs et le responsive. | Maquettes/écrans intégrés, navigation testée sur mobile et desktop. |
| S3 | Catalogue & données | Finaliser les types de roulements, données produits, images, cartes, fiche détaillée, recherche et filtres combinés. | Catalogue filtrable, fiches cohérentes et données de démonstration identifiées. |
| S4 | Parcours B2B | Développer authentification, profils clients, niveaux tarifaires, devis express, panier et calcul des remises. | Parcours de demande de devis et panier fonctionnels avec validations. |
| S5 | Commandes & outils techniques | Développer checkout, suivi de commande, calculateur de tolérances, gestion d’erreurs et persistance/API selon l’architecture retenue. | Parcours de commande et suivi testés; calculateur documenté. |
| S6 | Qualité & livraison | Tests fonctionnels et responsive, contrôle accessibilité, sécurité des données, correction des défauts, documentation et déploiement. | Version candidate, rapport de tests, README final et démonstration. |

## Backlog priorisé

### P0 — indispensable
1. Installation reproductible (`npm install`, `npm run dev`, `npm run build`).
2. Navigation, catalogue, recherche et filtres.
3. Fiche produit et panier.
4. Authentification réelle (ne pas conserver de compte client prérempli en production).
5. Devis et commande avec validation des données.
6. Gestion des secrets via variables d’environnement; aucun secret dans Git.

### P1 — valeur métier
1. Tarification Standard/MRO/OEM pilotée côté serveur.
2. Suivi des commandes et statuts.
3. Calculateur de tolérances ISO avec limites et avertissement technique.
4. Stock et disponibilité synchronisés avec une source fiable.

### P2 — amélioration
1. Import/export catalogue.
2. Documents techniques et certificats.
3. Historique des achats et commandes récurrentes.
4. Optimisation SEO, performance et accessibilité.

## Répartition des responsabilités
- **Master / chef de projet** : backlog, priorités, réunions, validation des livrables et arbitrages.
- **Dev Main** : architecture React/TypeScript, composants, logique métier, intégration et tests.
- **System Admin** : dépôt GitHub, branches, CI, variables d’environnement, sauvegardes et déploiement.
- **Designer** : cohérence visuelle avec le design fourni, responsive, états vides/erreurs et accessibilité.

## Méthode Git recommandée
- `main` : version stable.
- `develop` : intégration des fonctionnalités.
- `feature/<nom>` : une branche par fonctionnalité.
- Pull request obligatoire vers `develop`, revue par un autre membre, puis fusion contrôlée vers `main`.
- Commits courts et explicites (`feat:`, `fix:`, `docs:`, `test:`).

## Rituels d’équipe
- Lundi : planification et attribution des tâches.
- Mercredi : revue technique et blocages.
- Vendredi : démonstration, validation et mise à jour du backlog.

## Points de vigilance avant mise en production
- Les produits, stocks, prix, clients et commandes de démonstration doivent être remplacés ou clairement isolés des données réelles.
- La tarification, les remises, le stock et les autorisations doivent être vérifiés côté serveur.
- Ne jamais committer `.env`; utiliser `.env.example` sans valeurs sensibles.
- Les paiements et l’envoi réel de commandes nécessitent un prestataire et une intégration explicitement validés.
- Les normes et tolérances affichées doivent être vérifiées par une personne compétente avant usage industriel.

## Définition de terminé
Une fonctionnalité est terminée lorsque son interface est responsive, ses validations et erreurs sont gérées, ses données sensibles sont protégées, les tests pertinents passent et sa documentation est mise à jour.
