<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dipedenti</title>
</head>
<body>
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
    
        class Employee extends Person {
            private $freshman;
            private $salary;
            private $department;
    
            public function __construct($name, $surname, $cf, $freshman, $salary, $department) {
                parent::__construct($name, $surname, $cf);
                $this -> setFreshman($freshman);            
                $this -> setSalary($salary);
                $this -> setDepartment($department);
            }
            public function getFreshman() {
                return $this -> freshman;
            }
            public function setFreshman($freshman) {
                $this -> freshman = $freshman;
            }
    
            public function getSalary() {
                return $this -> salary;
            }
            public function setSalary($salary) {
                $this -> salary = $salary;
            }
    
            public function getDepartment() {
                return $this -> department;
            }
            public function setDepartment($department) {
                $this -> department = $department;
            }
    
            public function __toString() {
                return parent::__toString() . '<br>'
                    . 'freshman: ' . $this -> getFreshman() . '<br>'
                    . 'salary: ' . $this -> getSalary() . '$' . '<br>'
                    . 'department: ' . $this -> getDepartment() . '<br>';
            }
        }

        class Boss extends Person {
            private $company;
            private $benefit;
            private $bonus;
    
            public function __construct($name, $surname, $cf, $company, $benefit, $bonus) {
                parent::__construct($name, $surname, $cf);
                $this -> setCompany($company);            
                $this -> setBenefit($benefit);
                $this -> setBonus($bonus);
            }
            public function getCompany() {
                return $this -> company;
            }
            public function setCompany($company) {
                $this -> company = $company;
            }
    
            public function getBenefit() {
                return $this -> benefit;
            }
            public function setBenefit($benefit) {
                $this -> benefit = $benefit;
            }
    
            public function getBonus() {
                return $this -> bonus;
            }
            public function setBonus($bonus) {
                $this -> bonus = $bonus;
            }
    
            public function __toString() {
                return parent::__toString() . '<br>'
                    . 'company: ' . $this -> getCompany() . '<br>'
                    . 'benefit: ' . $this -> getBenefit() . '<br>'
                    . 'bonus: ' . $this -> getBonus() . '$' . '<br>';
            }
        }
    
        $person = new Person ('Mario', 'Rossi', 'MRARSS75E05F052N');
        $employee = new Employee ('Lucia', ' Verdi', 'VRDLCU75S65A638E', '099983', '2.000', 'hi-tech');
        $boss = new Boss ('Jae-yong', 'Lee', 'LEEJNG74T27F205Z', 'Samsung', 'without limits', '80.00');

        echo 'Persona: <br>' . $person . '<br><br>'
            . 'Dipedente:<br>' . $employee . '<br><br>'
            . 'Boss:<br>' . $boss;

    ?>
    
</body>
</html>