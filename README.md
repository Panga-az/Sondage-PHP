# Nom du Projet 

**Sondage-PHP**

# Description :

> ***Ce projet permet à un utilisateur dejà enregistrer de participer à des questions de sondages, lui donnant accès de modifier , d'ajouter ou de supprimer des sondages,et enfin visualiser les resultats  sous forme de graphique et de non graphique.***

# Utilisation

> ***`git clone https://github.com/Panga-az/Sondage-PHP.git`***
>
> ***Ensuite vous allez dans le dossier database où vous trouverez le fichier sql que vous allez importer dans votre base de données. Ensuite il vous faudra faire des modifications dans le dossier config  en remplançant les information par les vôtres.***

# Structure de la Base de Données

> ***Les deux tables les plus importantes dans la base de données de ce projet sont : sondage_reponses et table_sondage_questions.***
>
> **Table *table_sondage_questions*** :
>
> * **`id`** : Un identifiant unique pour chaque question de sondage. Cela permet de référencer spécifiquement chaque question.
> * **`question`** : Le texte de la question qui est posée dans le sondage.
>
> **Table *sondage_reponses*** :
>
> * ***`id`*** : Un identifiant unique pour chaque réponse liée à une question.
> * ***`id_sondage`*** : Un champ de clé étrangère qui fait le lien entre chaque réponse et la question correspondante dans la table ***table_sondage_questions***. Ce champ assure que chaque réponse est correctement associée à une question.
> * ***`reponse`*** : Le texte de la réponse proposée pour une question de sondage.
> * ***`nbre_reponses`*** : Un compteur indiquant combien de fois cette réponse a été choisie par les répondants.
>
> ##### Logique Relationnelle
>
> * **Relation "One-to-Many"** : Une question dans ` table_sondage_questions` peut avoir plusieurs réponses associées dans `sondage_reponses`. Cela est géré par la clé étrangère `id_sondage` dans `sondage_reponses` qui référence `id` dans `table_sondage_questions.`

### Feuille de Route ou Mises à Jour Prévues

> ***Alors ce projet comporte quelques defauts qui vont être corriger lors des prochaines mises à jours. Comme par exemple l'utilisateur connecté peut repondre plusieurs fois aux sondages , ce qui n'est pas pratique, dans les prochaines mises à jour chaque utilisateur pourra répondre qu'une seule fois à chaque sondage.***
