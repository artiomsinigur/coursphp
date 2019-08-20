<?php
    // Qu’est-ce qu’une API? ==================//
    /*
    • API : Application Programming Interface
    • En termes généraux, une API est une interface de programmation applicative.
    • C’est en fait par une telle interface que les applications (Web ou autres) fournissent
    un accès à un sous-ensemble des fonctionnalités dont elles seules connaissent la
    logique interne. Elles sont généralement utilisées par d’autres applications qui
    veulent avoir accès à ces données / opérations privilégiées!
    • Exemples d’API :
    • API d’Adobe Acrobat (un programme « desktop » que l’on peut automatiser de
    façon à créer un PDF, par exemple)
    • API de Word ou Excel (pour créer des documents XLS ou DOC à l’aide de
    données dans une BD, par exemple)
    • Exemples d’API pour application Web (souvent payants) :
    • API de Google Maps
    • API de Facebook
    • API de Postes Canada
    • API d’Instagram
    • Pour transmettre
    */

    // Qu’est-ce qu’une API REST? =================//
    /*
    • REST signifie Representational State Transfer.
    • Les API REST, ou services Webs RESTful, doivent respecter 5 contraintes pour être considérés comme RESTful.
        1. Elle doit présenter une interface uniforme, c’est-à-dire que :
            • Chacune des ressources (un article, un film, un produit, etc…) doit être
            identifiée par un URI différent. Cet URI renvoie une représentation des données
            représentant la ressource, qui doit être du HTML, du XML ou, plus
            fréquemment, du JSON.
            • La manipulation des ressources se fait via cette URI. On supprimera, ou mettra
            à jour, via la même représentation de la ressource que celle qui est accédée
            pour lire la ressource.
        2. Elle doit être sans état. Chaque requête est indépendante. Pas de variables sessions,
            donc.
        3. Chaque réponse doit spécifier si elle peut être mise en cache.
        4. Le client et le serveur sont entièrement séparés. Le client ne sait pas      quelle est la source
            de données, le serveur ne sait pas ce que le client fera avec les infos et dans quelle
            interface elles s’afficheront.
        5. Le client ne sait pas si le serveur possède les infos ou
    */

    // API REST et méthodes HTTP =================//
    // • Un API REST typique fournit les mêmes méthodes qu’un CRUD typique. À chacune des actions du CRUD sont associées une des méthodes HTTP d’usage.
        // • GET pour LIRE une ou des ressources.
        // • POST pour CRÉER une ressource.
        // • PUT pour MODIFIER une ressource.
        // • DELETE pour SUPPRIMER une ressource.
    // • Dépendamment de l’action, une réponse différente sera envoyée et attendue. Dans le cas général, ces réponses seront en JSON, accompagnées d’un code de réponse HTTP approprié.


    // Création avec POST ====================//
    // La création s’effectue avec une requête de type POST vers la ressource dont on veut créer une instance.
        // • Ex : monsite.com/articles
    // • Cette requête POST doit contenir, dans le corps de la requête, un objet JSON représentant toutes les caractéristiques de la ressource à créer.
    {
        "article": {
        "titre": “Le canadien perd!”,
        "texte": “Le canadien perd en fusillade contre les Oilers…”,
        "idAuteur": 8
        }
    }

    // Il n’est pas facile d’accéder à du JSON dans les paramètres de la requête en PHP. 
    // Il estimpossible de le faire via $_POST
    // • On accède directement au corps de la requête en PHP via l’instruction suivante :
        // • file_get_contents("php://input")
    // • Si la ressource a été créée, la réponse devrait contenir la ressource créée en JSON ainsi qu’un code de réponse HTTP 201 CREATED. Si la ressource existe déjà, le code de réponse devrait être 409 Conflict.

    
    // Lecture avec GET ==================//
        // • Ex : monsite.com/articles
    // • La réponse devrait contenir tous les items de la ressource dans un tableau JSON ainsi qu’un code de réponse HTTP 200 OK.

    // • Lorsque l’on veut faire une lecture sur un seul item de la ressource que l’on veut accéder, la lecture s’effectue avec une requête de type GET vers la ressource que l’on veut obtenir, suivi de l’ID de l’item,
        // • Ex : monsite.com/articles/9
    // • Dans ce cas particulier, il peut être utile de modifier le fichier .htaccess pour effectuer un routage via la ré-écriture d’URL.


    // Mise à jour avec PUT ====================//
    // • Cette requête PUT doit contenir, dans le corps de la requête, un objet JSON représentant toutes les nouvelles caractéristiques de la ressource à modifier. La modification est toujours effectuée en fonction de la clé primaire.
    // • Si la ressource a été modifiée, la réponse devrait contenir un code de réponse HTTP 200 OK. Si elle n’a pas été trouvée, le code devrait être 404 NOT FOUND.


    // Suppression avec DELETE =====================//
    // • La suppression s’effectue avec une requête de type DELETE vers la ressource que l’on veut supprimer, suivi de l’ID de l’item.
        // • Ex : monsite.com/articles/9
    // • La réponse devrait retourner un code 204 NO CONTENT si l’item a été trouvé et supprimé, et un code 404 si l’item n’a pas été trouvé.
