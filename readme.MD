# Prova d’Avaluació Continuada 2 (PAC2)

## Introducció

Aquesta PAC pretén posar en pràctica alguns dels coneixements que s'han vist als [materials del curs](http://hdl.handle.net/10609/199), entre els temes 4, 5 i 6. Concretament es treballaran aspectes de:

- Accés i manipulació de bases de dades MySQL.
- Desenvolupament d'aplicacions web amb PHP.
- Creació de pàgines HTML amb JavaScript i CSS.

S'enfoca però, tenint en compte les tecnologies actuals en el desenvolupament web. Així, s'utilitzarà la tècnica de JavaScript no intrusiu per tractar el comportament de les pàgines [1], s'utilitzarà AJAX [2], i s'utilitzaran frameworks per a CSS [3] i JavaScript [4].

Les preguntes que teniu a continuació van acumulant coneixements una rere l'altra, de forma que cada una d'elles depèn de l'anterior per ser resolta. Al final es tindrà una aplicació web senzilla que construeix un núvol d'etiquetes a partir dels continguts d'una base de dades.

Es proporciona un esquelet de la solució que permet que us concentreu a resoldre allò important i no tant en construir tota una aplicació, encara que sigui senzilla.
Eines necessàries

Per realitzar aquesta PAC es necessita una configuració de servidor amb:

- NGINX
- PHP
- MySQL

S'aconsella utilitzar:

- Navegador web [Google Chrome](https://www.google.com/intl/ca/chrome/).
- Un IDE que faciliti el treball amb PHP i Javascript, com [Visual Studio Code](https://code.visualstudio.com/).
- Una eina per administrar bases de dades MySQL, com [MySQL Workbench](https://dev.mysql.com/downloads/workbench/).

Acompanya l'enunciat un fitxer, tagcloud.zip, amb l'esquelet de l'aplicació sobre el qual treballareu. Heu de descomprimir aquest fitxer dins del vostre servidor web, de forma que hi pugueu accedir amb la URL [http://localhost:8080](http://localhost:8080).

## Pas 1

Es vol construir un sistema de gestió de continguts. Els continguts s'emmagatzemen desant les següents dades:

- Títol: camp de text obligatori que dóna títol al contingut.
- Resum: camp de text opcional que resumeix el contingut, o que permet fer-ne una introducció sense mostrar-lo complet.
- Cos: camp de text obligatori que conté el text complet.
- Etiquetes: camp de text que emmagatzema les etiquetes que permeten classificar el contingut. Les etiquetes se separen per coma entre elles.
- Data de creació: camp de data que indica quan s'ha creat el contingut.
- Data de modificació: camp de data que indica quan ha estat la darrera modificació del contingut.

Es demana que:

a) Creeu una base de dades MySQL que s'anomeni tagcloud. Mostreu la comanda que permet crear-la.

b) Creeu una taula content a la base de dades que heu creat que emmagatzemarà els continguts, tenint en compte els camps que s'han especificat anteriorment. Mostreu la comanda que permet crear-la.

c) Creeu un usuari tagcloud i doneu-li permisos obre les taules de la base de dades creada. Mostreu la comanda que permet crear-lo.

d) Inseriu 10 registres a la taula tagcloud per dotar-la de continguts d'exemple. Mostreu les comandes que heu executat per fer-ho.

## Pas 2

Se us proporcionen els fitxers DBManager.php, DBManagerException.php i TagCloudManager.php, relacionats amb l'accés a les dades de la base de dades tagcloud. Analitzeu els fitxers i realitzeu les següents tasques, completant en cada apartat el fitxer adient:

a) Configureu els paràmetres d'accés a la base de dades.

b) Afegiu el codi necessari per establir una connexió amb la base de dades.

c) Afegiu el codi necessari per executar una consulta -genèrica- a la base de dades.

## Pas 3

Se us proporciona el fitxer Content.php, on hi ha definida la classe Content, la qual és una abstracció d'un contingut. Analitzeu el fitxer i realitzeu les següents tasques:

a) Afegiu el codi necessari per obtenir els objectes Content obtinguts a partir de les dades de la taula content de la base de dades (mètode getContents i relacionats).

b) Afegiu el codi necessari per obtenir les etiquetes dels continguts de la base de dades (mètode getTags i relacionats).

## Pas 4

El fitxer index.html mostra una pàgina amb una capçalera i un peu, i tres columnes centrals, la de la dreta de les quals mostra les etiquetes dels continguts.

