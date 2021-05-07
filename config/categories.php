<?php

  // Roles ID
  $admin = 1;
  $sede = 2;
  $dm = 3;
  $dm_junior = 4;
  $osservatore = 5;
  $medico = 6;
  $isf = 7;

  return [

    // ---------------- ISF Categories ----------------

    [
      "role_id" => $isf,
      "number" => 1,
      "question" => "Nell'intervista (apertura e gestione obiezioni) l'ISF ha gestito i tre cervelli?",
      "explanation" => "Se utile per il feedback indicare come sono stati gestiti i tre cervelli.",
    ],
    [
      "role_id" => $isf,
      "number" => 2,
      "question" => "L'ISF ha riformulato le parole/argomentazioni tossiche pronunciate dal medico?",
      "explanation" => "Se utile per il feedback indicare come l'ISF ha riparafrasato le parole/argomentazioni tossiche.",
    ],
    [
      "role_id" => $isf,
      "number" => 3,
      "question" => "In chiusura di intervista c’è stata la call to action per la neocorteccia (cervello limbico)?",
      "explanation" => "Se utile per il feedback indicare l'aspetto razionale usato.",
    ],

    // ---------------- MEDICO Categories ----------------

    [
      "role_id" => $medico,
      "number" => 1,
      "question" => "Il medico ha saputo mostrare il cervello rettile all'ISF?",
      "explanation" => "Se utile per il feedback indica le parole/frasi che il medico ha usato.",
    ],
    [
      "role_id" => $medico,
      "number" => 2,
      "question" => "Il medico è stato in grado di generare delle obiezioni strutturate in modo tale da offrire all'ISF la possibilità di gestire i tre cervelli?",
      "explanation" => "Se utile per il feedback indicare l'obiezione.",
    ],
    [
      "role_id" => $medico,
      "number" => 3,
      "question" => "Il medico ha usato parole/argomentazioni tossiche in modo da permettere all'ISF di gestirle?",
      "explanation" => "Se utile per il feedback indicare le parole/argomentazioni usate.",
    ],

  ];

?>
