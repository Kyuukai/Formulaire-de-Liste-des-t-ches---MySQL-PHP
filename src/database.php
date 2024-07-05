<?php
// Inclusion du fichier de configuration contenant les informations de connexion à la base de données
require "config.php";

// Fonction pour récupérer toutes les tâches depuis la base de données
function DBgetTasks()
{
    try {
        // Création d'une instance PDO pour se connecter à la base de données en utilisant les informations fournies dans le fichier config.php
        $pdo = new PDO(DSN, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour sélectionner toutes les tâches
        $sql = "SELECT * FROM tasks";

        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Exécution de la requête
        $stmt->execute();

        // Récupération de toutes les lignes de résultats
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;
    } catch (PDOException $e) {
        // Gestion des exceptions PDO, affichage d'un message d'erreur
        $errorMessage = "Erreur de connexion : " . $e->getMessage();
        http_response_code(500);
        echo $errorMessage;
        return []; // Retourner un tableau vide en cas d'erreur
    }
}

// Fonction pour marquer une tâche comme terminée
function DBmarkTaskCompleted($task_id)
{
    try {
        // Création d'une instance PDO pour se connecter à la base de données en utilisant les informations fournies dans le fichier config.php
        $pdo = new PDO(DSN, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour mettre à jour le statut de la tâche avec l'ID spécifié
        $sql = "UPDATE tasks SET status = 'done' WHERE id = :task_id";

        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':task_id', $task_id);

        // Exécution de la requête
        $stmt->execute();
    } catch (PDOException $e) {
        // Gestion des exceptions PDO, affichage d'un message d'erreur
        $errorMessage = "Erreur de connexion : " . $e->getMessage();
        http_response_code(500);
        echo $errorMessage;
    }
}

// Fonction pour supprimer une tâche
function DBdeleteTask($task_id)
{
    try {
        // Création d'une instance PDO pour se connecter à la base de données en utilisant les informations fournies dans le fichier config.php
        $pdo = new PDO(DSN, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour supprimer la tâche avec l'ID spécifié
        $sql = "DELETE FROM tasks WHERE id = :task_id";

        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':task_id', $task_id);

        // Exécution de la requête
        $stmt->execute();
    } catch (PDOException $e) {
        // Gestion des exceptions PDO, affichage d'un message d'erreur
        $errorMessage = "Erreur de connexion : " . $e->getMessage();
        http_response_code(500);
        echo $errorMessage;
    }
}

// Fonction pour enregistrer une nouvelle tâche dans la base de données
function DBregister()
{
    try {
        // Création d'une instance PDO pour se connecter à la base de données en utilisant les informations fournies dans le fichier config.php
        $pdo = new PDO(DSN, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérification si la requête est de type POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération des données du formulaire
            $title = $_POST['title'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $created_at = date('Y-m-d H:i:s');
            $due_date = $_POST['due_date'];
            $reminder_date = $_POST['reminder_date'];
            $priority = $_POST['priority'];
            $task_status = $_POST['task_status'];
            $category = $_POST['category'];

            // Vérification que tous les champs sont remplis
            if (!empty($title) && !empty($description) && !empty($status) && !empty($due_date) && !empty($reminder_date) && !empty($priority) && !empty($task_status) && !empty($category)) {

                // Requête SQL pour insérer les données dans la table 'tasks'
                $sql = "INSERT INTO tasks (title, description, status, created_at, due_date, reminder_date, priority, task_status, category) 
                        VALUES (:title, :description, :status, :created_at, :due_date, :reminder_date, :priority, :task_status, :category)";

                // Préparation de la requête
                $stmt = $pdo->prepare($sql);

                // Liaison des paramètres
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':created_at', $created_at);
                $stmt->bindParam(':due_date', $due_date);
                $stmt->bindParam(':reminder_date', $reminder_date);
                $stmt->bindParam(':priority', $priority);
                $stmt->bindParam(':task_status', $task_status);
                $stmt->bindParam(':category', $category);

                // Exécution de la requête
                $stmt->execute();

                // Redirection vers la page de base de données après l'inscription réussie
                header("Location: tasks.php");
                exit();
            } else {
                // Message d'erreur si tous les champs ne sont pas remplis
                $errorMessage = "Tous les champs doivent être remplis.";
            }
        }
    } catch (PDOException $e) {
        // Gestion des exceptions PDO, affichage d'un message d'erreur
        $errorMessage = "Erreur de connexion : " . $e->getMessage();
        http_response_code(500);
        echo $errorMessage;
    }
}
?>
