<?php
include_once './config/database.php';

try {
  $database = new Database();
  $db = $database->getConnection();
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $tableQuestionsName = "furkid_questions";
  $tableRankingName = "furkid_ranking";

  // create furkid_questions table
  $db->exec("CREATE TABLE IF NOT EXISTS " . $tableQuestionsName . "(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(255),
    participants INT NOT NULL,
    correct INT NOT NULL,
    PRIMARY KEY (id)
  );");

  // create furkid_ranking table
  // TODO: create furkid_ranking table

  // insert data into furkid_questions table
  if ($db->query("SELECT 1 FROM $tableQuestionsName")->rowCount() != 0) {
    echo "Table $tableQuestionsName already exists \n";
  } else {
    for ($i = 1; $i <= 14; $i++) {
      $sql = 'INSERT INTO ' . $tableQuestionsName . '(name, participants, correct) VALUES(:name, :participants, :correct)';

      $statement = $db->prepare($sql);
      $statement->execute([
        ':name' => 'question' . $i,
        ':participants' => 0,
        ':correct' => 0
      ]);
    }
  }

  // insert data into furkid_ranking table
  // TODO: insert furkid_ranking table

  // print data from furkid_questions table
  $data = $db->query('SELECT * FROM furkid_questions');
  foreach ($data as $row) {
    print_r($row);
  }

  // print data from furkid_ranking table
  // TODO: print data from furkid_ranking table

} catch (PDOException $exception) {
  echo "Database could not be connected: " . $exception->getMessage();
}