Des d'index.html, un cop es carrega la pàgina, es crida amb AJAX el fitxer tag.php. Aquesta crida fa que es consultin les etiquetes dels continguts de la base de dades, es calculi la freqüència d'aparició de les mateixes i es retorni un array amb les etiquetes i freqüències calculades.

Un cop rebuda la informació el codi JavaScript del fitxer index.html actualitza el contingut de l'element cloudbox de la pàgina afegint un enllaç per a cada etiqueta, amb la classe CSS corresponent en funció de la seva freqüència. Així, si la freqüència és menor o igual que 33 (%) tindrà la classe littletag, si és major de 33 i menor o igual que 66 tindrà la classe mediumtag, i si és major que 66 tindrà la classe largetag.

Per a les classes CSS indicades s'han de tenir en compte les següents característiques:

- El color del text és #003366.
- El text es mostra en negreta.
- El text littletag és de mida 10px, mediumtag és de 15px i largetag de 20px.

Es demana:

a) Completar la funció getTagInformation perquè realitzi la crida al servidor utilitzant Ajax.Request de Prototype. No es demana encara que feu res al servidor. El fitxer tag.php conté una resposta d'exemple.

b) Definir els estils en línia per a les classes littletag, mediumtag i largetag.

c) Completar la funció processTagInformation perquè processi la informació de les etiquetes retornada pel servidor i actualitzi l'element cloudbox de la pàgina amb els enllaços a les etiquetes. Es pot deixar l'atribut href dels enllaços buit o amb valor “#”.

d) Modifiqueu el fitxer tag.php perquè en comptes de retornar dades d'exemple de les etiquetes, retorni el resultat de consultar el mètode getTags de la classe Content.

## Pas 5

Responeu breument a les següents preguntes. La resposta de les dues preguntes en conjunt no pot supera una pàgina.

a) Quina és la funció del fitxer config.php?

b) Expliqueu breument què és JavaScript no intrusiu aplicat a l'aplicació de la PAC.

## Referències útils

[1] Unobtrusive JavaScript: http://en.wikipedia.org/wiki/Unobtrusive_JavaScript

[2] AJAX: http://en.wikipedia.org/wiki/Ajax_(programming)

[3] Blueprint: http://www.blueprintcss.org

[4] Prototype: http://www.prototypejs.org

# Passos per executar/depurar el codi en macOS Sonoma

## Requisits de programari

- [Visual Studio Code](https://code.visualstudio.com/)
- [Docker](https://www.docker.com/)

Nota: en versions anterior de macOS pot ser que php ja estigui instal·lat al sistema.

### Opcional

Per validar el codi [php a VS Code](https://code.visualstudio.com/docs/languages/php), cal instal·lar php. Per a fer-ho amb homebrew:

- brew install php

## Depurar el codi

- Obrir l'aplicació Docker Desktop per iniciar docker
- Obrir Visual Studio Code, i realitzar els passos següents:
  - Obrir la carpeta del projecte
  - Aixecar els contenidors, per a fer-ho:
    - fer clic dret al fitxer docker-compose.yml
    - seleccionar Compose Up
  - Escoltar Xdebug, per a fer-ho:
    - fer clic al botó Run and Debug
    - fer clic al botó Listen for Xdebug
  - Afegir breakpoints als fitxers .php
- Obrir la pàgina http://localhost:8080

## Només executar el codi

- Obrir l'aplicació Docker Desktop per iniciar docker
- Obrir Visual Studio Code, i realitzar els passos següents:
  - Obrir la carpeta del projecte
  - Aixecar els contenidors, per a fer-ho:
    - fer clic al fitxer docker-compose.yml
    - seleccionar Compose Up
- o bé des d'un terminal executar la comanda `docker-compose up`
- Obrir la pàgina http://localhost:8080

## Per aturar els contenidors

- Des de Visual Studio Code
  - fer clic dret al fitxer docker-compose.yml
  - seleccionar Compose Down
- Des del terminal
  - Si s'han iniciat els contenidors des del terminar prémer Control+C
  - Des d'un altre TTY `docker-compose down`
- Des de l'aplicació Docker Desktop fer clic al botó per aturar el grup de contenidors

# External components

- [Blueprint CSS framework](https://github.com/joshuaclayton/blueprint-css/commits/master/) licensed under MIT
- [Prototype JavaScript framework](http://prototypejs.org/) licensed under MIT
- [Penguin Favicons](https://favicon.io/emoji-favicons/penguin/) licensed under CC-BY 4.0
