# Application de gestion de tâches (To-Do List)

Cette application web vous permet de gérer une liste de tâches (to-do list) en utilisant une base de données MySQL pour stocker les informations.

Suivez les étapes ci-dessous pour démarrer :

# Utilisation

1. Assurez-vous d'avoir installé la base de données MySQL avec le fichier .sql fourni
2. Mettez à jour les informations de connexion dans le fichier config.php
3. Déployez le code sur un serveur PHP compatible (avec "php -S localhost:8080")
4. Accédez à la page du formulaire dans votre navigateur (avec localhost:8080/public/register.php)
5. Remplissez le formulaire et soumettez vos informations
6. Les données seront stockées dans la base de données et vous serez redirigé vers la page de base de données

# Fonctionnalités

* Ajouter une tâche : Remplissez le formulaire sur la page d'inscription pour ajouter une nouvelle tâche avec un titre, une description, un statut, une date d'échéance, une date de rappel, une priorité, un statut/état et une catégorie.
* Afficher les tâches : Les tâches ajoutées sont affichées sur la page de base de données (tasks.php) avec toutes leurs informations.
* Marquer comme terminé : Pour une tâche en cours, vous pouvez la marquer comme terminée en cliquant sur le bouton approprié à côté de la tâche.
* Supprimer une tâche : Chaque tâche dispose également d'un bouton pour la supprimer de la base de données.