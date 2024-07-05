<?php
// Inclusion du fichier de configuration contenant les informations de connexion à la base de données
require "../src/database.php";

// Traitement des actions de mise à jour ou suppression de tâches si des données POST sont envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    if (isset($_POST['action']) && isset($_POST['task_id'])) {
        $action = $_POST['action'];
        $task_id = $_POST['task_id'];

        if ($action === 'mark_completed') {

            // Logique pour marquer la tâche comme terminée
            DBmarkTaskCompleted($task_id);
        } elseif ($action === 'delete') {

            // Logique pour supprimer la tâche
            DBdeleteTask($task_id);
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Base de données - Liste des tâches</title>
	<!-- Inclusion du fichier CSS pour le style -->
	<link rel="stylesheet" type="text/css" href="./assets/dbstyle.css">
</head>

<body>
	<div class="container">
		<h2>Base de données</h2>
		<ul>
			<?php
			// Chargement des données depuis database.php
			$data = DBgetTasks();
			foreach ($data as $task) {
				
				// Affichage des données de chaque utilisateur dans une liste
				echo "<li>";
				echo "<div><strong>Titre : </strong>" . htmlspecialchars($task["title"]) . "</div>";
				echo "<div><strong>Description : </strong>" . htmlspecialchars($task["description"]) . "</div>";
				echo "<div><strong>Statut : </strong>" . htmlspecialchars($task["status"]) . "</div>";
				echo "<div><strong>Date de création : </strong>" . htmlspecialchars($task["created_at"]) . "</div>";
				echo "<div><strong>Date d'échéance : </strong>" . htmlspecialchars($task["due_date"]) . "</div>";
				echo "<div><strong>Date de rappel : </strong>" . htmlspecialchars($task["reminder_date"]) . "</div>";
				echo "<div><strong>Priorité : </strong>" . htmlspecialchars($task["priority"]) . "</div>";
				echo "<div><strong>Statut / état de la tâche : </strong>" . htmlspecialchars($task["task_status"]) . "</div>";
				echo "<div><strong>Catégorie : </strong>" . htmlspecialchars($task["category"]) . "</div>";

				// Formulaire pour marquer la tâche comme terminée
				if ($task["status"] === 'in_progress') {
					echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
					echo '<input type="hidden" name="task_id" value="' . $task['id'] . '">';
					echo '<input type="hidden" name="action" value="mark_completed">';
					echo '<button type="submit">Marquer comme Terminé</button>';
					echo '</form>';
				}


                // Formulaire pour supprimer la tâche
                echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
                echo '<input type="hidden" name="task_id" value="' . $task['id'] . '">';
                echo '<input type="hidden" name="action" value="delete">';
                echo '<button type="submit">Supprimer</button>';
                echo '</form>';

				echo "</li><br>";			
			}
			?>
		</ul>
	</div>
</body>

</html>