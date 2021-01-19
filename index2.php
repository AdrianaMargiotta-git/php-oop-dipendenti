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
                    throw new MoreCharactersName("Please enter a longer name");
                }
                $this -> name = $name;
            }
            public function getLastname() {
                return $this -> lastname;
            }
            public function setLastname($lastname) {
                if (strlen($lastname) < 3) {
                    throw new MoreCharactersLastname("Please enter a longer surname");
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

            public function setSecuryEmployee($securyLvl) {
                if (is_numeric($securyLvl) && $securyLvl < 1 || $securyLvl > 5) {
                    throw new SecuryEmployee("security level not included in the range");
                }
            }

            public function getRal() {
                return $this -> $ral;
            }
            public function setRal($ral) {
                if (is_numeric($ral) && $ral < 10000 || $ral > 100000) {
                    throw new RangeOfNumbers("number not included in the range");
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

            public function setSecuryBoss($securyLvl) {
                if ((!is_int($securyLvl)) || $securyLvl < 6 || $securyLvl > 10) {
                    throw new SecuryBoss("security level not included in the range");
                }
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
                if (empty($employees)) {
                  throw new BossEmployee('Boss must have employees');
                }
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

        class MoreCharactersName extends Exception{}
        class MoreCharactersLastname extends Exception{}
        class RangeOfNumbers extends Exception{}
        class SecuryEmployee extends Exception {}
        class SecuryBoss extends Exception {}
        class BossEmployee extends Exception {}

        // person ($name, $lastname, $dateOfBirth, $securyLvl)
        try {
            $p1 = new Person('Mario', 'Rossi', '01-01-2001', '1');
            echo 'Person: ' . '<br>' . $p1 . '<br>';
        } catch (MoreCharactersName |  MoreCharactersLastname $e) {
            echo 'ERROR: Please enter a longer name and/or surname' . '<br>';
        }

        //employee ($name, $lastname, $dateOfBirth, $securyLvl, $ral, $mainTask, $idCode, $dateOfHiring)
        try {
            $e1 = new Employee('Jae-yong', 'Lee', '20-20-1970', '4', '10000', 'Employee', '00999', '19/01/2020');
            $e1 -> setSecuryEmployee(4);
            echo 'Employee:<br>' . $e1 . '<br><br>';
        } catch (MoreCharactersName |  MoreCharactersLastname $e) {
            echo 'ERROR: Please enter a longer name and/or surname' . '<br>';
        } catch (RangeOfNumbers $e) {
            echo 'ERROR: The number must be between 10.000 and 100.000' . '<br>';
        } catch (SecuryEmployee $e) {
            echo 'ERROR: The secury level must be between 1 and 5' . '<br>';
        }

        //boss ($name, $lastname, $dateOfBirth, $securyLvl, $ral, $mainTask, $idCode, $dateOfHiring, $profit, $vacancy, $sector, $employees = [])
        try {
            $b1 = new Boss('Adriana', 'Margiotta', '19-12-1997', '10', '100000', 'Boos', '00001', '15-09-2011', '600000', 'forever', 'IT', [$e1]);
            $b1 -> setSecuryBoss(7);
            echo 'Boss:<br>' . $b1 . '<br><br>';
        } catch (MoreCharactersName |  MoreCharactersLastname $e) {
            echo 'ERROR: Please enter a longer name and/or surname' . '<br>';
        } catch (RangeOfNumbers $e) {
            echo 'ERROR: The number must be between 10.000 and 100.000' . '<br>';
        } catch (SecuryBoss $e) {
            echo 'ERROR: The secury level must be between 6 and 10' . '<br>';
        } catch (BossEmployee $e) {
            echo 'ERROR: ';
        }
        
    ?>
    
</body>
</html>