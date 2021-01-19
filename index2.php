<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees with Exceptions</title>
</head>
<body>

    <?php
        class Person {
            private $name;
            private $lastname;
            private $dateOfBirth;
            private $securyLvl;
            public function __construct($name, $lastname, $dateOfBirth, $securyLvl) {
                $this -> setName($name);
                $this -> setLastname($lastname);
                $this -> setDateOfBirth($dateOfBirth);
                $this -> setSecuryLvl($securyLvl);
            }
            public function getName() {
                return $this -> name;
            }
            public function setName($name) {
                if (strlen($name) < 3) {
                    throw new Exception("Please enter a longer name");
                }
                $this -> name = $name;
            }
            public function getLastname() {
                return $this -> lastname;
            }
            public function setLastname($lastname) {
                if (strlen($lastname) < 3) {
                    throw new Exception("Please enter a longer surname");
                }
                $this -> lastname = $lastname;
            }
            public function getFullname() {
                return $this -> getName() . ' ' . $this -> getLastname();
            }
            public function getDateOfBirth() {
                return $this -> dateOfBirth;
            }
            public function setDateOfBirth($dateOfBirth) {
                $this -> dateOfBirth = $dateOfBirth;
            }
            public function getSecuryLvl() {
                return $this -> securyLvl;
            }
            public function setSecuryLvl($securyLvl) {
                $this -> securyLvl = $securyLvl;
            }
            public function __toString() {
                return 
                    'name: ' . $this -> getName() . '<br>'
                    . 'lastname: ' . $this -> getLastname() . '<br>'
                    . 'dateOfBirth: ' . $this -> getDateOfBirth() . '<br>'
                    . 'securyLvl: ' . $this -> getSecuryLvl() . '<br>';
            }
        }
        // VERSIONE 1
        class Employee extends Person {
            private $ral;
            private $mainTask;
            private $idCode;
            private $dateOfHiring;
            public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                        $ral, $mainTask, $idCode, $dateOfHiring) {
                parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
                $this -> setRal($ral);
                $this -> setMainTask($mainTask);
                $this -> setIdCode($idCode);
                $this -> setDateOfHiring($dateOfHiring);
            }
            public function getRal() {
                return $this -> $ral;
            }
            public function setRal($ral) {
                // if ($ral = max(min($ral, 100000), 10000)) {
                //     throw new Exception("number not included in the range");
                // }

                if (is_numeric($ral) && $ral < 10000 || $ral > 100000) {
                    throw new Exception("number not included in the range");
                }

                $this -> ral = $ral;
            }
            public function getMainTask() {
                return $this -> $mainTask;
            }
            public function setMainTask($mainTask) {
                $this -> mainTask = $mainTask;
            }
            public function getIdCode() {
                return $this -> $idCode;
            }
            public function setIdCode($idCode) {
                $this -> idCode = $idCode;
            }
            public function getDateOfHiring() {
                return $this -> $dateOfHiring;
            }
            public function setDateOfHiring($dateOfHiring) {
                $this -> dateOfHiring = $dateOfHiring;
            }
            public function __toString() {
                return parent::__toString() . '<br>'
                    . 'ral: ' . $this -> ral . '<br>'
                    . 'mainTask: ' . $this -> mainTask . '<br>'
                    . 'idCode: ' . $this -> idCode . '<br>'
                    . 'dateOfHiring: ' . $this -> dateOfHiring . '<br>';
            }
        }

        class Boss extends Employee {
            private $profit;
            private $vacancy;
            private $sector;
            private $employees;
            public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                        $ral, $mainTask, $idCode, $dateOfHiring,
                                        $profit, $vacancy, $sector, $employees = []) {
                parent::__construct($name, $lastname, $dateOfBirth, $securyLvl,
                                    $ral, $mainTask, $idCode, $dateOfHiring);
                $this -> setProfit($profit);
                $this -> setVacancy($vacancy);
                $this -> setSector($sector);
                $this -> setEmployees($employees);
            }
            public function getProfit() {
                return $this -> profit;
            }
            public function setProfit($profit) {
                $this -> profit = $profit;
            }
            public function getVacancy() {
                return $this -> vacancy;
            }
            public function setVacancy($vacancy) {
                $this -> vacancy = $vacancy;
            }
            public function getSector() {
                return $this -> sector;
            }
            public function setSector($sector) {
                $this -> sector = $sector;
            }
            public function getEmployees() {
                return $this -> employees;
            }
            public function setEmployees($employees) {
                $this -> employees = $employees;
            }
            public function __toString() {
                return parent::__toString() . '<br>'
                        . 'profit: ' . $this -> getProfit() . '<br>'
                        . 'vacancy: ' . $this -> getVacancy() . '<br>'
                        . 'sector: ' . $this -> getSector() . '<br>'
                        . 'employees:<br>' . $this -> getEmpsStr() . '<br>';
            }
            private function getEmpsStr() {
                $str = '';
                for ($x=0;$x<count($this -> getEmployees());$x++) {
                    $emp = $this -> getEmployees()[$x];
                    $fullname = $emp -> getName() . ' ' . $emp -> getLastname();
                    $str .= ($x + 1) . ': ' . $fullname . '<br>';
                }
                return $str;
            }                    
        }

        try {
            $p1 = new Person(
                'Mario',
                'Rossi',
                '(p)dateOfBirth',
                '(p)securyLvl',
            );
            echo 'Person: ' . '<br>' . $p1 . '<br>';
        } catch (Exception $e) {
            echo 'ERROR: Please enter a longer name and/or surname' . '<br>';
        }

        try {
            $e1 = new Employee(
                '(e)name',
                '(e)lastname',
                '(e)dateOfBirth',
                '(e)securyLvl',
                '10000',
                '(e)mainTask',
                '(e)idCode',
                '(e)dateOfHiring',
            );
            echo 'Employee:<br>' . $e1 . '<br><br>';
        } catch (Exception $e) {
           echo 'ERROR';
        }
        

    
        // $b1 = new Boss(
        //     '(b)Mario',
        //     '(b)Rossi',
        //     '(b)dateOfBirth',
        //     '(b)securyLvl',
        //     '(b)ral',
        //     '(b)mainTask',
        //     '(b)idCode',
        //     '(b)dateOfHiring',
        //     '(b)profit', 
        //     '(b)vacancy', 
        //     '(b)sector', 
        //     [
        //         $e1,
        //         $e1,
        //         $e1,
        //         $e1,
        //     ]
        // );
        // echo 'b1:<br>' . $b1 . '<br><br>';

    ?>
    
</body>
</html>