<?php
// Inclusion du fichier de configuration contenant les informations de connexion à la base de données
require "../src/database.php";
DBregister();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulaire de Liste des tâches</title>
    <!-- Inclusion du fichier CSS pour le style -->
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>

<body>
    <div class="container">
        <h2>Formulaire de Liste des tâches</h2>
        <?php
        // Affichage du message d'erreur s'il y en a un
        if (isset($errorMessage)) {
            echo '<p class="error">' . $errorMessage . '</p>';
        }
        ?>
        <!-- Formulaire d'inscription avec méthode POST -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="title">Titre :</label><br>
            <input type="text" id="title" class="item" name="title"><br>

            <label for="description">Description :</label><br>
            <input type="text" id="description" class="item" name="description"><br>

            <label for="status">Statut :</label><br>
            <select id="status" class="item" name="status">
                <option value ="in_progress">En Progression</option>
                <option value ="done">Terminé</option>
            </select></br>

            <label for="due_date">Date d'échéance :</label><br>
            <input type="date" id="due_date" class="item" name="due_date"><br>

            <label for="reminder_date">Date de rappel :</label><br>
            <input type="date" id="reminder_date" class="item" name="reminder_date"><br>

            <label for="priority">Priorité :</label><br>
            <select id="priority" class="item" name="priority">
                <option value ="Basse">Basse</option>
                <option value ="Moyenne">Moyenne</option>
                <option value ="Haute">Haute</option>
            </select></br>

            <label for="task_status">Statut / état de la tâche :</label><br>
            <input type="text" id="task_status" class="item" name="task_status"><br>

            <label for="category">Catégorie :</label><br>
            <input type="text" id="category" class="item" name="category"><br>

            <input type="submit" class="submitButton" value="Soumettre">
        </form>
    </div>
</body>

</html>