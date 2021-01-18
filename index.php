<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dipedenti</title>
</head>
<body>

<!-- creare 3 classi per rappresentare la seguente realta':
- persona
- dipendente
- boss
cercare inoltre di sciegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realta' e decidere le relazione di parantela (chi estende chi);
per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;
instanziando le varie classi provare a stampare cercando di ottenere un log sensato -->

<?php
    class Person {
        private $name;
        private $surname;
        private $cf;

        public function __construct($name, $surname, $cf) {
            $this -> setName($name);
            $this -> setSurname($surname);
            $this -> setCf($cf);
        }

        public function getName() {
            return $this -> name;
        }
        public function setName($name) {
            $this -> name = $name;
        }

        public function getSurname() {
            return $this -> surname;
        }
        public function setSurname($surname) {
            $this -> surname = $surname;
        }

        public function getCf() {
            return $this -> cf;
        }
        public function setCf($cf) {
            $this -> cf = $cf;
        }

        public function __toString() {
            return
                'name: ' . $this -> getName() . '<br>'
                . 'surname: ' . $this -> getSurname() . '<br>'
                . 'cf: ' . $this -> getCf();
        }
    }

    $person1 = new Person ('Mario', 'Rossi', 'MRARSS75E05F052N');
    echo 'Persona: <br>' . $person1;

?>
    
</body>
</html>