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
      "question" => "L'ISF è entrato in contatto ed ha gestito il cervello rettile?",
      "explanation" => "Indicare come l'ISF ha gestito il cervello rettile, quali parole ha usato.",
    ],
    [
      "role_id" => $isf,
      "number" => 2,
      "question" => "Nel rispondere all'obiezione del medico, l'ISF ha gestito i tre cervelli?",
      "explanation" => "Indicare come sono stati gestiti i tre cervelli.",
    ],
    [
      "role_id" => $isf,
      "number" => 3,
      "question" => "L'ISF ha riformulato le parole/argomentazioni tossiche pronunciate dal medico?",
      "explanation" => "Indicare come l'ISF ha riparafrasato le parole/argomentazioni tossiche pronunciate dal medico.",
    ],
    [
      "role_id" => $isf,
      "number" => 4,
      "question" => "In chiusura di intervista c’è stata la call to action per la neocorteccia (cervello limbico)?",
      "explanation" => "Indicare l'aspetto razionale usato in chiusura (rispoetto alle evidenze scientifiche o alle caratteristiche concordate) e la call to action.",
    ],

    // ---------------- MEDICO Categories ----------------

    [
      "role_id" => $medico,
      "number" => 1,
      "question" => "Il medico ha saputo mostrare il cervello rettile?",
      "explanation" => "Indica le parole/frasi che il medico ha usato.",
    ],
    [
      "role_id" => $medico,
      "number" => 2,
      "question" => "Il medico è stato in grado di generare delle obiezioni strutturate, in modo tale da offrire all'ISF la possibilità di gestire i tre cervelli?",
      "explanation" => "Indicare l'obiezione.",
    ],
    [
      "role_id" => $medico,
      "number" => 3,
      "question" => "Il medico ha usato parole/argomentazioni tossiche in modo da permettere all'ISF di gestirle?",
      "explanation" => "Indicare le parole/argomentazioni usate.",
    ],
    [
      "role_id" => $medico,
      "number" => 4,
      "question" => "Quanto il medico è stato in grado di interessare l'ISF ai suoi temi/problemi/interessi? (cervello rettile e limbico)",
      "explanation" => "Indicare le parole usate per affrontare le tematiche di suo interesse.",
    ],

  ];

?>
